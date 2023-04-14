<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function create()
    {
        return view('admin.menu.add', [
            "title" => "Thêm Danh sách mới",
            "menus" => $this->getParent()
        ]);
    }

    public function store(CreateFormRequest $request): RedirectResponse
    {
        try {
            Menu::create([
                "name" => (string) $request->name,
                "parent_id" => (int) $request->parent_id,
                "description" => (string) $request->description,
                "content" => (string) $request->content,
                "slug" => Str::slug($request->name, '-'),
                "active" => (int) $request->active,
            ]);

            Session::flash("success", "Yolo tao thanh cong roi ba con");
        } catch (\Exception $error) {
            Session::flash("error", $error->getMessage());
        }

        return redirect()->back();
    }

    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }

    public function index()
    {
        return view('admin.menu.list', [
            "title" => "Danh sách Danh Mục",
            "menus" => $this->getAllMenu()
        ]);
    }

    public function getAllMenu()
    {
        return Menu::orderBy('id')->paginate(20);
    }
}
