<?php

// Register Twill routes here (eg. Route::module('posts'))

use App\Http\Controllers\Admin\BrickController;

Route::module('bricks');

Route::name('bricks.index')->get('bricks', function(){
    $bricks_need_image =  app(BrickController::class)->checkRender();

    if (!empty($bricks_need_image)) {
        return view('admin.bricks.render_list', compact('bricks_need_image'));
    }

    return app(BrickController::class)->index();
});


