<?php

namespace App\Http\Controllers;

use GatewayClient\Gateway;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    //
    public function index(Request $request)
    {
        $msg = $request->input('msg');
        Gateway::sendToAll($msg);
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
        $flag = Mail::raw('你好，！', function ($message) {
            $to = '1457275621@qq.com';
            $message->to($to)->subject('纯文rrr本信息邮件测试');
        });

        if (!$flag) {
            echo '邮件发送成功';
        } else {
            echo '邮件发送失败';
        }
    }

    public function index2()
    {
        return Admin::content(function (Content $content) {
            $content->header('影视列表');
            $content->description('美剧');
            $content->body($this->grids());
        });
    }

    protected function grids()
    {
        return view('test.test');
    }

    public function ajaxGetVideoList()
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

    protected function grid()
    {
        $a = Movie::class;
        var_dump($a);
        die();
        $a = Admin::grid(Movie::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->created_at();
            $grid->updated_at();
        });
        var_dump($a);
    }

    protected function form()
    {
        $a = Admin::form(Movie::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
        var_dump($a);
    }

    public function index1()
    {
        return Admin::content(function (Content $content) {
            $content->header('Dashboard');
            $content->description('Description...');

            $headers = ['剧名', '集数', '来源'];

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

            $content->row((new Box('Table', new Table($headers, $teleplay['list'])))->style('info')->solid());
        });
    }

}
