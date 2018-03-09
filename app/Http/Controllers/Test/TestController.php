<?php

namespace App\Http\Controllers\Test;

use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //
    public function test()
    {
        $a = [
            'name1' =>['name1' =>'Runoob',
                'name2' => 'Google',
                'name' => 'Taobaoggg']];
        //print_r($a);

        return json_encode($a);die();
//        $client = new Client();
//        $crawler = $client->request('GET', 'https://m.80s.tw/movie/12-0-0-0-0-0-0');
//        $tvList = $crawler->filter('div.list_mov_title > h4 > a, em');
//        $tvListNew = [];
//        foreach ($tvList as $k => $v) {
//            $tvListNew[] = $v->nodeValue;
//        }
//        for ($i = 0; $i < ((count($tvListNew) - 1) / 2); $i++)
//        {
//            $res[] = array_slice($tvListNew, $i * 2, 2);
//        }
//        return json_encode($res);
    }
}
