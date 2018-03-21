<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Chart\Bar;
use Encore\Admin\Widgets\Chart\Doughnut;
use Encore\Admin\Widgets\Chart\Line;
use Encore\Admin\Widgets\Chart\Pie;
use Encore\Admin\Widgets\Chart\PolarArea;
use Encore\Admin\Widgets\Chart\Radar;
use Encore\Admin\Widgets\Collapse;
use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Widgets\Table;
use Goutte\Client;
use Illuminate\Support\Facades\Cache;

class TestController extends Controller
{
    public function index()
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
        var_dump($a);die();
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
