<?php

namespace App\Console\Commands;

use Goutte\Client;
use App\Models\Manga;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UploadImageCron extends Command
{
    protected $signature = 'uploadimage:cron';
    protected $description = 'Cronjob upload image ke web server';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        
    }

    // public function handle()
    // {
    //     $startTime = microtime(true);

    //     //$url = [];
    //     //$chapter_image = [];
    //     //$upload_poster = [];
    //     //$upload_image_chapter = [];
    //     $mangas     = [];
    //     $chapters   = [];

    //     //$client = new Client();
    //     $auto_update = new Scraping;

    //     foreach ($auto_update->autoUpdate() as $keys => $value) {
    //         foreach ($value['chapters'] as $taibabi => $komik) {

    //             // $komikUrl[$keys][$taibabi] = $komik['url']['scheme'] . '://' . $komik['url']['host'] . $komik['url']['path'];
    //             // $nodes[$keys][$taibabi] = $client->request('GET', $komikUrl[$keys][$taibabi]);

    //             // $this->upload[$keys][$taibabi]['title'] = $nodes[$keys][$taibabi]->filter('.allc a')->text();
    //             // $this->upload[$keys][$taibabi]['slug'] = $komik['url']['path'];
    //             // $this->upload[$keys][$taibabi]['chapter'] = str_replace('Bahasa Indonesia', '', substr($nodes[$keys][$taibabi]->filter('.entry-title')->text(), strpos($nodes[$keys][$taibabi]->filter('.entry-title')->text(), 'Chapter')));
    //             // $this->upload[$keys][$taibabi]['images'] = $nodes[$keys][$taibabi]->filter('#readerarea')->filter('img')->each(function ($img) {
    //             //     $data = [
    //             //         'img_cp' => $img->filter('img')->attr('src')
    //             //     ];
    //             //     return $data;
    //             // });

    //             $alphabet   = mb_substr($value['title'], 0, 1);
    //             $isNumeric  = preg_match('/^[0-9]+$/', mb_substr($value['title'], 0, 1));
    //             $isAlphabet = preg_match('/^[A-Z]+$/', mb_substr($value['title'], 0, 1));
    //             $sort       = ($isNumeric) ? '0-9' : (($isAlphabet) ? $alphabet : 'other');

    //             // Http::withoutVerifying()->post(config('constant.url.api_image') . 'api/image', [
    //             //     'poster' => $value['poster']
    //             // ]);
    //             // $upload_poster[] = [
    //             //     'poster' => $value['poster']
    //             // ];

    //             $mangas[] = [
    //                 //'poster' => 'storage/images/' . basename($value['poster']),
    //                 'id'            => $value['id'],
    //                 'poster'        => str_replace('https://', 'https://i2.wp.com/', $value['poster']),
    //                 'thumbnail'     => null,
    //                 'title'         => str_replace('Bahasa Indonesia', '', $value['title']),
    //                 'slug'          => $value['slug'],
    //                 'description'   => $value['description'],
    //                 'information'   => json_encode($value['table_info']),
    //                 'genre'         => json_encode($value['genres']),
    //                 'sort'          => $sort,
    //                 'created_at'    => now(),
    //                 'updated_at'    => now()
    //             ];

    //             $chapters[] = [
    //                 'manga_id'      => $value['id'],
    //                 'chapter'       => $komik['cp'],
    //                 'domain'        => $komik['url']['scheme'] . '://' . $komik['url']['host'],
    //                 'path'          => $komik['url']['path'],
    //                 'created_at'    => now(),
    //                 'updated_at'    => now()
    //             ];
    //         }
    //         //$komiks = $this->upload;
    //     }

    //     // foreach ($komiks as $kontol) {
    //     //     foreach ($kontol as $kontol2) {
    //     //         foreach ($kontol2['images'] as $babi3 => $kontol3) {
    //     //             $url[$babi3] = str_replace('\\', '/', $kontol3['img_cp']);
    //     //             Http::withoutVerifying()->post(config('constant.url.api_image') . 'api/image-chapter', [
    //     //                 'title' => $kontol2['title'],
    //     //                 'chapter' => $kontol2['chapter'],
    //     //                 'image_url' => $url[$babi3]
    //     //             ]);
    //     //             // $upload_image_chapter[] = [
    //     //             //     'title' => $kontol2['title'],
    //     //             //     'chapter' => $kontol2['chapter'],
    //     //             //     'image_url' => $url[$babi3]
    //     //             // ];
    //     //             $chapter_image[] = [
    //     //                 'slug' => $kontol2['slug'],
    //     //                 'image' => 'storage/uploads/' . Str::slug($kontol2['title'], '-') . '/' . Str::slug($kontol2['chapter'], '-') . '/' . basename($url[$babi3]),
    //     //                 'created_at' => now(),
    //     //                 'updated_at' => now()
    //     //             ];
    //     //         }
    //     //     }
    //     // }

    //     // Http::withoutVerifying()->post(config('constant.url.api_image') . 'api/image', [
    //     //     'data' => $upload_poster
    //     // ]);
    //     // Http::withoutVerifying()->post(config('constant.url.api_image') . 'api/image-chapter', [
    //     //     'data' => $upload_image_chapter
    //     // ]);
    //     DB::table('manga')->insertOrIgnore($mangas);
    //     DB::table('manga_chapter')->insertOrIgnore($chapters);
    //     // foreach (array_chunk($chapter_image, 5000) as $t) {
    //     //     DB::table('manga_chapter_image')->insertOrIgnore($t);
    //     // }

    //     $endTime = microtime(true);
    //     $timeDiff = $endTime - $startTime;

    //     \Log::info("Auto Update Done " . sprintf('%0.2f', $timeDiff) . " detik");
    // }
}
