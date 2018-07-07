<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\SubCategoryRequest;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::orderBy('id','desc')->get();
        return view('admin.subCategory.index',compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('sub_category',true)->where('state','<>',"delete")->get();
        return view('admin.subCategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        $input = $request->validated();
        $input['state'] = "new";
        SubCategory::create($input);

        return redirect()
            ->route('dashboard.subCategory.index')
            ->with(['flash'=> 'Successfully created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::where('sub_category',true)->where('state','<>',"delete")->get();
        return view('admin.subCategory.edit',compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $subCategory->name = $request->name ? $request->name : $subCategory->name;
        $subCategory->state = "update";
        $subCategory->category_id = $request->category_id ? $request->category_id : $subCategory->category_id;
        $subCategory->update();

        return redirect()
            ->route('dashboard.subCategory.index')
            ->with('flash', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->state = "delete";
        $subCategory->update();
        return redirect()->route('dashboard.subCategory.index')
        ->with('flash', 'Successfully deleted!');
    }
}
