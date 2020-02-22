<?php

namespace App\Repositories;


use A17\Twill\Repositories\ModuleRepository;
use App\Models\Brick;

class BrickRepository extends ModuleRepository
{
    

    public function __construct(Brick $model)
    {
        $this->model = $model;
    }
}
