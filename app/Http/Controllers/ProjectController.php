<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Prompt;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::all()->where('status', 1);
        $prompt = Prompt::all()->where('status', 1);
        $category = Category::all()->where('status', 1);
        foreach ($prompt as $key => $value) {
            $namePrompt[$value->id] = $value->prompt;
        }
        $promptName = $namePrompt;
        return view('admin.project.list', compact('project', 'prompt', 'promptName', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'projectName' => 'required',
            'category' => 'required',
            'promptID' => 'required'
        ]);

        try {
            $uniqid = Str::random(20);
            $ModifiedBy = Auth::user()->id;
            $Project = new Project();

            $Project->projectName = $request->projectName;
            $Project->category = $request->category;
            $Project->promptID = $request->promptID;
            $Project->activationCode = $uniqid;
            $Project->subcategory = $request->subcategory;
            $Project->createdBy = $ModifiedBy;
            $Project->save();
            return redirect()->route('project.index')->with('success', 'Project created successfully.');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'projectName' => 'required',
            'category' => 'required',
            'promptID' => 'required'
        ]);
        // dd($request);
        try {
            $Project = Project::find($project->id);
            $Project->projectName = $request->projectName;
            $Project->category = $request->category;
            $Project->promptID = $request->promptID;
            $Project->subcategory = $request->subcategory;
            $Project->save();
            return redirect()->route('project.index')->with('success', 'Project updated successfully.');
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
            $project = Project::find($id);
            $project->status = 0;
            $project->save();
            return redirect()->route('project.index')
                ->with('success', 'Project deleted successfully');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
