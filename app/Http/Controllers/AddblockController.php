<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddblockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $domain = Project::all()->where('status', 1);
        $arrDomain = '[';
        foreach ($domain as $key => $value) {
            $arrDomain .= ($value->projectName) ? "'$value->projectName'" . ',' : '';
        }
        $arrDomain .= ']';

        $categoryList = Category::all()->where('status', 1);
        $arrCate = '[';
        foreach ($categoryList as $key => $value) {
            $arrCate .= ($value->categoryName) ? "'$value->categoryName'" . ',' : '';
        }
        $arrCate .= ']';


        return view('admin.addblock.list', compact('arrDomain', 'arrCate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addblock.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'prompt' => 'required',
            'language' => 'required',
            'tone_of_voice' => 'required',
            'act_as' => 'required',
            'character' => 'required'
        ]);

        try {

            $ModifiedBy = Auth::user()->id;
            $Prompt = new Prompt();

            $Prompt->prompt = $request->prompt;
            $Prompt->language = $request->language;
            $Prompt->tone_of_voice = $request->tone_of_voice;
            $Prompt->act_as = $request->act_as;
            $Prompt->character = $request->character;
            $Prompt->description = $request->content;
            $Prompt->createdBy = $ModifiedBy;
            $Prompt->save();
            return redirect()->route('prompt.index')->with('success', 'Prompt created successfully.');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Prompt $prompt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prompt $prompt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prompt $prompt)
    {
        $request->validate([
            'prompt' => 'required',
            'language' => 'required',
            'tone_of_voice' => 'required',
            'act_as' => 'required',
            'character' => 'required'
        ]);
        // dd($request);
        try {
            $Prompt = Prompt::find($prompt->id);
            $Prompt->prompt = $request->prompt;
            $Prompt->language = $request->language;
            $Prompt->tone_of_voice = $request->tone_of_voice;
            $Prompt->act_as = $request->act_as;
            $Prompt->character = $request->character;
            $Prompt->description = $request->content;
            $Prompt->save();
            return redirect()->route('prompt.index')->with('success', 'Prompt updated successfully.');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $post = Prompt::find($id);
        // $post->delete();
        try {
            $prompt = Prompt::find($id);
            $prompt->status = 0;
            $prompt->save();
            return redirect()->route('prompt.index')
                ->with('success', 'Prompt deleted successfully');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getPromptData(Request $request)
    {
        $promptID = $request->input('promptID');
        $users = Prompt::find($promptID);
        return $users;
    }
}
