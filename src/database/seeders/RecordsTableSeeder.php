<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cb = Carbon::now();
        $date = $cb->subDays(30);

        for ($i=0; $i < 31; $i++) { 
            DB::table('records')->insert([
                'learned_date' => $date,
                'learned_hour' => Arr::random(range(1, 8)),
            ]);
            $date = $date->addDays(1);
        }
    }
}
