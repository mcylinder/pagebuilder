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

    public function getBrickImageAttribute(){
       $file =  \Storage::url($this->id.'.png');

        return '<img style = "width: 262px;box-shadow: 1px 2px 4px #d2d2d2;"  src="'.$file.'">';
}

}
