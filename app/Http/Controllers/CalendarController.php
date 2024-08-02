<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $List = Calendar::all()->where('status', 1);
        $data['title'] = 'Calendar';
        return view('admin.calendar.list', compact('data', 'List'));
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
            'articleName' => 'required',
            'articleLink' => 'required',
            'scheduledFor' => 'required'
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $Project = new Calendar();

            $Project->articleName = $request->articleName;
            $Project->articleLink = $request->articleLink;
            $Project->articleScheduleDate = $request->scheduledFor;
            $Project->createdBy = $ModifiedBy;
            $Project->save();
            return redirect()->route('calendar.index')->with('success', 'Calendar created successfully.');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Calendar $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'articleName' => 'required',
            'articleLink' => 'required',
            'scheduledFor' => 'required'
        ]);
        try {
            $ModifiedBy = Auth::user()->id;
            $Project = Calendar::find($id);

            $Project->articleName = $request->articleName;
            $Project->articleLink = $request->articleLink;
            $Project->articleScheduleDate = $request->scheduledFor;
            $Project->createdBy = $ModifiedBy;
            $Project->save();
            return redirect()->route('calendar.index')->with('success', 'Calemdar updated successfully.');
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
            $project = Calendar::find($id);
            $project->status = 0;
            $project->save();
            return redirect()->route('calendar.index')
                ->with('success', 'Calendar deleted successfully');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
