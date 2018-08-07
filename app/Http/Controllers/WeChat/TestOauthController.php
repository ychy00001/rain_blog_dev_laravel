<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;

/**
 * 测试网页授权
 *
 * 公众号相关逻辑
 * @author  Rain
 * @version 1.0
 */
class TestOauthController extends Controller
{
    /**
     * 创建卡券
     *
     * @author Rain
     * @date  2018/8/6 上午11:00
     *
     * @param $request
     * @return View
     */
    public function testH5Oauth(Request $request)
    {
//        var_dump("aaa");exit(1);
//        $user = session('wechat.oauth_user');
//        \Log::info("wechat:",$user);
//        var_dump($user);exit(1);
        //未登录
        if (!Auth::check()) {
            return redirect("wechat/oauth/callback");
        }
        return view('wechat.h5',[
            'hello' => 'la_la',
            'user' => Auth::getUser(),
//            'user' =>$user,
        ]);
    }
}