<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
    redirect('/');
    }
    public function store(){
        $validated = \request()->validate([
            'email' => ['required',Rule::exists('users','email')],
            'password' => 'required'
        ]);
        if(auth()->attempt($validated)){
            session()->regenerate();
            redirect('/')->with('success',' user logged in');;
        }
    }

}
