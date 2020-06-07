<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Note;

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
        $my_notes = Note::where('user_id', Auth::id())->paginate(10);
        return view('home', compact('my_notes'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
