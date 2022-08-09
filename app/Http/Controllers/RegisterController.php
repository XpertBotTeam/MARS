<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    //
    public function index(){
        redirect('/');
    }
    public function store(){
        $validated = \request()->validate([
            'username' => [Rule::unique('users','username'),'required','max:255'],
            'email'=> [Rule::unique('users','email'),'required','email','max:255'],
            'password'=> ['required','max:255','min:7']
        ]);

        $user=User::create($validated);
        auth()->login($user);

        return redirect('/')->with('success','your user have been created');
    }
}
