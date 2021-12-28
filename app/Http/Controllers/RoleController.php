<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
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
}
