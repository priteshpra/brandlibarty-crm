<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $city = City::all()->where('Status', 1);
        $country = Country::all()->where('Status', 1);
        $state = State::all()->where('Status', 1);
        $data['title'] = 'City';
        $city = DB::select("call usp_A_GetCity()");

        return view('admin.city.list', compact('data', 'city', 'country', 'state'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $country = Country::all()->where('Status', 1);
        $state = State::all()->where('Status', 1);
        $city = City::all()->where('Status', 1);
        return view('admin.city.add', compact('country', 'state', 'city'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'CityName' => 'required',
            'Status' => 'required',
        ]);
        try {
            $createBy = Auth::user()->id;
            $status = ($request->Status == 'on' ? '1' : '0');
            $IP = $request->ip();
            $city = DB::select("call usp_A_AddCity(?,?,?,?,?,?)", array($request->CityName, $request->StateID, $createBy, $status, 'Admin Web', $IP));

            return redirect()->route('city.index')
                ->with('success', 'City created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try another!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        $country = Country::all()->where('Status', 1);
        $state = State::all()->where('Status', 1);
        return view('admin.city.edit',  compact('city', 'country', 'state'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $country = Country::all()->where('Status', 1);
        $state = State::all()->where('Status', 1);
        // $city = City::all()->where('Status', 1);
        return view('admin.city.edit',  compact('city', 'country', 'state'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'CityName' => 'required',
            'Status' => 'required',
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $status = ($request->Status == 'on' ? '1' : '0');
            $IP = $request->ip();
            $ID = $city->CityID;
            $city = DB::select("call usp_A_EditCity(?,?,?,?,?,?,?)", array($request->CityName, $request->StateID, $ModifiedBy, $status, $ID, 'Admin Web', $IP));

            return redirect()->route('city.index')
                ->with('success', 'city updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try another!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
    }
}
