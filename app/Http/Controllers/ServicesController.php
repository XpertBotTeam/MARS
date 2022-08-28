<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ServicesController extends Controller
{
    //
    public function showFeed(){

        $data= Service::all();

        if (!$data){
            return ['message'=> 'no events in the current time'];
        }

        return $data;
    }

    public function createService(Request $request){
        try{
            $this->validate($request, [
                'name' => 'required',
                'worker_id' => 'required',
            ]);
        }catch (ValidationException $exception) {
            return['state'=>false, $exception->errors()];
        }
        $data = Service::create([
            'name'=>$request->name,
            'worker_id'=>$request->worker_id,
        ])->get()->last();

        return ['state'=>true,'message'=> 'successful creation!'];

    }

    public function getService($id){
        $data =Service::find($id);

        return ['service'=>$data];
    }
}
