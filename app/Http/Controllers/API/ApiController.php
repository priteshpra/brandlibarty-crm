<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function connectPrject(Request $request)
    {

        try {

            $validator = Validator::make($request->all(), [
                'code' => 'required|string',
                'domain' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }


            $findCode = Project::where('activationCode', $request->code)->where('projectName', $request->domain)->get();
            if (count($findCode) > 0) {
                $Project = Project::find($findCode[0]['id']);
                $Project->isConnected = 1;
                $Project->save();
                return response()->json(array('status' => 200, 'message' => 'Connect Sucessfully'), 200);
            } else {
                return response()->json(array('status' => 200, 'message' => 'domain not found, please try another.'), 200);
            }
        } catch (\Exception $e) {
            return response()->json(array('status' => 400, 'message' => 'Something went wrong'), 200);
        }
    }

    public function getBlogs(Request $request)
    {

        try {
            $findCode = Blog::where('status', $request->code)->where('projectName', $request->domain)->get();
            if (count($findCode) > 0) {
                $Project = Project::find($findCode[0]['id']);
                $Project->isConnected = 1;
                $Project->save();
                return response()->json(array('status' => 200, 'message' => 'Connect Sucessfully'), 200);
            } else {
                return response()->json(array('status' => 200, 'message' => 'domain not found, please try another.'), 200);
            }
        } catch (\Exception $e) {
            return response()->json(array('status' => 400, 'message' => 'Something went wrong'), 200);
        }
    }
}
