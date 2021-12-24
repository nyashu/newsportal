<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        //for headline

        $head = Post::find(2);
        // dd($headline);
        //for grid
        $result = Post::orderBy('id')->get();

        return view('newsportal.home', [
            'result' => $result,
            'head' => $head
         ]);


    }
}
