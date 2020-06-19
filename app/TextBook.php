<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextBook extends Model
{
    protected $fillable = [
        'title',
        'author',
        'topic'
    ];
}
