<?php

namespace App\Http\Controllers\Api;

use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    public function getByDate(Request $request)
    {
        if($request->date == 0)
        {
            $data = SubCategory::orderBy('id','desc')->get();
        }
        else{
            $data = SubCategory::where('updated_at','>',$request->date)->get();
        }
        return response()->json([
            'data'=>$data
        ],200);
    }
}
