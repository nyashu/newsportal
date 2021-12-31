<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Null_;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
        // $this->authorize('isAdmin');
    }
    public function index()
    {
        $roles = User::orderBy('role', 'asc')->get();
        return view('dashboard.role', [
            'roles' => $roles
        ]);
    }

    public function make_admin($id)
    {
        $data = User::findOrFail($id);
        $data->role = 'admin';
        $data->save();
        return redirect()->route('role')->with('success', 'Succesfully changed to admin !!!');
    }

    public function make_mod($id)
    {
        $data = User::findOrFail($id);
        $data->role = 'moderator';
        $data->save();
        return redirect()->route('role')->with('success', 'Succesfully changed to moderator !!!');
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('role')->with('success', 'You have succesfully deleted !!!');
    }


    public function view_adduser()
    {
        return view('dashboard.adduser');
    }



    public function adduser(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->profile_pic = null;
        $user->password = Hash::make('12345');
        if ($user->save()) {
            return redirect()->route('role')->with('success', 'You have succesfully added user !!!');
        }
    }
}
