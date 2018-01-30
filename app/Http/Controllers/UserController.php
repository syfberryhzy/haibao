<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        return view('user.index', compact('user'));
    }
}
