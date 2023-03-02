<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([
            'content' => 'N予備校',
            'color' => '#2245EC',
        ]);
        DB::table('contents')->insert([
            'content' => 'ドットインストール',
            'color' => '#2371BD',
        ]);
        DB::table('contents')->insert([
            'content' => 'POSSE課題',
            'color' => '#39BDDE',
        ]);
    }
}
