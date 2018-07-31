<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\PersonRequest;
use App\Person;
use App\Position;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::orderBy('id','desc')->get();
        return view('admin.person.index',compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('sub_category',true)->where('state','<>',"delete")->get();
        $subCategories = SubCategory::where('state','<>',"delete")->get();
        $positions = Position::all();
        return view('admin.person.create',compact('categories','subCategories','positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonRequest $request)
    {
        $inputs = $request->validated();
        $inputs['state'] = "new";
        Person::create($inputs);

        return redirect()
            ->route('dashboard.person.index')
            ->with(['flash'=> 'Successfully created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        $categories = Category::where('sub_category',true)->where('state','<>',"delete")->get();
        $subCategories = SubCategory::where('state','<>',"delete")->get();
        $positions = Position::all();
        return view('admin.person.edit',compact('person','categories','subCategories','positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $person->name = $request->name ? $request->name : $person->name;
        $person->position_id = $request->position_id ? $request->position_id : $person->position_id;
        $person->office_phone = $request->office_phone ? $request->office_phone : $person->office_phone;
        $person->hand_phone = $request->hand_phone ? $request->hand_phone : $person->hand_phone;
        $person->state = "update";
        $person->category_id = $request->category_id ? $request->category_id : $person->category_id;
        $person->sub_category_id = $request->sub_category_id ? $request->sub_category_id : $person->sub_category_id;
        $person->update();

        return redirect()
            ->route('dashboard.person.index')
            ->with('flash', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $person->state = "delete";
        $person->update();

        return redirect()
            ->route('dashboard.person.index')
            ->with('flash', 'Successfully removed!');
    }

    public function getSubCategory(Request $request){
        $subCategory = SubCategory::where('category_id',$request->category_id)->get();
        return response()->json($subCategory);
    }
}
