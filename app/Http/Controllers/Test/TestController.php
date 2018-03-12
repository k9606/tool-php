<?php

namespace App\Http\Controllers\Test;

use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use AipOcr;

class TestController extends Controller
{
    //
    const APP_ID = '10913997';
    const API_KEY = '99W6y9RcMHZtkjFWQRU3Nhzg';
    const SECRET_KEY = 'Tk6yGa1uR8hvaS5Srtk8yaa2wYgdzdfI';

    public function test()
    {
        $client = new AipOcr(self::APP_ID, self::API_KEY, self::SECRET_KEY);

        $url = "https://login.lvmama.com/captcha/account/checkcode/login_web.htm?secureLevel=primary&_=152065464";

        $a = $client->basicGeneralUrl($url);
        var_dump($a);



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
