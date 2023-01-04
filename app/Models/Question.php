<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable=[
        'test_question',
        'option1',
        'option2',
        'option3',
        'option4',
        'descriptive_question',

    ];

    protected $attributes=[
       //
    ];
}
