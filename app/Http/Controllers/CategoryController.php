<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Category';
        $category = Category::all()->where('status', 1);
        return view('admin.category.list', compact('data', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoryName' => 'required',
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $Project = new Category();
            $Project->categoryName = $request->categoryName;
            $Project->createdBy = $ModifiedBy;
            $Project->save();

            return redirect()->route('category.index')
                ->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try another!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'categoryName' => 'required'
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $Project = Category::find($category->id);
            $Project->categoryName = $request->categoryName;
            $Project->modifiedBy = $request->ModifiedBy;
            $Project->save();
            return redirect()->route('category.index')
                ->with('success', 'Category updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try another!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $project = Category::find($id);
            $project->status = 0;
            $project->save();
            return redirect()->route('category.index')
                ->with('success', 'Category deleted successfully');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
