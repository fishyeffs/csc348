<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('components.auth.login');
    }

    public function store(Request $request) {
        //validation
        $this->validate($request, [
            'email'=>'required|email|max:255',
            'password'=>'required',
        ]);

        //attempt login
        if(!auth()->attempt(
            $request->only('email', 'password')
        )) {
            //return to previous page with status below
            return back()->with('status', 'Invalid email and password combination');
        }

        //redirect
        return view('components.home');
    }
}
