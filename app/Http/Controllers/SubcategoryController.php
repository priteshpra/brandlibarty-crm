<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategory = DB::select("call usp_A_GetSubCategory()");
        $category = Category::all()->where('Status', 1);
        $data['title'] = 'Subcategory';
        return view('admin.subcategory.list', compact('data', 'subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all()->where('Status', 1);
        return view('admin.subcategory.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'SubCategoryName' => 'required',
            'CategoryID' => 'required',
            'Status' => 'required',
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $status = ($request->Status == 'on' ? '1' : '0');
            $IP = $request->ip();
            $sub = DB::select("call usp_A_AddSubCategory(?,?,?,?,?,?)", array($request->SubCategoryName, $request->CategoryID, $ModifiedBy, $status, 'Admin Web', $IP));

            return redirect()->route('subcategory.index')
                ->with('success', 'Sub Category created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try another!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        return view('admin.subcategory.edit', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        $category = Category::all()->where('Status', 1);
        return view('admin.subcategory.edit', compact('subcategory', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'SubCategoryName' => 'required',
            'CategoryID' => 'required',
            'Status' => 'required',
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $status = ($request->Status == 'on' ? '1' : '0');
            $IP = $request->ip();
            $ID = $request->SubCategoryID();
            $country = DB::select("call usp_A_AddSubCategory(?,?,?,?,?,?,?)", array($request->SubCategoryName, $request->CategorID, $ModifiedBy, $status, $ID, 'Admin Web', $IP));


            return redirect()->route('subcategory.index')
                ->with('success', 'Sub Category updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try another!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        //
    }

    public function getSubcat(Request $request)
    {
        $CatID = $request->input('CatID');
        $subCatData = Subcategory::select('SubCategoryID', 'SubCategoryName')->where('Status', 1)->where('CategoryID', $CatID)->get();
        $html = "<option>Select Sub Category</option>";
        foreach ($subCatData as $key => $value) {
            $html .= "<option value='$value->SubCategoryID'> $value->SubCategoryName </option>";
        }
        return response()->json(['success' => 'Laravel ajax example is being processed.', 'dataArray' => $html]);
    }
}
