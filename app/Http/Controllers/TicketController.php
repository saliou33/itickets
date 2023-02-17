<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\Category;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index() {
        return view('admin.ticket.index')
        ->with(['categories' => Category::all(), 'statuses' => Status::all() ]);
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'title' => 'required|max:125',
            'message' => 'required|min:12',
            'category_id' => 'required',
            'status_id' => 'required'
        ]);

        $fields = $request->only(['user_id', 'title', 'message', 'category_id']);

        if(User::find($fields['user_id'] == null)) {
            return back();
        }


        $ticket = new Ticket();
        $ticket->user_id = $fields['user_id'];
        $ticket->title = $fields['title'];
        $ticket->category_id = $fields['category_id'];
        $ticket->message = $fields['message'];
        $ticket->status_id = $fields['status_id'];
        $ticket->save();

        return back();
    }


    public function show($id) {
        $ticket = Ticket::find($id);

        if($ticket == null){
            redirect('/');
        }

        return view('admin.ticket.form')
            ->with(['ticket' => $ticket, 'categories' => Category::all(), 'statuses' => Status::all()]);
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'user_id' => 'required',
            'title' => 'required|max:125',
            'message' => 'required|min:12',
            'category_id' => 'required',
            'status_id' => 'required'
        ]);

        $fields = $request->only(['id', 'title', 'message', 'category_id', 'user_id', 'status_id']);

        if(User::find($fields['user_id'] == null)) {
            return back();
        }

        $ticket = Ticket::find($fields['id']);

        $ticket->title = $fields['title'];
        $ticket->category_id = $fields['category_id'];
        $ticket->message = $fields['message'];
        $ticket->user_id = $fields['user_id'];
        $ticket->status_id = $fields['status_id'];

        $ticket->save();

        return back();
    }

    public function destroy($id) {
        Ticket::destroy($id);

        return back();
    }
}
