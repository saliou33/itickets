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
            'password' => 'required|string|confirmed|min:4',
            'role_id' => 'required'
        ]);

        $fields = $request->only(['name', 'email', 'password', 'role_id']);

        $user = new User();
        $user->name =  $fields['name'];
        $user->password = Hash::make($fields['password']);
        $user->email = $fields['email'];
        $user->role_id = $fields['role_id'];

        $user->save();

        return back()->with('sucess', 'utilisateur creer avec succes.');
    }


    public function show($id) {
        $user = User::find($id);

        if($user == null) {
            return back()->with('danger', 'utilisateur introuvable.');
        }

        return view('admin.user.form')
            ->with(['user' => $user, 'roles' => Role::all()]);
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required|string|min:4',
            'email' => 'required|string|email',
            'role_id' => 'required'
        ]);

        $fields = $request->only(['id', 'name', 'email', 'role_id']);

       $user = User::find($fields['id']);

       if($user == null) {
            return back()->with('danger', 'utilisateur introuvable.');;
       }

       $user->name = $fields['name'];
       $user->email = $fields['email'];
       $user->role_id = $fields['role_id'];

       $user->save();
       return back()->with('info', 'utilisateur modifier avec succes.');;

    }

    public function delete($id) {
        User::destroy($id);

        return back()->with('warning','utilisateur supprimer avec succes.' );
    }
}
