<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index() {
        return view('admin.user.index')
        ->with(['users' => User::all(), 'roles' => Role::all()]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|min:4',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'role_id' => 'required'
        ]);

        $fields = $request->only(['name', 'email', 'password', 'role_id']);

        $user = new User();
        $user->name =  $fields['name'];
        $user->password = Hash::make($fields['password']);
        $user->email = $fields['email'];
        $user->role_id = $fields['role_id'];

        $user->save();

        return redirect('/admin/user');
    }


    public function show($id) {
        $user = User::find($id);

        if($user == null) {
            return back();
        }

        return view('admin.user.form')
            ->with(['user' => $user]);
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required|string|min:4',
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed|min:8',
            'role_id' => 'required'
        ]);

        $fields = $request->only(['id', 'name', 'email', 'password', 'role']);

       $user = User::find($fields['id']);

       if($user == null) {
            return back();
       }

       $user->name = $fields['name'];
       $user->email = $fields['email'];
       $user->password = Hash::make($fields['password']);
       $user->role_id = $fields['role_id'];

       $user->save();
       return back();

    }

    public function delete($id) {
        User::destroy($id);

        return back();
    }
}
