<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function exam_questions()
    public function exam_questions()
    {
        return $this->hasMany(ExamQuestion::class, 'exam_id', 'id');
    }

    
}
