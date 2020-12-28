<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ThreadResource;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index() {
        $threads=Thread::orderBy('id', 'desc')->paginate(10);
        return ThreadResource::collection($threads);
    }
}
