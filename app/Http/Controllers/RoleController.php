<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        return view('admin.role.index')
            ->with('roles', Role::all());
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:roles'
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        $role->save();

        return back();
    }


    public function show($id) {
        $role = Role::find($id);

        if($role  == null) {
            return back();
        }

        return view('admin.role.form')
            ->with('role', $role);
    }

    public function update(Request $request) {

        $request->validate([
            'id' => 'required',
            'name' => 'required|unique:roles'
        ]);

        $role = Role::find($id);

        if($role  == null) {
            return back();
        }

        $role->name = $request->input('name');
        $role->save();

        return back();
    }

    public function delete($id) {
        Role::destroy($id);

        return back();
    }
}
