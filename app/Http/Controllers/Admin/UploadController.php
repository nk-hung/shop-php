<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //
    public function store(Request $request)
    {
        try {

            if ($request->hasFile('uploadFile')) {
                $name = $request->file('uploadFile')->getClientOriginalName();
                $pathFull = 'uploads/' . date("Y/m/d");
                $request->file('uploadFile')->storeAs('public/' . $pathFull, $name);

                return response()->json([
                    "error" => false,
                    "url" => "/storage/" . $pathFull . "/" . $name
                ]);
            }
        } catch (\Exception $err) {
            return response()->json([
                "error" => true,
                "msg" => $err->getMessage()
            ]);
        };
    }
}
