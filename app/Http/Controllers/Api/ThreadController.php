<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ThreadResource;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index() {
        $threads=Thread::orderBy('id', 'desc')->paginate(7);
        return ThreadResource::collection($threads);
    }

    public function displayThread($id) {
        $thread=Thread::find($id);
        return $thread;
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title'=>'required|max:64',
            'content'=>'required|max:512'
        ]);

        auth()->user()->threads()->create([
            'author'=>auth()->user()->name,
            'title'=>$request->title,
            'content'=>$request->content,
            'comments'=>0
        ]);

        return redirect()->route('home');
    }

    public function createThreadForm() {
        return view('components.create-thread');
    }

    
}
