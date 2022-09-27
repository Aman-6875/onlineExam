<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionBank extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function questions()
    {
        return $this->hasMany(Question::class, 'question_bank_id', 'id');
    }

}
