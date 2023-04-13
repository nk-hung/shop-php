<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    public function create()
    {
        return view('admin.menu.add', [
            "title" => "Thêm Danh sách mới"
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        try {
            Menu::created([
                "name" => (string) $request->input('name'),
                "parent_id" => (int) $request->input('parent_id'),
                "description" => (string) $request->input('description'),
                "content" => (string) $request->input('content'),
                "active" => (bool) $request->input('active'),
            ]);

            Session::flash("success", "Yolo tao thanh cong roi ba con");
        } catch (\Exception $error) {
            Session::flash("error", $error->getMessage());
            return false;
        }

        return redirect()->back();
    }


    public function getList()
    {
        echo 'Get list';
    }
}
