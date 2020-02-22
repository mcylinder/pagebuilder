<?php

namespace App\Models;


use A17\Twill\Models\Model;

class Brick extends Model
{


    protected $fillable = [
        'published',
        'title',
        'html',
    ];

}
