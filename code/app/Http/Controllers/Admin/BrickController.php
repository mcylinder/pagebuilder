<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Models\Brick;
use Illuminate\Support\Facades\Storage;

class BrickController extends ModuleController
{
    protected $moduleName = 'bricks';

    protected $indexColumns = [
        'title' => [
            'title' => 'Title',
            'field' => 'title',
        ],
        'image' => [
            'title' => 'Brick Image',
            'field' => 'brick_image',
        ],
        ];


    public function checkRender()
    {
        $bricks = Brick::all();

        $bricks_need_image = [];

        foreach ($bricks as $brick) {
            $file_path = 'public/'.$brick->id . '.png';
            if (Storage::disk('local')->exists($file_path)) {
                $time = \Storage::disk('local')->lastModified($file_path) ?? 0;
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
