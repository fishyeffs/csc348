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

    public function update(Request $request, $id) {
        $this->validate($request, [
            'title'=>'required|max:64',
            'content'=>'required|max:512',
        ]);

        $thread = Thread::find($id);
        $thread->title=$request->title;
        $thread->content=$request->content;
        $thread->save();

        return redirect()->route('home');
    }

    public function edit($id) {
        $thread=Thread::find($id);
        return view('components.edit')->with('thread', $thread);
    }

    public function displayThread($id) {
        $thread=Thread::find($id);
        return $thread;
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title'=>'required|max:64',
            'content'=>'required|max:512',
            'image'=> 'nullable|image|mimes:jpeg,png,jpg|max:4096'
        ]);

        $thread = [
            'author'=>auth()->user()->name,
            'title'=>$request->title,
            'content'=>$request->content,
            'noOfComments'=>0,
            'user_id'=>auth()->user()->id,
        ];


        if($request->hasFile('image')) {
            $file=$request->file('image');
            $fileExt=$file->getClientOriginalExtension();
            $filename='http://forum.test/uploads/images/'.time().'.'.$fileExt; //concatenating time of upload with file extension
            $file->move('uploads/images/', $filename);
        }
        else {
            $filename='';
        }

        $thread = [
            'author'=>auth()->user()->name,
            'title'=>$request->title,
            'content'=>$request->content,
            'noOfComments'=>0,
            'user_id'=>auth()->user()->id,
            'img'=>$filename
        ];

        auth()->user()->threads()->create($thread);  

        return redirect()->route('home');
    }

    public function createThreadForm() {
        return view('components.create-thread');
    }

    
}
