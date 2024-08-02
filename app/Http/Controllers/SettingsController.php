<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apiList = Settings::all()->where('Status', 1);
        $data['title'] = 'Settings';
        return view('admin.settings.list', compact('data', 'apiList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.settings.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'apiTitle' => 'required',
            'apiKey' => 'required',
            'secretKey' => 'required',
            'apiDocLink' => 'required'
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $Project = new Settings();

            $Project->apiTitle = $request->apiTitle;
            $Project->apiKey = $request->apiKey;
            $Project->secretKey = $request->secretKey;
            $Project->apiDocLink = $request->apiDocLink;
            $Project->billingLink = $request->billingLink;
            $Project->CreatedBy = $ModifiedBy;
            $Project->save();
            return redirect()->route('settings.index')->with('success', 'Settings created successfully.');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $settings, $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $SettingID)
    {
        $request->validate([
            'apiTitle' => 'required',
            'apiKey' => 'required',
            'secretKey' => 'required',
            'apiDocLink' => 'required'
        ]);

        try {
            $ModifiedBy = Auth::user()->id;
            $Project = Settings::find($SettingID);

            $Project->apiTitle = $request->apiTitle;
            $Project->apiKey = $request->apiKey;
            $Project->secretKey = $request->secretKey;
            $Project->apiDocLink = $request->apiDocLink;
            $Project->billingLink = $request->billingLink;
            $Project->CreatedBy = $ModifiedBy;
            $Project->save();
            return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
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
            $project = Settings::find($id);
            $project->Status = 0;
            $project->save();
            return redirect()->route('settings.index')
                ->with('success', 'Settings deleted successfully');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getSettingsData(Request $request)
    {
        $userId = $request->input('apiID');
        $users = Settings::find($userId);
        return $users;
    }
}
