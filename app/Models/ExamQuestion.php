<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function questionOptions()
    {
        return $this->hasMany(QuestionOptions::class, 'exam_question_id', 'id');
    }

    public function question()
    {
        return $this->hasOne(Question::class, 'id', 'question_id')->with('questionOptions');
    }
}
