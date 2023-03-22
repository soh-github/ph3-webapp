<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Record;
use Illuminate\Support\Arr;

class learnedContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = Record::max('id');
        for ($i=1; $i <= $n; $i++) { 
            DB::table('learnedContents')->insert([
                'record_id' => $i,
                'content_id' => Arr::random([1,2,3]),
            ]);
            
        }
    }
}
