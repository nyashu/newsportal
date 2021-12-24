<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use App\Models\Contactus;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){
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

    //Admin
    public function contactus(){
        $contactus = Contactus::all();
        return view('dashboard.contactus', ['contactus' => $contactus]);
    }

    public function aboutus(){
        $aboutus = Aboutus::all();
      return view('dashboard.aboutus',compact('aboutus'));
       
    }
    public function dashabout(Request $request){
        $aboutus = $request->validate([
            'whoweare'=>'required|max:10000',
            'officelocation' => 'required',
            'contactus' => 'required',
        ]);     
        Aboutus::first()->update($aboutus);
        $aboutus = Aboutus::all();

        return view('dashboard.aboutus',compact('aboutus'));
    }
}
