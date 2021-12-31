<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class StatusController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
        // $this->authorize('isAdmin');
    }

    
    public function status($id, $stat)
    {
        $post = Post::find($id);
        if ($stat == 0) {
            $post->status = 1;
        } else {
            $post->status = 0;
        }
        $post->save();

        return back();
    }
}
