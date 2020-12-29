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
}
