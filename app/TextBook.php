<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextBook extends Model
{
    // protected $table = 'text_books'; // Instead of forcing
    
    protected $fillable = [
        'title',
        'author',
        'topic'
    ];
}
