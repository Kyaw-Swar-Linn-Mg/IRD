<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function getByDate(Request $request)
    {

        if($request->date == 0)
        {
            $data = Category::orderBy('id','desc')->get();
        }
        else{
            $data = Category::where('updated_at','>',$request->date)->get();
        }
        return response()->json([
            'data'=>$data
        ],200);
    }
}
