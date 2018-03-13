<?php

namespace App\Http\Controllers\Test;

use GatewayClient\Gateway;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use AipOcr;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    //
    const APP_ID = '10913997';
    const API_KEY = '99W6y9RcMHZtkjFWQRU3Nhzg';
    const SECRET_KEY = 'Tk6yGa1uR8hvaS5Srtk8yaa2wYgdzdfI';

    public function test()
    {
        return view('test.test');
    }

    public function test1()
    {
                Gateway::$registerAddress = '10.5.193.116:8282';
//        Gateway::$registerAddress = '10.5.193.116:8282';
//        //die();
        Gateway::sendToUid('0a05c1740b5500000001','ddddddd');
        die();
        //Gateway::sendToAll('fff');
        //return view('test.test');


//        $flag = Mail::raw('你好，！',function($message) {
//            $to ='1457275621@qq.com';
//            $message->to($to)->subject('纯文本信息邮件测试');
//        });
//
//        if (!$flag) {
//            echo '发送邮件成功，请查收！';
//        } else {
//            echo '发送邮件失败，请重试！';
//        }
//
//        die();
        $a = [4,5,6];
        vpd($a);
        $client = new AipOcr(self::APP_ID, self::API_KEY, self::SECRET_KEY);

        $url = "https://login.lvmama.com/captcha/account/checkcode/login_web.htm?" . rand(0, 1000);

        $image = file_get_contents('example.jpg');

        // 调用通用文字识别（高精度版）
        $a = $client->basicAccurate($image);

        //$a = $client->basicGeneralUrl($url);
        return view('test.test', ['images' => $url, 'num' => $a['words_result'][0]['words']]);
        var_dump($a['words_result'][0]['words']);



//        $client = new Client();
//        $crawler = $client->request('GET', 'https://m.80s.tw/movie/12-0-0-0-0-0-0');
//        $tvList = $crawler->filter('div.list_mov_title > h4 > a, em');
//        $tvListNew = [];
//        foreach ($tvList as $k => $v) {
//            $tvListNew[] = $v->nodeValue;
//        }
//        for ($i = 0; $i < ((count($tvListNew) - 1) / 2); $i++) {
//            $res[] = array_slice($tvListNew, $i * 2, 2);
//        }
//        return json_encode($res);
    }
}
