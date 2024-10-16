<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Prompt;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Customers;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $domain = Project::all()->where('status', 1)->count();
        $user = Customers::all()->where('Status', 1)->count();
        $blogs = Blog::all()->where('status', 1)->count();
        $categoryList = Category::all()->where('status', 1);

        return view('admin.dashboard', compact('domain', 'user', 'blogs', 'categoryList'));
    }
}
