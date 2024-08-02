<?php

namespace App\Http\Controllers;

use App\Models\Keywords;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeywordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.keyword.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ModifiedBy = Auth::user()->id;

        $data = new Keywords();
        $data->keywordName = $request->KeywordName;
        $data->title = $request->keyTitle;
        $data->createdBy = $ModifiedBy;
        $data->save();

        return redirect()->route('moz.index')->with('success', 'Keyword created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keywords $keyword)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keywords $keyword)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keywords $keyword)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keywords $keyword)
    {
        //
    }
}
