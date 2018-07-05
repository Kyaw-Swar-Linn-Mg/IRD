<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Person;
use App\SubCategory;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        $people = Person::all();
        $categories = Category::all();
        $subCategories = SubCategory::all();

        return view('admin.dashboard.index',compact('users','people','categories','subCategories'));
    }
}
