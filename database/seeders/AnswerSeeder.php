<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            for($i=1;$i<=10;$i++){
                DB::table('answers')->insert([
                    'title' => Str::random(10),
                    'question_id' =>$i
                ]);
            }
            
            DB::table('answers')->insert([
                'title' => Str::random(10),
                'question_id' =>1
            ]);
            DB::table('answers')->insert([
                'title' => Str::random(10),
                'question_id' =>1
            ]);
       
    }
}
