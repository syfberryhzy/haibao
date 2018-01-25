<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EasyWeChat;
use App\Models\User;

class PublicController extends Controller
{
    /**
     * 用户登录，如果用户有 openid 则登录，没有 openid 则让用户进入公众号登录
     */
    public function login(Request $request)
    {
        $user = User::login($request->openid);

        \Auth::login($user);

        return redirect()->route('user.index');
    }
}
