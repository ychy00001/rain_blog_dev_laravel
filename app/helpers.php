<?php

use App\Models\ErrorCode;

if (!function_exists('api_success')) {
    /**
     * 成功返回封装
     *
     * @param  array $data 返回数据
     * @param  int $code 返回码
     * @param  string $message 消息
     * @return \Illuminate\Http\JsonResponse
     */
    function api_success($data = [], $message = '成功!', $code = 200)
    {
        $result = compact('code', 'message', 'data');

        if (env('APP_DEBUG', false) && app()->resolved('debugbar')) {
            $result['profile'] = app('debugbar')->getData();
        }

        return response()->json($result);
    }
}

if (!function_exists('api_error')) {
    /**
     * 错误返回封装
     *
     * @param  array $data 返回数据
     * @param  int $code 返回码
     * @param  string $message 消息
     * @return \Illuminate\Http\JsonResponse
     * @throws
     */
    function api_error($data = [], $message = '', $code = 500)
    {
        if (!ErrorCode::_hasCode($code)) {
            throw new \Exception('该错误码未定义');
        }
        $result = compact('code', 'message', 'data');

        if (env('APP_DEBUG', false) && app()->resolved('debugbar')) {
            $result['profile'] = app('debugbar')->getData();
        }

        return response()->json($result);
    }
}

if (!function_exists('get_real_ip')) {
    /**
     * Desc: 获取当前用户IP地址
     * User: ycy
     * AddTime: 2018/2/28 上午10:19
     * @return bool
     */
    function get_real_ip()
    {
        $ip = false;
        if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
            if ($ip) {
                array_unshift($ips, $ip);
                $ip = FALSE;
            }
            for ($i = 0; $i < count($ips); $i++) {
                if (!eregi("^(10│172.16│192.168).", $ips[$i])) {
                    $ip = $ips[$i];
                    break;
                }
            }
        }
        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    }
}

if (!function_exists('has_key')) {
    /**
     * 检测一维数组是否存在某个key
     *
     * @author Rain
     * @date   2018/7/30 下午3:06
     *
     * @param $arr
     * @param $key
     * @return bool
     */
    function has_key($arr, $key)
    {
        $keys = is_array($key) ? $key : [$key];
        foreach ($keys as $value) {
            if (!isset($arr[$value]) || empty($arr[$value])) {
                return false;
            }
        }
        return true;
    }
}

if (!function_exists('format_address_array_to_string')) {
    /**
     * 格式化国家省份城市数组的数据，转换为名称
     *
     * @author Rain
     * @date   2018/3/29 上午11:22
     *
     * @param $array
     * @return array
     */
    function format_address_array_to_string($array)
    {
        $attr = ['country', 'province', 'city'];
        foreach ($attr as $item) {
            if (has_key($array, $item) && has_key($array[$item], 'name') && has_key($array[$item], $item.'_id')) {
                $array[$item."_id"] = $array[$item][$item."_id"];
                $array[$item] = $array[$item]['name'];
            }
        }
        return $array;
    }
}

if (! function_exists('public_path')) {
    /**
     * 获取公共路径
     *
     * @author Rain
     * @date   2018/4/10 下午5:45
     *
     * @param string $path
     * @return string
     */
    function public_path($path='')
    {
        return app()->basePath().'/public'.($path ? '/'.$path : $path);
    }
}

if (!function_exists('format_paginate_attr')) {
    /**
     * 格式化数据库分页方法造成的冗余数据
     *
     * @author Rain
     * @date   2018/4/3 下午2:43
     *
     * @param $array
     * @return array
     */
    function format_db_page_attr($array)
    {
        if (isset($array['path']) || key_exists('path', $array)) {
            unset($array['path']);
        }
        if (isset($array['next_page_url']) || key_exists('next_page_url', $array)) {
            unset($array['next_page_url']);
        }

        if (isset($array['prev_page_url']) || key_exists('prev_page_url', $array)) {
            unset($array['prev_page_url']);
        }
        return $array;
    }
}

if (!function_exists('format_json_arr_value')) {
    /**
     * 格式化数组中value是json格式的数据
     *
     * @author Rain
     * @date   2018/6/5 上午11:48
     *
     * @param $array
     * @param $arrKey
     * @return array
     */
    function format_json_arr_value($array,$arrKey)
    {
        if (!is_array($array) || !is_array($arrKey)) {
            return $array;
        }
        foreach ($array as $key => $value) {
            $value = trim($value);
            if (in_array($key, $arrKey)) {
                if (empty($value)) {
                    $array[$key] = [];
                } elseif (!is_array($value)) {
                    $array[$key] = json_decode($value, true);
                }
            }
        }
        return $array;
    }
}

if (!function_exists('format_large_num')) {
    /**
     * 格式化大数字
     *
     * @author Rain
     * @date   2018/6/5 上午11:48
     *
     * @param $num
     * @return string|int
     */
    function format_large_num($num)
    {
        if ($num >= 10000) {
            return round($num / 10000 * 100) / 100 .' W';
        } elseif($num >= 1000) {
            return round($num / 1000 * 100) / 100 . ' K';
        } else {
            return $num;
        }
    }
}

if (!function_exists('json_encode_unescaped')) {
    /**
     * 禁止json_encode()编码 防止数据库存编码不好搜索
     *
     * @author Rain
     * @date   2018/6/7 下午2:48
     *
     * @param $array
     * @return string
     */
    function json_encode_unescaped($array)
    {
        return json_encode($array, JSON_UNESCAPED_UNICODE);
    }
}

