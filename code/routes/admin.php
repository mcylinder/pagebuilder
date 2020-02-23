<?php

// Register Twill routes here (eg. Route::module('posts'))

Route::module('bricks');

Route::name('brick.chip.render')->get('bricks', 'BrickController@checkRender');
Route::name('bricks.index')->get('bricks_index', 'BrickController@index');


