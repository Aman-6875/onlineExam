<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;
class QuestionOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $is_true = [0,1];
        for($i=1;$i<=10;$i++){
            for($j=0;$j<4;$j++){
                if($j==3){
                    $is_true = 1;
                }else{
                    $is_true = 0;
                }
                DB::table('question_options')->insert([
                    'title' => Str::random(10),
                    'question_id' =>$i,
                    'is_true'=> $is_true,
                ]);
            }
           
        }

        DB::table('question_options')->insert([
            'title' => Str::random(10),
            'question_id' =>1,
            'is_true'=> 1,
        ]);
        DB::table('question_options')->insert([
            'title' => Str::random(10),
            'question_id' =>3,
            'is_true'=> 1,
        ]);
       
    }
}
