<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Note;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('notes/create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=>'required|max:255|',
            'description'=>'required|max:500|',
        ]);

        if($validatedData)
        {
            Note::create([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => Auth::id()
            ]);
        }
        return redirect('home');
    }


    public  function edit($id)
    {
        $edit_note = Note::where('id', $id)->first();
        return view('notes.edit', compact('edit_note'));
    }

    public function update(Request $request, $id)
    {
        $user_id = Note::where('id', $id)->value('user_id');
        $validatedData = $request->validate([
            'title'=>'required|max:255|',
            'description'=>'required|max:500|',
        ]);

        if(Auth::id() == $user_id)
        {
            if($validatedData)
            {
            Note::where('id', $id)
                ->update([
                    'title'=>$request->title,
                    'description'=>$request->description
                ]);
            }
        }
        return redirect('home');
    }


    public function delete($id)
    {
       $user_id = Note::where('id', $id)->value('user_id');

       if(Auth::id() == $user_id)
       {
           Note::where('id', $id)->delete();
       }
       return redirect()->back();
    }


}
