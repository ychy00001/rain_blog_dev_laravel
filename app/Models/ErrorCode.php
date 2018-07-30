<?php

namespace App\Models;

class ErrorCode
{
    private static $_errors = [
        '200' => '成功!',
        '500' => '系统错误',

        //系统鉴权错误
        '100001' => '用户未授权',
        '100002' => '请求来源错误',

        //用户登录信息错误
        '100003' => '登录信息不完整,请输入用户名和密码',
        '100004' => '用户名或密码不正确,登录失败',
        '100005' => '用户注册失败',
        '100006' => '请输入完整用户信息!',
        '100007' => '用户已存在，请登录!',
        '100008' => 'Token过期，请重新登录',
        '100009' => 'Token生成失败，请重试！',
        '100010' => '请提供Token验证!',
        '100011' => '无法获取最新Token，请重新登录!',
        '100012' => '用户不存在，请重试!',
        '100013' => '用户更新失败!请重试!',
        '100014' => '用户信息创建失败!请重试!',

        //系统请求错误
        '101002' => '请求参数错误',
    ];

    public static function _hasCode($code){
        return isset(self::$_errors[$code]);
    }

    public static function _errorMsg($code){
        if (!isset(self::$_errors[$code])) {
            return '系统错误';
        }
        return self::$_errors[$code];
    }
}