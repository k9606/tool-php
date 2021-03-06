<?php

// 格式化打印数组
if (!function_exists('vpd')) {
    function vpd($data, $type = '')
    {
        if ($type != 2) {
            var_dump($data);
            die();
        } else {
            print_r($data);
            die();
        }
    }
}

// curl封装
if (!function_exists('curl_request')) {
    function curl_request($url, $post = '', $cookie_jar = '', $cookie = '', $http = 1)
    {
        $ch = curl_init(); //初始化curl
        curl_setopt($ch, CURLOPT_URL, $url); //抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0); //设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        if ($cookie) {
            curl_setopt($ch, CURLOPT_COOKIE, $cookie); //设置Cookie信息保存在指定的文件中
        } else {
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar); //设置Cookie信息保存在指定的文件中
        }

        if ($post) {
            curl_setopt($ch, CURLOPT_POST, 1); //post提交方式
            $post = is_array($post) ? http_build_query($post) : $post;
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }

        if ($http) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }

        $data = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $data;
    }
}

// 生成随机数 (耗资源)
if (!function_exists('make_rand_str')) {
    function make_rand_str()
    {
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randStr = str_shuffle($str);
        $rands = substr($randStr, 0, 6);
        return $rands;
    }
}

// jsonp 响应
if (!function_exists('jsonp_msg')) {
    function jsonp_msg($code = '-1', $msg = 'error', $data = null)
    {
        return response()->json(['code' => $code, 'msg' => $msg, 'data' => $data])->withCallback(request()->input('callback'));
    }
}

// json 响应
if (!function_exists('json_msg')) {
    function json_msg($code = '-1', $msg = 'error', $data = null)
    {
        return response()->json(['code' => $code, 'msg' => $msg, 'data' => $data]);
    }
}

// 二维数组排序
if (!function_exists('array_sequence')) {
    function array_sequence($array, $field, $sort = 'SORT_DESC')
    {
        $arrSort = [];
        foreach ($array as $uniqid => $row) {
            foreach ($row as $key => $value) {
                $arrSort[$key][$uniqid] = $value;
            }
        }
        array_multisort($arrSort[$field], constant($sort), $array);
        return $array;
    }
}
