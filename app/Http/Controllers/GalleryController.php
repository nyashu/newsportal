<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        // $this->authorize('isAdmin');
    }

    
    public function gallery()
    {
        return view('dashboard.addphotos');
    }


    public function addgallery(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg',
        ]);
        $path = Storage::putFileAs(
            'public/images',
            $request->file('image'),
            Str::uuid()
        );
        // dd($path);
        $image = new Image;
        $image->image = $path;
        $image->save();
        return view('dashboard.addphotos')->with('success', 'Succesfully published on website');
    }
}
