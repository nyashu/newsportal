<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        //checking user credentials

        if (Auth::attempt($validated, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        } else {
            return back()->with('fail', 'Incorrect Username password !!!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }



    public function setting()
    {
        return view('dashboard.setting');
    }
    public function change_name($id)
    {
        $name = User::find($id);
        return view('dashboard.changename',compact('name'));
    }
    public function change_password()
    {
        return view('dashboard.changepassword');
    }
    public function change_profile($id)
    {
        $pic = User::find($id);
        return view('dashboard.changeprofile',compact('pic'));
    }
    public function update_name($id,Request $request){
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();
        return redirect()->route('setting')->with('success', 'successfully updated !!');
    }
    public function update_password($id,Request $request){
        $validated = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);
        $password = User::find($id);
        if(Hash::check($validated['old_password'],$password->password)) {
            $password->password = Hash::make($validated['new_password']);
            $password->save();
            return redirect()->route('setting')->with('success', 'successfully updated !!');
        } else {
            return redirect()->route('change_password')->with('success', 'Old Password is wrong!!');
        }
    }
    public function update_profile($id,Request $request){
        $request->validate([
            'profile' => 'required'
        ]);
        $user = User::find($id);
        if($request->hasFile('profile'))
        {
            $path = Storage::putFileAs('public/images', $request->file('profile'), Str::uuid());
            $user->profile_pic = $path;
            $user->save();
        }else{
            dd("no");
        }
        return redirect()->route('setting')->with('success', 'successfully updated !!');
        // dd($validated['image']);
    }
}
