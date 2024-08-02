<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Keywords;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titlelist = '';
        $kewordShow = '';
        $blogList = Blog::all()->where('status', 1);
        return view('admin.blog.blogcompaign', compact('titlelist', 'kewordShow', 'blogList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keywordlists = Keywords::all()->where('status', 1);
        $category = Category::all()->where('status', 1);
        $titlelist = '';
        return view('admin.blog.create', compact('keywordlists', 'category', 'titlelist'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $keywordlist = $request['keyword'];
        $titlelist = [];
        foreach ($keywordlist as $key => $value) {
            $titlelist[$key] = $request['title'][$value];
        }
        $category = Category::all()->where('status', 1);
        return view('admin.blog.create', compact('keywordlist', 'category', 'titlelist'));
    }

    public function getDomainData(Request $request)
    {
        $categoryVal = $request->input('categoryVal');
        $users = Project::leftJoin('prompts', 'project.promptID', '=', 'prompts.id')
            ->select('project.*', 'prompts.prompt', 'prompts.act_as', 'prompts.language', 'prompts.act_as')
            ->where('project.category', $categoryVal)->get()->all();
        return $users;
    }

    public function blogcreate(Request $request)
    {
        // dd($request);
        $ModifiedBy = Auth::user()->id;

        $titleName = $request->keywordTitle;
        $kewordShow = $request->kewordShow;
        $datePick = $request->datePick;
        $keywordlists = Keywords::all()->where('status', 1);
        $category = Category::all()->where('status', 1);
        $count = Blog::where('keywordName', $kewordShow)->first();
        if (!$count) {
            $Blog = new Blog();
            $Blog->blog_name = $titleName;
            $Blog->createdBy = $ModifiedBy;
            $Blog->keywordName = $kewordShow;
            $Blog->blog_date = date('Y-m-d', strtotime($datePick));
            $Blog->status = 1;
            $Blog->save();
        }

        $Keywords = Keywords::where('keywordName', $kewordShow)->first();
        $Keywords->status = '0';
        $Keywords->save();

        $blogList = Blog::all()->where('status', 1);

        return view('admin.blog.blogcompaign', compact('keywordlists', 'kewordShow', 'titleName', 'blogList'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $project = Blog::find($id);
            $project->status = 0;
            $project->save();
            return redirect()->route('blog.index')
                ->with('success', 'Blog deleted successfully');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
