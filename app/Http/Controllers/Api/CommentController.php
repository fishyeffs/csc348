<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index() {
        $comments=Comment::orderBy('id', 'desc')->paginate(5);
        return CommentResource::collection(Comment::all());
    }
}
