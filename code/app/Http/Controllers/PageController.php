<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brick;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $bricks = \DB::table('bricks')->get(['id','title']);
        $jbricks = json_encode($bricks);
        return view('welcome', compact('jbricks'));
    }

    public function show($code = null)
    {
        $title = "Page:".$code;
        $ids = explode("-",$code);

        $bricks_mods = DB::table('bricks')->whereIn('id', $ids)->get()->keyBy('id');

        $bricks =  array_map(function($id) use ($bricks_mods) {
            return $bricks_mods[$id] ?? null;
        }, $ids);

        return view('preview', compact('bricks','title'));
    }
}
