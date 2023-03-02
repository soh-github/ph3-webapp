<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'language' => 'HTML',
            'color' => '#2245EC',
        ]);
        DB::table('languages')->insert([
            'language' => 'CSS',
            'color' => '#2371BD',
        ]);
        DB::table('languages')->insert([
            'language' => 'JavaScript',
            'color' => '#39BDDE',
        ]);
        DB::table('languages')->insert([
            'language' => 'PHP',
            'color' => '#40CEFE',
        ]);
        DB::table('languages')->insert([
            'language' => 'Laravel',
            'color' => '#B29FF3',
        ]);
        DB::table('languages')->insert([
            'language' => 'SQL',
            'color' => '#6D46EC',
        ]);
        DB::table('languages')->insert([
            'language' => 'SHELL',
            'color' => '#4A17EF',
        ]);
        DB::table('languages')->insert([
            'language' => '情報システム基礎知識（その他）',
            'color' => '#3105C0',
        ]);
    }
}
