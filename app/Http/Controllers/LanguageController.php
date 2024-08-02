<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $language = DB::select("call usp_A_GetLanguage()");
        $data['title'] = 'Language';
        return view('admin.language.list', compact('data', 'language'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ModifiedBy = Auth::user()->id;
        return view('admin.language.add', compact('ModifiedBy'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'LanguageName' => 'required',
            'Status' => 'required',
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $status = ($request->Status == 'on' ? '1' : '0');
            $IP = $request->ip();

            $language = new Language;

            $language->LanguageName = $request->LanguageName;
            $language->status = $status;
            $language->CreatedBy = $ModifiedBy;
            $language->save();

            return redirect()->route('language.index')
                ->with('success', 'Language created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try another!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Language $language)
    {
        return view('admin.language.show', compact('language'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        $ModifiedBy = Auth::user()->id;
        return view('admin.language.edit', compact('language', 'ModifiedBy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $language)
    {
        $request->validate([
            'LanguageName' => 'required',
            'Status' => 'required',
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $status = ($request->Status == 'on' ? '1' : '0');
            $IP = $request->ip();

            $language = Language::find($language->LanguageID);

            $language->LanguageName = $request->LanguageName;
            $language->status = $status;
            $language->CreatedBy = $ModifiedBy;
            $language->save();

            return redirect()->route('language.index')
                ->with('success', 'Language updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try another!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        //
    }
}
