<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    //

    public function register(Request $request){
        try{
            $this->validate($request, [
                'email' => 'required|email|unique:users',
                'name' => 'required',
                'age' => 'required|integer',
                'password' => ['required'],
                'gender'=>'required'
            ]);
        }catch (ValidationException $exception) {
            $response = collect(['accepted' => false, $exception->errors()]);

            return  $response;
        }
        $user=User::create([
            'email'=>$request->email,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'password'=> Hash::make($request->password),
            'age'=>$request->age,

        ]);
        $response = collect(['accepted' => true]);

        return $response;
    }

    public function login(Request $request){

        try{
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);
        }catch (ValidationException $exception) {
            $response = collect(['authenticated' => false, $exception->errors()]);
            return $response;
        }

        $user = User::where('email', $request->email)->first();


        if (!$user || !Hash::check($request->password, $user->password)){
            $response = collect(['authenticated' => false]);
            return $response;
        }



        $response = collect(['authenticated' => true,'user'=>$user]);
        return $response;
    }

    public function getUser($id){
        return User::find($id);
    }
}
