<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class AffiliateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $affList = Affiliate::all()->where('status', 1);
        $data['title'] = 'Settings';
        return view('admin.affiliate.list', compact('data', 'affList'));
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

        $request->validate([
            'accountName' => 'required',
            'productCat' => 'required',
            'productLink' => 'required',
            'affiliateId' => 'required'
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $Project = new Affiliate();

            $Project->accountName = $request->accountName;
            $Project->productCat = $request->productCat;
            $Project->productLink = $request->productLink;
            $Project->affiliateId = $request->affiliateId;
            $Project->createdBy = $ModifiedBy;
            $Project->save();
            return redirect()->route('affiliate.index')->with('success', 'Affiliate created successfully.');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Affiliate $affiliate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Affiliate $affiliate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'accountName' => 'required',
            'productCat' => 'required',
            'productLink' => 'required',
            'affiliateId' => 'required'
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $Project = Affiliate::find($id);

            $Project->accountName = $request->accountName;
            $Project->productCat = $request->productCat;
            $Project->productLink = $request->productLink;
            $Project->affiliateId = $request->affiliateId;
            $Project->createdBy = $ModifiedBy;
            $Project->save();
            return redirect()->route('affiliate.index')->with('success', 'Affiliate updated successfully.');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $project = Affiliate::find($id);
            $project->status = 0;
            $project->save();
            return redirect()->route('affiliate.index')
                ->with('success', 'Affiliate deleted successfully');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
