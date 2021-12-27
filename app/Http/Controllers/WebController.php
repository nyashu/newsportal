<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use App\Models\Contactus;
use App\Models\Post;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        //for headline

        $head = Post::latest()->first();
        // dd($headline);
        //for grid
        $result = Post::orderBy('id')->get();

        return view('newsportal.home', [
            'result' => $result,
            'head' => $head
         ]);


    }

    public function contact(){
        $aboutus = Aboutus::all();
      
        return view('newsportal.contactus',compact('aboutus'));
    }

    public function store(Request $request){
        $contactus = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users',
                'message' => 'required|string'
        ]);

        // dd($contactus);
        Contactus::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
           
           ]);


           $aboutus = Aboutus::all();      
        return view('newsportal.contactus',compact('aboutus'));      

    }
}
