<?php

namespace App\Jobs;

use Goutte\Client;
use App\Models\Manga;
use App\Models\Chapter;
use Illuminate\Support\Str;
use App\Models\ChapterImage;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Symfony\Component\HttpClient\HttpClient;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class dataMangaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = [];
        $mangas = [];
        $chapter = [];
        $chapter_image = [];

        $upload_poster = [];
        $upload_image_chapter = [];

        $idm = Manga::select('id')->orderBy('id', 'desc')->first();
        $id_manga = ($idm != null) ? $idm['id'] : 0;

        $mangajob = explode("\n", $this->request);

        $client = new Client(HttpClient::create(['verify_peer' => false]));

        // SCRAPING FROM URL TO GET MANGA INFORMATIONS
        foreach ($mangajob as $key => $value) {
            $url[$key] = $value;
            $slug[$key] = explode("/", $url[$key]);
            $check_host[$key] = $slug[$key][0] . '//' . $slug[$key][2];
            $node[$key] = $client->request('GET', $url[$key]);

            if ($check_host[$key] == 'https://komikstation.co') {
                $this->information[$key]['id'] = $id_manga + $key + 1;
                $this->information[$key]['url'] = $url[$key];
                $this->information[$key]['poster'] = $node[$key]->filter('.thumb img')->attr('src');
                $this->information[$key]['title'] = $node[$key]->filter('.infox h1')->text();
                $this->information[$key]['slug'] = $slug[$key][4];
                $this->information[$key]['description'] = $node[$key]->filter('.desc p')->text();
                $this->information[$key]['table_info']    =   $node[$key]->filter('.spe')->filter('span')->each(function ($tr) {
                    $data = [
                        'key' => $tr->filter('span b')->text(),
                        'value' => $tr->filter('span')->text()
                    ];
                    return $data;
                });
                $this->information[$key]['genres'] = $node[$key]->filter('.spe span')->first()->filter('a')->each(function ($a) {
                    $data = [
                        'genre' => $a->filter('a')->text()
                    ];
                    return $data;
                });
                $this->information[$key]['chapters'] = $node[$key]->filter('.bixbox ul')->filter('li')->each(function ($li) {
                    $data = [
                        'cp' => $li->filter('.lchx')->text(),
                        'url' => parse_url($li->filter('.lchx a')->attr('href'))
                    ];
                    return $data;
                });
            } else {
                $this->information[$key]['id'] = $id_manga + $key + 1;
                $this->information[$key]['url'] = $url[$key];
                $this->information[$key]['poster'] = $node[$key]->filter('.thumb img')->attr('src');
                $this->information[$key]['title'] = $node[$key]->filter('.seriestucon h1')->text();
                $this->information[$key]['slug'] = $slug[$key][4];
                $this->information[$key]['description'] = $node[$key]->filter('.seriestuhead p')->text();
                $this->information[$key]['table_info']    =   $node[$key]->filter('.infotable')->filter('tr')->each(function ($tr) {
                    $data = [
                        'key' => $tr->filter('tr td')->eq(0)->text(),
                        'value' => $tr->filter('tr td')->eq(1)->text()
                    ];
                    return $data;
                });
                $this->information[$key]['genres'] = $node[$key]->filter('.seriestugenre')->filter('a')->each(function ($a) {
                    $data = [
                        'genre' => $a->filter('a')->text()
                    ];
                    return $data;
                });
                $this->information[$key]['chapters'] = $node[$key]->filter('.clstyle')->filter('li')->each(function ($li) {
                    $data = [
                        'cp' => $li->filter('.chapternum')->text(),
                        'url' => parse_url($li->filter('a')->attr('href'))
                    ];
                    return $data;
                });
            }
            $informations = $this->information;
        }

        // LOOPING MANGA INFORMATIONS
        foreach ($informations as $keys => $val) {
            $alphabet = mb_substr($val['title'], 0, 1);
            $isNumeric = preg_match('/^[0-9]+$/', mb_substr($val['title'], 0, 1));
            $isAlphabet = preg_match('/^[A-Z]+$/', mb_substr($val['title'], 0, 1));

            if ($isNumeric) {
                $sort = "0-9";
            } elseif ($isAlphabet) {
                $sort = $alphabet;
            } else {
                $sort = "other";
            }

            $upload_poster[] = [
                'poster' => $val['poster']
            ];

            $mangas[] = [
                'id' => $val['id'],
                'poster' => 'storage/images/' . basename($val['poster']),
                'title' => $val['title'],
                'slug' => $val['slug'],
                'description' => $val['description'],
                'information' => json_encode($val['table_info']),
                'genre' => json_encode($val['genres']),
                'sort' => $sort,
                'created_at' => now(),
                'updated_at' => now()
            ];

            foreach ($val['chapters'] as $taibabi => $komik) {
                $chapter[] = [
                    'manga_id' => $val['id'],
                    'chapter' => $komik['cp'],
                    'domain' => $komik['url']['scheme'] . '://' . $komik['url']['host'],
                    'path' => $komik['url']['path'],
                    'created_at' => now(),
                    'updated_at' => now()
                ];

                $komikUrl[$keys][$taibabi] = $komik['url']['scheme'] . '://' . $komik['url']['host'] . $komik['url']['path'];
                $nodes[$keys][$taibabi] = $client->request('GET', $komikUrl[$keys][$taibabi]);

                $this->upload[$keys][$taibabi]['title'] = $nodes[$keys][$taibabi]->filter('.allc a')->text();
                $this->upload[$keys][$taibabi]['slug'] = $komik['url']['path'];

                if ($komik['url']['host'] == 'komikstation.co') {
                    $this->upload[$keys][$taibabi]['chapter'] = str_replace('Bahasa Indonesia', '', substr($nodes[$keys][$taibabi]->filter('.headpost h1')->text(), strpos($nodes[$keys][$taibabi]->filter('.headpost h1')->text(), 'Chapter')));
                } else {
                    $this->upload[$keys][$taibabi]['chapter'] = str_replace('Bahasa Indonesia', '', substr($nodes[$keys][$taibabi]->filter('.entry-title')->text(), strpos($nodes[$keys][$taibabi]->filter('.entry-title')->text(), 'Chapter')));
                }

                if (strpos($komikUrl[$keys][$taibabi], '92.87.6.124') == true) {
                    $image = file_get_contents($komikUrl[$keys][$taibabi]);
                    $strToArr = explode("<script>", $image);
                    $str_start = substr($strToArr[6], 14);
                    $str_end = str_replace(");", "", $str_start);
                    $str_str = str_replace("/", "", $str_end);
                    $str_a = str_replace("{", "", $str_str);
                    $str_b = str_replace("}", "", $str_a);
                    $str_c = str_replace('"', '', $str_b);
                    $str_d = str_replace('images:[', '', $str_c);
                    $str_e = str_replace(']]', '', $str_d);
                    $final = explode(",", $str_e);
                    $image = $final;
                    $anjingsia = [];
                    foreach ($image as $keyos => $img) {
                        if (
                            strpos($img, '.jpg') == TRUE || strpos($img, '.png') == TRUE || strpos($img, '.jpeg') ==
                            TRUE || strpos($img, '.webp') == TRUE
                        ) {
                            $anjingsia[$keyos] = [
                                'img_cp' => $img
                            ];
                        }
                    }
                    $this->upload[$keys][$taibabi]['images'] = $anjingsia;
                } else {
                    $this->upload[$keys][$taibabi]['images'] = $nodes[$keys][$taibabi]->filter('#readerarea')->filter('img')->each(function ($img) {
                        $data = [
                            'img_cp' => $img->filter('img')->attr('src')
                        ];
                        return $data;
                    });
                }
            }
            $komiks = $this->upload;
        }

        // UPLOAD IMAGE TO WEB SERVER
        foreach ($komiks as $kontol) {
            foreach ($kontol as $kontol2) {
                foreach ($kontol2['images'] as $babi3 => $kontol3) {
                    $url[$babi3] = str_replace('\\', '/', $kontol3['img_cp']);
                    $upload_image_chapter[] = [
                        'title' => $kontol2['title'],
                        'chapter' => $kontol2['chapter'],
                        'image_url' => $url[$babi3]
                    ];
                    $chapter_image[] = [
                        'slug' => $kontol2['slug'],
                        'image' => 'storage/uploads/' . Str::slug($kontol2['title'], '-') . '/' . Str::slug($kontol2['chapter'], '-') . '/' . basename($url[$babi3]),
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                }
            }
        }

        // STORE ARRAY DATA
        Http::withoutVerifying()->post(config('constant.local.URL_API_IMAGE') . '/api/image', [
            'data' => $upload_poster
        ]);
        Http::withoutVerifying()->post(config('constant.local.URL_API_IMAGE') . '/api/image-chapter', [
            'data' => $upload_image_chapter
        ]);
        Manga::insert($mangas);
        Chapter::insert($chapter);
        ChapterImage::insert($chapter_image);
    }
}
