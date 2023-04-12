<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login() {
        return view('admin.users.login', [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }

    public function store(Request $request) {
        // dd($request->input());
        $validatedReq = $request->validate([
            "email" => "email:rfc,dns",
            "password" => ['required']
        ]);
    }
};
