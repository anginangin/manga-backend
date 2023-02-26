<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('theme_colors')->insert([
            'theme_name'                => 'Default',
            'primary_color'             => '#5f25a6',
            'secondary_color'           => '#7b36ce',
            'primary_base_color'        => '#1f1f1f',
            'secondary_base_color'      => '#2f2f2f',
            'primary_button_color'      => '#C49BFF',
            'secondary_button_color'    => '#ffd702',
            'text_color'                => '#ffffff',
            'created_at'                => now(),
            'updated_at'                => now()
        ]);
    }
}
