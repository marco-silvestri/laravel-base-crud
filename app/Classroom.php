<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    // Fillables here
    protected $fillable = [
        'name',
        'description'
    ];
}
