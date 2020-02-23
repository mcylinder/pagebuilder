<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Models\Brick;
use Illuminate\Support\Facades\Storage;

class BrickController extends ModuleController
{
    protected $moduleName = 'bricks';

    public function checkRender()
    {
        $bricks = Brick::all();

        $bricks_need_image = [];

        foreach ($bricks as $brick) {
            if (Storage::disk('local')->exists($brick->id . '.png')) {
                $time = \Storage::disk('local')->lastModified($brick->id . '.png') ?? 0;
            } else {
                $time = 0;
            }

            if ($time <= strtotime($brick->updated_at)) {
                $bricks_need_image[] = $brick;
            }
        }
        return $bricks_need_image;
    }
}
