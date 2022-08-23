<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function store(){

        $validated = \request()->validate([
            'email' => ['required',Rule::exists('users','email')],
            'password' => 'required'
        ]);
        if(auth()->attempt($validated)){
            return response()->json([
                'statusCode'=> 200,
                'message'=> 'Logged in successfully',
                'data' => [
                    'name' => auth()->$validated->name,
                ]
                ]
            );
        }
        return response()->json([
                'statusCode'=> 201,
                'message'=> 'Logged in failed',
            ]
        );
    }
    public function test(){

        return response()->json([
           'statusCode' => 200,
            'data' => [
                'name'=> 'jad',
                'age' => 20
            ]
        ]);
    }



}
