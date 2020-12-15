<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TracerStudy extends Model
{
    protected $fillable = [
        'name',
        'currently_working',
        'occupation'
    ];
}
