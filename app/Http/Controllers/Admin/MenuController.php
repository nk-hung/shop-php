<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function remove(Request $request): JsonResponse
    {
        $id = (int) $request->id;
        $menu = Menu::where('id', $id);
        if ($menu) {
            $result = Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
            return response()->json([
                "error" => false,
                "message" => "Xóa thành công",
            ]);
        }
        return response()->json([
            "error" => true
        ]);
    }

    public function show(Menu $menu)
    {
        // echo "<pre/>";
        // print_r($menu);
        // die();
        return view('admin.menu.edit', [
            "title" => "Cập nhật dữ liệu danh mục ID: " . $menu->id . ' - ' . $menu->name,
            "menu" => $menu,
            "menus" => $this->getParent()
        ]);
    }

    public function update(CreateFormRequest $request, Menu $menu): RedirectResponse
    {
        $menu->name = $request->name;
        $menu->parent_id = $request->parent_id;
        $menu->description = $request->description;
        $menu->content = $request->content;
        $menu->active = $request->active;
        $menu->save();
        Session::flash('success', "Update Success!");
        return redirect("/admin/menus/list");
    }
}
