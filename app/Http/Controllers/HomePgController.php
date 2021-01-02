<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePgController extends Controller
{
    public function index() {
        //dd(auth()->user()->threads);
        return view('components.home');
    }
}
