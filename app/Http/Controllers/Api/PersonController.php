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
            $person = Person::orderBy('id','desc')->get();
        }
        else{
            $person = Person::where('updated_at','>',$request->date)->get();
        }

        $data = $person;
        foreach ($person as $item)
        {
            $item['position'] = $item->personPosition['name'];
        }

        return response()->json([
            'data'=>$data
        ],200);
    }
}
