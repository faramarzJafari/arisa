<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'test_question',
        'descriptive_question',
        'file',
        'location',
        'condition',
        'wind_kph',
    ];

    protected $attributes=[
        'file'=>null
    ];

    public function Users(){
        return $this->hasOne(User::class);
    }
}
