<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        return view('dashboard.index');
    }
    
    public function add_post()
    {
        return view('dashboard.addpost');
    }



    public function add_post_request(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg',
        ]);



        $path = Storage::putFileAs(
            'public/images', $request->file('image'), Str::uuid()
         );

        // $image_name = $request->file('image')->getClientOriginalName();

        //getting admin id
        $id = auth()->user()->id;
        $user = User::find($id);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $path;

        $user->post()->save($post);

        return redirect()->route('addpost')->with('success', 'Succesfully created post, On queue');
    }




    public function view_post()
    {
        $data = Post::latest()->paginate(5);
        return view('dashboard.viewpost', compact('data'))->with('no', 1);
    }
    

    public function edit($id)
    {
        $data = Post::find($id);
        return view('dashboard.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $post = Post::findOrFail($id);

        if($request->hasFile('image'))
        {
            $path = Storage::putFileAs(
                'public/images', $request->file('image'), Str::uuid()
             );
             $post->image = $path;
        }
        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();

        return redirect()->route('viewpost')->with('success', 'successfully updated !!');
        
    }

    public function delete($id)
    {
        
        Post::find($id)->delete();
        return redirect()->route('viewpost')->with('success', 'successfully deleted !!');
    }
}
