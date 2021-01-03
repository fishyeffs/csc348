<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function index() {
        return view('components.auth.signup');
    }

    public function store(Request $request) {
        //validation
        $this->validate($request, [
            'name'=>'required|max:127',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
        ]);
        //storage

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'admin'=>0
        ]);

        //sign in
        auth()->attempt(
            $request->only('email', 'password')
        );
        //redirect
        return redirect()->route('home');
    }
}
