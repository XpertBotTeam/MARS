<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    //
    public function index(){
        $services = ServiceType::all();
        return response()->json([
           'statusCode'=>200,
           'message'=>'success',
           'data'=>$services
        ]);
    }
}
