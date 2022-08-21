<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceRequestController extends Controller
{
    //
    public function store()
    {
        $validated = \request()->validate([
            'user_id' => [Rule::exists('users','id'),'required'],
            'name'=> ['required'],
            'id'=> [Rule::unique('service_requests','id'),'required']
        ]);

        ServiceRequest::create($validated);

        return response()->json([
            'statusCode'=>200,
            'message' => 'success',
            'data'=> [
                'name' => \request()->name
            ]
        ]);
    }
}
