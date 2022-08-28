<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class WorkerController extends Controller
{
    //
    public function createWorker(Request $request){
        try{
            $this->validate($request, [
                'id' => 'required',
                'name' => 'required',
                'details' => 'required',
            ]);
        }catch (ValidationException $exception) {
            return['state'=>false, $exception->errors()];
        }
        $data = Worker::create([
            'id'=>$request->id,
            'name'=>$request->name,
            'details'=>$request->details,
        ]);

        return ['state'=>true,'message'=> 'successful creation!'];

    }
}
