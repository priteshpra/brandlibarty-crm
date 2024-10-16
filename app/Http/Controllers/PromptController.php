<?php

namespace App\Http\Controllers;

use App\Models\Prompt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PromptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prompt = Prompt::all()->where('status', 1);

        return view('admin.prompt.list', compact('prompt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.prompt.add');
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

    public function getPromptDataByName(Request $request)
    {
        $promptName = $request->input('promptName');
        $keywordTitle = $request->input('keywordTitle');
        $promptLang = $request->input('promptLang');
        $promptActAs = $request->input('promptActAs');

        $arrData = $request->input('arrData');
        $noOfPrompt = explode('<br>', $arrData);
        $finalDesc = [];
        if ($noOfPrompt) {
            $users = Prompt::where('prompt', $promptName)->get();
            $desc = isset($users[0]) ? $users[0]->description : '';
            foreach ($noOfPrompt as $key => $value) {
                $finalDesc0 = str_replace('[Keyword]', $keywordTitle, $desc);
                $finalDesc1 = str_replace('[Expert/Professional/Enthusiast/Journalist]', $promptActAs, $finalDesc0);
                $finalDesc[] = str_replace('[English/Spanish/French/etc.]', $promptLang, $finalDesc1);
            }
        }
        return $finalDesc;
    }
}
