<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $country = DB::select("call usp_A_GetCountry()");
        $data['title'] = 'Country';
        return view('admin.country.list', compact('data', 'country'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.country.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'CountryName' => 'required',
            'Status' => 'required',
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $status = ($request->Status == 'on' ? '1' : '0');
            $IP = $request->ip();
            $country = DB::select("call usp_A_AddCountry(?,?,?,?,?)", array($request->CountryName, $ModifiedBy, $status, 'Admin Web', $IP));


            return redirect()->route('country.index')
                ->with('success', 'Country created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try another!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        return view('admin.country.edit', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('admin.country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
    {
        $request->validate([
            'CountryName' => 'required',
            'Status' => 'required',
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $status = ($request->Status == 'on' ? '1' : '0');
            $IP = $request->ip();
            $ID = $country->CountryID;
            $country = DB::select("call usp_A_EditCountry(?,?,?,?,?,?)", array($request->CountryName, $ModifiedBy, $status, $ID, 'Admin Web', $IP));

            return redirect()->route('country.index')
                ->with('success', 'Country updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try another!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('country.index')
            ->with('success', 'Country deleted successfully');
    }
}
