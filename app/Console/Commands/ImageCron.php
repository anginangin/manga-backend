<?php

namespace App\Console\Commands;

use Goutte\Client;
use App\Models\Manga;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ImageCron extends Command
{
    
    protected $signature = 'image:cron';

    protected $description = 'Cron upload image ke web server';

    public function __construct()
    {
        parent::__construct();
    }

    
    public function handle()
    {
        $startTime = microtime(true);

        $url            = [];
        $client         = new Client();
        $manga          = Manga::select('id', 'poster', 'thumbnail','title')->with('chapters')->where('thumbnail',null)->get();

        foreach ($manga as $i => $info) {
            foreach ($info['chapters'] as $c => $chapter) {
                $komikUrl[$i][$c]                   =   $chapter['domain'] . $chapter['path'];
                $nodes[$i][$c]                      =   $client->request('GET', $komikUrl[$i][$c]);
                $this->upload[$i][$c]['title']      =   $info['title'];
                $this->upload[$i][$c]['slug']       =   $chapter['path'];
                $this->upload[$i][$c]['chapter']    =   $chapter['chapter'];
                if ($chapter['domain'] == config('constant.url.komiktap')) {
                    $image = file_get_contents($chapter['domain'] . $chapter['path']);
                    $stringArr = explode("<script>", $image);
                    $str_start = substr($stringArr[6], 14);
                    $str_end = str_replace(");", "", $str_start);
                    $str_str = str_replace("/", "", $str_end);
                    $str_a = str_replace("{", "", $str_str);
                    $str_b = str_replace("}", "", $str_a);
                    $str_c = str_replace('"', '', $str_b);
                    $str_d = str_replace('images:[', '', $str_c);
                    $str_e = str_replace(']]', '', $str_d);
                    $final = explode(",", $str_e);
                    $image = $final;
                    $getImg = [];
                    foreach ($image as $key => $img) {
                        if (
                            strpos($img, '.jpg') == TRUE || strpos($img, '.png') == TRUE || strpos($img, '.jpeg') ==
                            TRUE || strpos($img, '.webp') == TRUE
                        ) {
                            $getImg[$key] = [
                                'img_cp' => $img
                            ];
                        }
                    }
                    $this->upload[$i][$c]['images'] = $getImg;
                }else{
                    $this->upload[$i][$c]['images'] =   $nodes[$i][$c]->filter('#readerarea')->filter('img')->each(function ($img) {
                        $data = ['img_cp' => $img->filter('img')->attr('src')];
                        return $data;
                    });
                }
            }
            $komiks = $this->upload;
        }

        foreach ($manga as $img) {
            Http::withoutVerifying()->post(config('constant.url.api_image') . '/api/image', ['poster' => $img['poster']]);
            $manga = Manga::find($img['id']);
            $manga->thumbnail = 'storage/images/' . basename($img['poster']);
            $manga->save();
        }

        foreach ($komiks as $k) {
            foreach ($k as $k2) {
                foreach ($k2['images'] as $k3 => $img) {
                    $url[$k3] = str_replace('\\', '/', $img['img_cp']);
                    Http::withoutVerifying()->post(config('constant.url.api_image') . '/api/image-chapter', [
                        'title'     => $k2['title'],
                        'chapter'   => str_replace('Bahasa Indonesia', '', substr($k2['chapter'], strpos($k2['chapter'], 'Chapter'))),
                        'image_url' => $url[$k3]
                    ]);
                    DB::table('manga_chapter_image')->insertOrIgnore([
                        'slug'          => $k2['slug'],
                        'image'         => 'storage/uploads/' . Str::slug($k2['title'], '-') . '/' . Str::slug(str_replace('Bahasa Indonesia', '', substr($k2['chapter'], strpos($k2['chapter'], 'Chapter'))), '-') . '/' . basename($url[$k3]),
                        'created_at'    => now(),
                        'updated_at'    => now()
                    ]);
                }
            }
        }

        $endTime = microtime(true);
        $timeDiff = $endTime - $startTime;

        \Log::info("Upload Image Done -- " . sprintf('%0.2f', $timeDiff) . " detik");
    }
}
