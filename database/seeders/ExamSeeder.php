<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;
class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('exams')->insert([
            'title' => Str::random(10),
            'question_bank_id' =>1,
            'type'=>'per_question_wise',
            'time_limit' => 100,
        ]);
        DB::table('exams')->insert([
            'title' => Str::random(10),
            'question_bank_id' =>1,
            'type'=>'full_exam',
            'time_limit' => 60,
        ]);
    }
}
