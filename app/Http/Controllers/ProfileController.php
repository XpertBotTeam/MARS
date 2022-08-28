<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function showProfile($id){
        $data = User::firstWhere('id',$id);

        return ['data' => $data];
    }
}
