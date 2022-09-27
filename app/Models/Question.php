<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function questionOptions()
    {
        return $this->hasMany(QuestionOptions::class, 'question_id', 'id');
    }
    public function exam_question()
    {
        return $this->hasOne(ExamQuestion::class, 'question_id', 'id');
    }
}
