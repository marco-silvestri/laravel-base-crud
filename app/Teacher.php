<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillables = [
        'name',
        'surname',
        'age',
        'cv_link'
    ];
}
