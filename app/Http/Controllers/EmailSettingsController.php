<?php

namespace App\Http\Controllers;

use App\Models\EmailSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Gate;


class EmailSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $setting = EmailSettings::all()->where('Status', 1);
        return view('admin.settings.emailedit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'EmailFrom' => 'required',
            'EmailPassword' => 'required',
            'EmailFromName' => 'required'
        ]);
        try {
            $PhpMail = ($request->PhpMail == 'on' ? '1' : '0');
            $chk = EmailSettings::where('EmailID', 1)->update(['EmailFrom' => $request->EmailFrom, 'EmailPassword' => $request->EmailPassword, 'EmailFromName' => $request->EmailFromName, 'PhpMail' => $PhpMail]);
            // dd($chk);
            return redirect()->route('emailsettings.edit', 401)
                ->with('success', 'Email Settings updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try another!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
