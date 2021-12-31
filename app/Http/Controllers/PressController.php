<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Press;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PressController extends Controller
{
    public function index(){
        $press = Press::all();
        $result = Press::orderBy('id')->get();

        $image = Image::all();
        return view('newsportal.press',compact('press', 'result', 'image'));
    }
    public function dashinterview(){
        $interview = Press::all();
      return view('dashboard.interviews',compact('interview'));
    }
    //Add Interview
    public function addinterview()
    {
        return view('dashboard.addinterviews');
    }
     public function postinterview(Request $request){
     $request->validate([
            'title' => 'required',
            'source' => 'required',
        ]);
        //getting admin id
        // $id = auth()->user()->id;
        // $user = User::find($id);
        $press = new Press;
        $press->news_title = $request->title;
        $press->source = $request->source;
        $press->save();
        return view('dashboard.addinterviews')->with('success', 'Succesfully published on website');
     }
     //Edit Interviews
     public function editinterview($id){
        $data = Press::find($id);    
         return view('dashboard.editinterviews', compact('data'));
     }
     public function updateinterview(Request $request, $id)
     {
         $request->validate([
             'title' => 'required',
             'source' => 'required'
         ]);
         $press = Press::findOrFail($id);
         $press->news_title = $request->title;
         $press->source = $request->source;
         $press->update();
         return back()->with('success', 'successfully updated !!');
     }
     public function delete($id)
     {
         Press::find($id)->delete();
         return back()->with('success', 'successfully deleted !!');
     }
      //gallery
    
}
