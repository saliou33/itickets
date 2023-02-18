<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index() {
        return view('admin.status.index')
            ->with('statuses', Status::all());
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:statuses'
        ]);

        $status = new Status();
        $status->name = $request->input('name');
        $status->save()->with('success', 'etat creer avec succes.');

        return back();
    }


    public function show($id) {
        $status = Status::find($id);

        if($status  == null) {
            return back()->with('danger', 'etat introuvable.');
        }

        return view('admin.status.form')
            ->with('status', $status);
    }

    public function update(Request $request) {

        $request->validate([
            'id' => 'required',
            'name' => 'required|unique:statuss'
        ]);

        $status = Status::find($id);

        if($status  == null) {
            return back()->with('danger', 'etat introuvable.');
        }

        $status->name = $request->input('name');
        $status->save();

        return back()->with('info', 'etat modifier avec succes.');;
    }

    public function delete($id) {
        Status::destroy($id);

        return back()->with('warning', 'etat creer avec succes.');;
    }
}
