<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('saveimage', function (Request $request) {
    $id = $request->id;
    $img_strng = substr($request->dataUrl, strpos($request->dataUrl, ",")+1);
    $file = base64_decode($img_strng );
    Storage::disk('local')->put($id . '.png', $file);

    return response()->json(['id' => $id,'success' => 'success'], 200);
});
