<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use \EasyWeChat;

/**
 * 微信授权控制器
 *
 * 公众号相关逻辑
 * @author  Rain
 * @version 1.0
 */
class OauthController extends Controller
{
    protected $officialAccount;
    protected $oauth;

    public function __construct()
    {
        $this->officialAccount = EasyWeChat::officialAccount("fake"); // 公众号
        $this->oauth = $this->officialAccount->oauth;
    }

    /**
     * 微信授权逻辑
     *
     * @author Rain
     * @date  2018/8/6 上午11:00
     *
     * @param $request
     * @return View
     */
    public function oauth(Request $request)
    {
        \Log::info("准备授权");
        return $this->oauth->redirect();
        // 这里不一定是return，如果你的框架action不是返回内容的话你就得使用
//         $this->oauth->redirect()->send();
    }

    /**
     * 授权回调页面
     *
     * @author Rain
     * @date   2018/8/6 上午11:27
     *
     */
    public function callback()
    {
        \Log::info("callback回调!");
        $userInfo = $this->oauth->user();
        if (!empty($userInfo)) {
            $userInfo = $userInfo->toArray();
            $user = with(new User())
                ->where('nickname', $userInfo['nickname'])
                ->where('avatar', $userInfo['avatar'])
                ->where('open_id', $userInfo['token']['openid'])
                ->first(['nickname', 'avatar', 'open_id', 'password']);
            if (empty($user)) {
                $user = new User([
                    'nickname' => $userInfo['nickname'],
                    'avatar' => $userInfo['avatar'],
                    'open_id' => $userInfo['token']['openid'],
                    'password' => bcrypt($userInfo['token']['openid']),
                ]);
                $user->save();
            }
            if(Auth::attempt([
                'nickname' => $userInfo['nickname'],
                'avatar' => $userInfo['avatar'],
                'open_id' => $userInfo['token']['openid'],
                'password' => $userInfo['token']['openid'],
            ])){
                \Log::info("登录成功，准备跳转");
                return redirect("wechat/test/h5");
            }else{
                dd("登录失败！");
            }
        }
        //继续授权
        return redirect("wechat/oauth/oauth");
    }
}