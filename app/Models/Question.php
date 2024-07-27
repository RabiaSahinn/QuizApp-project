<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['question',
                         'image',
                         'answerA',
                         'answerB',
                         "answerC",
                         "answerD",
                         "answerE",
                         "correct_answer"
                        ];
                                           
    use HasFactory;
}
