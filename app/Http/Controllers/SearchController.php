<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
        // Search in the title and body columns from the posts table
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();
        // Return the search view with the resluts compacted
        return view('newsportal.search', compact('posts'));
    }
    //for single page news
    public function news($id){
        $data = Post::find($id);
        return view('newsportal.news', compact('data'));
    }
}
