<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use App\Models\Contactus;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }




    //Admin
    public function contactus(){
        $contactus = Contactus::latest()->paginate(6);
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
