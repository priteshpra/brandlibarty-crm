<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class FileController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function __invoke($file)
    {
        dd($file);
        abort_if(auth()->guest(), Response::HTTP_FORBIDDEN);

        $path = "uploads/products/Test_Product/1/$file";

        return response()->file(
            Storage::path($path)
        );
    }

    public function download($filename)
    {
        dd($filename);
        // Ensure the user is authenticated
        if (!auth()->check()) {
            abort(403, 'Unauthorized');
        }

        // Serve the file if it exists
        if (Storage::exists('public/uploads/products/Test_Product/1/' . $filename)) {
            return Storage::download('public/uploads/products/Test_Product/1/' . $filename);
        }

        // Return 404 if the file doesn't exist
        abort(404, 'File not found');
    }

    public function show($username, $filename)
    {
        $path = storage_path(Config::get('constants.PANCARD_URLPATH') . "{$username}/{$filename}");

        // Check if the file exists
        if (!Storage::exists(Config::get('constants.PANCARD_URLPATH') . "{$username}/{$filename}")) {
            abort(404);
        }

        // Return the image file
        return response()->file($path);
    }
}
