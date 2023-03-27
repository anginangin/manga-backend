<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'logo_view',
                'display_name' => 'Logo View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'logo_update',
                'display_name' => 'Logo Update',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'warna_tema_view',
                'display_name' => 'Warna Tema View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'warna_tema_update',
                'display_name' => 'Warna Tema Update',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'warna_tema_delete',
                'display_name' => 'Warna Tema Delete',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'iklan_view',
                'display_name' => 'Iklan View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'iklan_create',
                'display_name' => 'Iklan Create',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'iklan_update',
                'display_name' => 'Iklan Update',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'name' => 'iklan_delete',
                'display_name' => 'Iklan Delete',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'name' => 'banner_view',
                'display_name' => 'Banner View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'name' => 'banner_create',
                'display_name' => 'Banner Create',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'name' => 'banner_update',
                'display_name' => 'Banner Update',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'name' => 'banner_delete',
                'display_name' => 'Banner Delete',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'name' => 'seo_view',
                'display_name' => 'Seo View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'name' => 'seo_update',
                'display_name' => 'Seo Update',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 16,
                'name' => 'pages_view',
                'display_name' => 'Pages View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'name' => 'pages_create',
                'display_name' => 'Pages Create',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 18,
                'name' => 'pages_update',
                'display_name' => 'Pages Update',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 19,
                'name' => 'pages_delete',
                'display_name' => 'Pages Delete',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 20,
                'name' => 'rilisan_terbaru_view',
                'display_name' => 'Rilisan Terbaru View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 21,
                'name' => 'rilisan_terbaru_update',
                'display_name' => 'Rilisan Terbaru Update',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 22,
                'name' => 'rilisan_terbaru_delete',
                'display_name' => 'Rilisan Terbaru Delete',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 23,
                'name' => 'manga_popular_view',
                'display_name' => 'Manga Popular View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 24,
                'name' => 'manga_popular_update',
                'display_name' => 'Manga Popular Update',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 25,
                'name' => 'slider_most_view_view',
                'display_name' => 'Slider Most View View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 26,
                'name' => 'slider_most_view_create',
                'display_name' => 'Slider Most View Create',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 27,
                'name' => 'slider_most_view_update',
                'display_name' => 'Slider Most View Update',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 28,
                'name' => 'slider_most_view_delete',
                'display_name' => 'Slider Most View Delete',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 29,
                'name' => 'slider_most_rating_view',
                'display_name' => 'Slider Most Rating View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 30,
                'name' => 'slider_most_rating_create',
                'display_name' => 'Slider Most Rating Create',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 31,
                'name' => 'slider_most_rating_update',
                'display_name' => 'Slider Most Rating Update',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 32,
                'name' => 'slider_most_rating_delete',
                'display_name' => 'Slider Most Rating Delete',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 33,
                'name' => 'slider_rekomendasi_view',
                'display_name' => 'Slider Rekomendasi View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 34,
                'name' => 'slider_rekomendasi_create',
                'display_name' => 'Slider Rekomendasi Create',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 35,
                'name' => 'slider_rekomendasi_update',
                'display_name' => 'Slider Rekomendasi Update',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 36,
                'name' => 'slider_rekomendasi_delete',
                'display_name' => 'Slider Rekomendasi Delete',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 37,
                'name' => 'manga_job_view',
                'display_name' => 'Manga Job View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 38,
                'name' => 'manga_job_update',
                'display_name' => 'Manga Job Update',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 39,
                'name' => 'manga_job_delete',
                'display_name' => 'Manga Job Delete',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 40,
                'name' => 'list_manga_view',
                'display_name' => 'List Manga View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 41,
                'name' => 'list_manga_delete',
                'display_name' => 'List Manga Delete',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 42,
                'name' => 'blacklist_manga_view',
                'display_name' => 'Black List View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 43,
                'name' => 'blacklist_manga_restore',
                'display_name' => 'Black List Restore',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 44,
                'name' => 'list_comment_view',
                'display_name' => 'List Comment View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 45,
                'name' => 'list_comment_reply',
                'display_name' => 'List Comment Reply',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 46,
                'name' => 'list_comment_delete',
                'display_name' => 'List Comment Delete',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 47,
                'name' => 'administrator_view',
                'display_name' => 'Administrator View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 48,
                'name' => 'administrator_create',
                'display_name' => 'Administrator Create',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id' => 49,
                'name' => 'administrator_permission',
                'display_name' => 'Administrator Permission',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 50,
                'name' => 'administrator_delete',
                'display_name' => 'Administrator Delete',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 51,
                'name' => 'member_view',
                'display_name' => 'Member View',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 52,
                'name' => 'warna_tema_create',
                'display_name' => 'Warna Tema Create',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 53,
                'name' => 'list_manga_update',
                'display_name' => 'List Manga Update',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        \DB::table('permissions')->delete();
        \DB::table('permissions')->insert($data);
    }
}
