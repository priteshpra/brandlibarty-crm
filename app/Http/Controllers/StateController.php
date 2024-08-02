<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $country = DB::select("call usp_A_GetCountry()");
        $state = DB::select("call usp_A_GetState()");
        $data['title'] = 'State';
        return view('admin.state.list', compact('data', 'state', 'country'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $country = DB::select("call usp_A_GetCountry()");
        $state = State::all()->where('Status', 1);
        return view('admin.state.add', compact('country', 'state'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'StateName' => 'required',
            'Status' => 'required',
        ]);
        try {
            $createBy = Auth::user()->id;
            $status = ($request->Status == 'on' ? '1' : '0');
            $IP = $request->ip();
            $state = DB::select("call usp_A_AddState(?,?,?,?,?,?)", array($request->StateName, $request->CountryID, $createBy, $status, 'Admin Web', $IP));
            return redirect()->route('state.index')
                ->with('success', 'State created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try another!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        $country = Country::all()->where('Status', 1);
        return view('admin.state.edit',  compact('country', 'state'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        $country = Country::all()->where('Status', 1);
        return view('admin.state.edit',  compact('country', 'state'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        $request->validate([
            'StateName' => 'required',
            'Status' => 'required',
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $status = ($request->Status == 'on' ? '1' : '0');
            $IP = $request->ip();
            $ID = $state->StateID;
            $state = DB::select("call usp_A_EditState(?,?,?,?,?,?,?)", array($request->StateName, $request->CountryID, $ModifiedBy, $status, $ID, 'Admin Web', $IP));

            return redirect()->route('state.index')
                ->with('success', 'State updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try another!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        //
    }
}
