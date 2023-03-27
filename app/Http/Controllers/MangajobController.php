<?php

namespace App\Http\Controllers;

use Goutte\Client;
use App\Models\Manga;
use App\Models\Chapter;
use App\Models\MangaJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpClient\HttpClient;

class MangajobController extends Controller
{
    public function index()
    {
        $this->authorize('manga_job_view');
        $data = MangaJob::latest()->get();
        return view('pages.mangajob.index', compact('data'));
    }

    public function create()
    {
        $this->authorize('manga_job_create');
        return view('pages.mangajob.create');
    }

    public function checkScraping(Request $request)
    {
        $this->authorize('manga_job_create');
        $output = '';
        $urlManga = [];
        $id = Manga::select('id')->orderBy('id', 'desc')->first();
        $data_id = ($id != null) ? $id['id'] : 0;

        if ($request->ajax()) {
            $mangajob = explode("\n", $request->url);

            $client = new Client(HttpClient::create(['verify_peer' => false]));

            foreach ($mangajob as $key => $value) {
                $url[$key]          = $value;
                $slug[$key]         = explode("/", $url[$key]);

                if (Manga::where('slug', '=', $slug[$key][4])->exists()) {
                    $output .= '
                        <tr>
                            <td>' . $url[$key] . '</td>
                            <td>
                                <span class="text-danger">
                                    <i class="feather icon-x-circle"></i>
                                    <b>Gagal!</b> manga sudah ada di DB
                                </span>
                            </td>
                        </tr>';
                    $informations = null;
                } else {
                    $output .= '
                        <tr>
                            <td>' . $url[$key] . '</td>
                            <td>
                                <span class="text-success">
                                    <i class="feather icon-check-circle"></i>
                                    <b>Berhasil</b>
                                </span>
                            </td>
                        </tr>';

                        $web    = parse_url($url[$key]);
                        $urlManga[]  = [
                            'id'            => $data_id + $key + 1,
                            'url_manga'     => $url[$key],
                            'web'           => $web['scheme'] . '://' . $web['host'] . '/',
                            'slug'          => $web['path'],
                            'created_at'    => now(),
                            'updated_at'    => now()
                        ];

                        $check_host[$key]   = $slug[$key][0] . '//' . $slug[$key][2];
                        $node[$key]         = $client->request('GET', $url[$key]);

                        if ($check_host[$key] == config('constant.url.komikstation')) {
                            $this->information[$key]['id']          = $data_id + $key + 1;
                            $this->information[$key]['url']         = $url[$key];
                            $this->information[$key]['poster']      = $node[$key]->filter('.thumb img')->attr('src');
                            $this->information[$key]['title']       = $node[$key]->filter('.infox h1')->text();
                            $this->information[$key]['domain']      = $check_host[$key];
                            $this->information[$key]['slug']        = $slug[$key][4];
                            $this->information[$key]['description'] = $node[$key]->filter('.desc p')->text();
                            $this->information[$key]['table_info']  = $node[$key]->filter('.spe')->filter('span')->each(function ($tr) {
                                $data = [
                                    'key' => $tr->filter('span b')->text(),
                                    'value' => $tr->filter('span')->text()
                                ];
                                return $data;
                            });
                            $this->information[$key]['genres']      = $node[$key]->filter('.spe span')->first()->filter('a')->each(function ($a) {
                                $data = [
                                    'genre' => $a->filter('a')->text()
                                ];
                                return $data;
                            });
                            $this->information[$key]['chapters']    = $node[$key]->filter('.bixbox ul')->filter('li')->each(function ($li) {
                                $data = [
                                    'cp' => $li->filter('.lchx')->text(),
                                    'url' => parse_url($li->filter('.lchx a')->attr('href'))
                                ];
                                return $data;
                            });
                        } else {
                            $this->information[$key]['id']          = $data_id + $key + 1;
                            $this->information[$key]['url']         = $url[$key];
                            $this->information[$key]['poster']      = $node[$key]->filter('.thumb img')->attr('src');
                            $this->information[$key]['title']       = $node[$key]->filter('.seriestucon h1')->text();
                            $this->information[$key]['domain']      = $check_host[$key];
                            $this->information[$key]['slug']        = $slug[$key][4];
                            $this->information[$key]['description'] = $node[$key]->filter('.seriestuhead p')->text();
                            $this->information[$key]['table_info']  = $node[$key]->filter('.infotable')->filter('tr')->each(function ($tr) {
                                $data = [
                                    'key' => $tr->filter('tr td')->eq(0)->text(),
                                    'value' => $tr->filter('tr td')->eq(1)->text()
                                ];
                                return $data;
                            });
                            $this->information[$key]['genres']      = $node[$key]->filter('.seriestugenre')->filter('a')->each(function ($a) {
                                $data = [
                                    'genre' => $a->filter('a')->text()
                                ];
                                return $data;
                            });
                            $this->information[$key]['chapters']    = $node[$key]->filter('.clstyle')->filter('li')->each(function ($li) {
                                $data = [
                                    'cp' => $li->filter('.chapternum')->text(),
                                    'url' => parse_url($li->filter('a')->attr('href'))
                                ];
                                return $data;
                            });
                        }
                        $informations = $this->information;
                }

            }
            if ($informations == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal!'
                ]);
            }else{
                return $this->store($informations, $output, $urlManga);
            }
        }
    }

    public function store($informations, $output, $urlManga)
    {
        $this->authorize('manga_job_create');
        $mangas     = [];
        $chapter    = [];

        foreach ($informations as $value) {
            $alphabet   = mb_substr($value['title'], 0, 1);
            $isNumeric  = preg_match('/^[0-9]+$/', mb_substr($value['title'], 0, 1));
            $isAlphabet = preg_match('/^[A-Z]+$/', mb_substr($value['title'], 0, 1));
            $sort       = ($isNumeric) ? '0-9' : (($isAlphabet) ? $alphabet : 'other');

            $mangas[] = [
                'id'            => $value['id'],
                'poster'        => ($value['domain'] == 'https://kiryuu.id') ? str_replace('https://','https://i2.wp.com/', $value['poster']) : $value['poster'],
                'title'         => str_replace('Bahasa Indonesia','', $value['title']),
                'domain'        => $value['domain'],
                'slug'          => $value['slug'],
                'description'   => $value['description'],
                'information'   => json_encode($value['table_info']),
                'genre'         => json_encode($value['genres']),
                'sort'          => $sort,
                'created_at'    => now(),
                'updated_at'    => now()
            ];

            foreach ($value['chapters'] as $item) {
                $chapter[] = [
                    'manga_id'      => $value['id'],
                    'chapter'       => substr($item['cp'], 8),
                    'domain'        => $item['url']['scheme'] . '://' . $item['url']['host'],
                    'path'          => $item['url']['path'],
                    'created_at'    => now(),
                    'updated_at'    => now()
                ];
            }
        }

        DB::table('mangajob')->insertOrIgnore($urlManga);
        DB::table('manga')->insertOrIgnore($mangas);
        DB::table('manga_chapter')->insertOrIgnore($chapter);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil!',
            'data' => $output
        ]);
    }

    // public function checkScraping(Request $request)
    // {
    //     $idm = Manga::select('id')->orderBy('id', 'desc')->first();
    //     $id_manga = ($idm != null) ? $idm['id'] : 0;

    //     if ($request->ajax()) {
    //         $mangajob = explode("\n", $request->url);
    //         foreach ($mangajob as $keyid => $manga) {
    //             $web = parse_url($manga);
    //             $url[] = [
    //                 'id' => $id_manga + $keyid + 1,
    //                 'url_manga' => $manga,
    //                 'web' => $web['scheme'] . '://' . $web['host'] . '/',
    //                 'slug' => $web['path'],
    //                 'created_at' => now(),
    //                 'updated_at' => now()
    //             ];
    //         }
    //         MangaJob::insert($url);
    //         dataMangaJob::dispatch($request->url);
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Berhasil!',
    //     ]);
    // }

    public function delete($id)
    {
        $this->authorize('manga_job_delete');
        $chapter = Chapter::where('manga_id', $id);
        $chapter->delete();

        $manga = Manga::find($id);
        $manga->delete();

        $mangajob = MangaJob::find($id);
        $mangajob->delete();

        return redirect()->route('mangajob')->with('message', 'Data Berhasil dihapus!');
    }
}
