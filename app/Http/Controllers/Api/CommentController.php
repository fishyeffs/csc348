<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index() {
        $comments=Comment::orderBy('id', 'desc')->paginate(10);
        return CommentResource::collection($comments);
    }

    
    public function store(Request $request) {
        $this->validate($request, [
            'content'=>'required|max:512'
        ]);
    
        auth()->user()->comments()->create([
            'author'=>auth()->user()->name,
            'content'=>$request->content,
            'user_id'=>auth()->user()->id,
            'thread_id'=> substr(url()->previous(), 25)
        ]);
        
        auth()->user()->threads()->where('id', substr(url()->previous(), 25))->increment('comments');
        
        return redirect()->back();
        
    }
    
}
