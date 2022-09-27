<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;
class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){
            DB::table('questions')->insert([
                'title' => Str::random(10),
                'number' => 1.0,
                'answering_time' => 10,
                'question_bank_id' =>1
            ]);
        }
        
    }
}
