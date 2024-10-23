<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Models\Blog;
use App\Models\Calendar;
use App\Models\Keywords;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Services\FreepikService;

class BlogController extends Controller
{
    protected $freepikService;

    public function __construct(FreepikService $freepikService)
    {
        $this->freepikService = $freepikService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titlelist = '';
        $kewordShow = '';
        $blogList = Blog::all()->where('status', '=', 1)->where('is_send', '=', '0');
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
            ->where('project.category', $categoryVal)->where('project.status', '1')->get()->all();
        return $users;
    }

    public function blogcreate(Request $request)
    {
        $ModifiedBy = Auth::user()->id;

        $content = $request->contentText;
        $titleName = $request->keywordTitle;
        $kewordShow = $request->kewordShow;
        $datePick = $request->datePick;
        $date = Carbon::createFromFormat('d/m/Y', $datePick);
        $newDate = $date->format('Y-m-d');
        $keywordlists = Keywords::all()->where('status', 1);
        $affiliateLinkData = Affiliate::all()->where('status', 1);
        $category = Category::all()->where('status', 1);
        $count = Blog::where('keywordName', $kewordShow)->first();
        if (!$count) {

            foreach ($content as $key => $value) {
                if ($value) {
                    $updatedHtml = $value;
                    if($affiliateLinkData) {
                        foreach ($affiliateLinkData as $key => $aff) {
                            $replaceLink = '<a style="color:blue;" href="'.$aff->productLink.'">'.$aff->accountName.'</a>';
                            $search = $aff->accountName;
                            $updatedHtml = str_replace($search, $replaceLink, $value);
                        }
                    }
                    $Blog = new Blog();
                    $Blog->blog_name = $titleName;
                    $Blog->createdBy = $ModifiedBy;
                    $Blog->keywordName = $kewordShow;
                    $Blog->content = $updatedHtml;
                    $Blog->blog_date = $newDate;
                    $Blog->status = 1;
                    $Blog->save();

                    $Calender = new Calendar();
                    $Calender->articleName = $titleName;
                    $Calender->articleLink = 'https://theautomateapp.com/calendar';
                    $Calender->articleScheduleDate = $newDate;
                    $Calender->createdBy = 2;
                    $Calender->save();
                }
            }
        }

        $Keywords = Keywords::where('keywordName', $kewordShow)->first();
        $Keywords->status = '0';
        $Keywords->save();

        $blogList = Blog::all()->where('status', '=', 1)->where('is_send', '=', '0');

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

    public function getBlogDisabled(Request $request)
    {
        try {
            // $entry = Blog::where('id', $request->ID)->update(['content' => $request->htmlData]);
            // dd($entry);
            if($request->ID) {
                $checkData = Blog::where('status', '1')->where('is_send', '0')->count();
                Blog::where('id', $request->ID)
                    ->update(['is_send' => '1']);
                if ($checkData == 0) {
                    return 0;
                }
                return 1;
            }
            return 0;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function generate(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $result = $this->freepikService->generateImageFromText($request->text);

        if (isset($result['error'])) {
            return response()->json(['error' => $result['error']], 400);
        }

        return response()->json($result);
    }
}
