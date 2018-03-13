<?php

// 格式化打印数组
if (!function_exists('vpd')) {
    function vpd($data, $type = '') {
        if ($type != 2) {
            var_dump($data);
            die();
        } else {
            print_r($data);
            die();
        }
    }
}