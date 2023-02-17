<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Ticket;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('tickets.index')
            ->with(['categories' => Category::all()]);
    }



    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:125',
            'message' => 'required|min:12',
            'category_id' => 'required'
        ]);

        $fields = $request->only(['title', 'message', 'category_id']);

        $ticket = new Ticket();
        $ticket->user_id = auth()->user()->id;
        $ticket->title = $fields['title'];
        $ticket->category_id = $fields['category_id'];
        $ticket->message = $fields['message'];
        $ticket->status_id = 1;
        $ticket->save();

        return back();
    }

    public function delete($id) {
        Ticket::destroy($id);

        return back();
    }

    public function show($id) {
        $ticket = Ticket::find($id);

        if($ticket == null){
            redirect('/');
        }

        return view('tickets.form')
            ->with(['ticket' => $ticket, 'categories' => Category::all()]);
    }

    public function update(Request $request) {
        $request->validate([
            'id' => 'required',
            'title' => 'required|max:125',
            'message' => 'required|min:12',
            'category_id' => 'required'
        ]);

        $fields = $request->only(['id', 'title', 'message', 'category_id']);

        $ticket = Ticket::find($fields['id']);

        $ticket->title = $fields['title'];
        $ticket->category_id = $fields['category_id'];
        $ticket->message = $fields['message'];
        $ticket->save();

        return back();
    }


    public function all() {
        if(Gate::allows('support')){
            return view('tickets.all')
                ->with(['tickets' => Ticket::all()->where('status_id', '!=', 6)]);
        }

        return redirect('/');
    }


    public function allShow($id) {
        if(Gate::denies('support')) {
            return redirect('/');
        }

        $ticket = Ticket::find($id);
        if($ticket == null){
            redirect('/ticket/s/all');
        }

        return view('tickets.allForm')
            ->with(['ticket' => $ticket, 'categories' => Category::all(), 'statuses' => Status::all()]);
    }


    public function allUpdate(Request $request) {

        if(Gate::denies('support')) {
            return redirect('/');
        }

        $request->validate([
            'id' => 'required',
            'status_id' => 'required'
        ]);

        $fields = $request->only(['id','status_id']);

        $ticket = Ticket::find($fields['id']);

        $ticket->status_id = $fields['status_id'];
        $ticket->save();

        return back();
    }

}
