<?php
/**
 * Created by PhpStorm.
 * User: hqr
 * Date: 2018/5/23
 * Time: 15:32
 */
$http = new swoole_http_server("0.0.0.0", 8811);

$http->set(
    [
        'enable_static_handler' => true,
        'document_root' => "/var/www/html/tool-laravel/resources/views/live",
    ]
);
$http->on('request', function($request, $response) {
    $response->cookie("singwa", "xsssss", time() + 1800);
    $response->end("sss". json_encode($request->get));
});

$http->start();