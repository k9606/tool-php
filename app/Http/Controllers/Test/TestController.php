<?php

namespace App\Http\Controllers\Test;

use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    //
    public function index() {
        return view('test.test');
    }

    public function test()
    {
        if (Cache::has('teleplay')) {
            $teleplay['dataType'] = 'cache';
            $teleplay['list'] = Cache::get('teleplay');
        } else {
            $teleplay['dataType'] = 'new';
            $client = new Client();
            $crawler = $client->request('GET', 'https://m.80s.tw/movie/12-0-0-0-0-0-0');
            $teleplayList = $crawler->filter('div.list_mov_title > h4 > a, em');
            $teleplayArr = [];
            foreach ($teleplayList as $k => $v) {
                $teleplayArr[] = $v->nodeValue;
            }
            for ($i = 0; $i < ((count($teleplayArr) - 1) / 2); $i++) {
                $teleplay['list'][] = array_slice($teleplayArr, $i * 2, 2);
            }
            Cache::put('teleplay', $teleplay['list'], 60);
        }
        return json_encode($teleplay);
    }

    public function sendMail()
    {
        $flag = Mail::raw('你好，！',function($message) {
            $to ='1457275621@qq.com';
            $message->to($to)->subject('纯文rrr本信息邮件测试');
        });

        if (!$flag) {
            echo '邮件发送成功';
        } else {
            echo '邮件发送失败';
        }
    }
}
