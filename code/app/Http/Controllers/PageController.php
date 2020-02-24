<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $bricks = \DB::table('bricks')->get(['id','title']);
        $jbricks = json_encode($bricks);
        return view('welcome', compact('jbricks'));
    }


}
