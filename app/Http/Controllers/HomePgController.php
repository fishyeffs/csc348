<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePgController extends Controller
{
    public function index() {
        return view('components.home');
    }
}
