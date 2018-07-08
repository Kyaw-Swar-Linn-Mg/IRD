<?php

namespace App\Http\Controllers\Api;

use App\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{
    public function getByDate(Request $request)
    {
        if($request->date == 0)
        {
            $data = Person::orderBy('id','desc')->get();
        }
        else{
            $data = Person::where('updated_at','>',$request->date)->get();
        }
        return response()->json([
            'data'=>$data
        ],200);
    }
}
