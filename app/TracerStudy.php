<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TracerStudy extends Model
{
    protected $fillable = [
        'name',
        'program_study',
        'graduation_year',
        'currently_working',
        'occupation'
    ];
}
