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
                $time = \Storage::disk('local')->lastModified($brick->id . '.png');
            } else {
                $time = 0;
            }

            if ($time <= strtotime($brick->updated_at)) {
                $bricks_need_image[] = $brick;
            }
        }
        if (count($bricks_need_image) == 0) {
            return redirect('admin/bricks_index');
        } else {
            return view('admin.bricks.render_list', compact('bricks_need_image'));
        }
    }
}
