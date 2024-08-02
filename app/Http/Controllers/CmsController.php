<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cms = DB::select("call usp_A_GetCms()");
        $data['title'] = 'Cms';
        return view('admin.cms.list', compact('data', 'cms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cms.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'PageID' => 'required',
            'Status' => 'required',
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $status = ($request->Status == 'on' ? '1' : '0');
            $IP = $request->ip();
            $country = DB::select("call usp_A_AddCms(?,?,?,?,?,?)", array($request->PageID, $request->Content, $ModifiedBy, $status, 'Admin Web', $IP));


            return redirect()->route('cms.index')
                ->with('success', 'Cms created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try another!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cms $cms)
    {
        return view('admin.cms.edit', compact('cms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cms $cm)
    {
        return view('admin.cms.edit', compact('cm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cms $cms)
    {
        $request->validate([
            'PageID' => 'required',
            'Status' => 'required',
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $status = ($request->Status == 'on' ? '1' : '0');
            $IP = $request->ip();
            $ID = $cms->CMSID;
            $cms = DB::select("call usp_A_EditCms(?,?,?,?,?,?,?)", array($request->PageID, $request->Content, $ModifiedBy, $status, $ID, 'Admin Web', $IP));

            return redirect()->route('cms.index')
                ->with('success', 'Cms updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try another!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cms $cms)
    {
        //
    }
}
