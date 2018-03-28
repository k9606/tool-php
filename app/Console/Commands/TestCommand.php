<?php

namespace App\Console\Commands;

use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Teleplay crawler';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $client = new Client();
        for ($page = 1; $page <= 1; $page++) {
            $this->getTeleplayData($client, $page);
        }

    }

    public function getTeleplayData($client, $page)
    {
        $crawler = $client->request('GET', "http://m.zimuzu.tv/resourcelist?channel=ustv&category=&year=&sort=update&page=114");

        // 剧名
        $teleplayName = $crawler->filter('p.desc > a.aurl');
        // 美剧url
        $teleplayUrl = $crawler->filter('p.desc > a.aurl');
        // 图片
        $teleplayNameImg = $crawler->filter('div.img-item > a > img');
        // 评分
        $teleplayCount = $crawler->filter('span.count');

        $data = [];

        foreach ($teleplayName as $k => $v) {
            $data[$k][] = $v->textContent;
        }
        foreach ($teleplayUrl as $k => $v) {
            $data[$k][] = $v->attributes['length']->textContent;
        }
        foreach ($teleplayNameImg as $k => $v) {
            $data[$k][] = $v->attributes['length']->textContent;
        }
        foreach ($teleplayCount as $k => $v) {
            $data[$k][] = $v->textContent;
        }
        
        var_dump($data);
    }

    public function handleYouKnow()
    {
        //
        $goutteClient = new Client();
        $guzzleClient = new \GuzzleHttp\Client();
        for ($page = 1; $page <= 2; $page++) {
            $this->downloadImg($goutteClient, $guzzleClient, $page);
        }
    }

    /**
     * 图片下载
     *
     * @param $goutteClient
     * @param $guzzleClient
     * @param $page
     */
    public function downloadImg($goutteClient, $guzzleClient, $page)
    {
        list($imgArr, $time) = $this->getImageUrl($goutteClient, $page);
        foreach ($imgArr as $v) {
            $img = $guzzleClient->request('get', $v)->getBody()->getContents();
            Storage::disk('local')->put($this->makeDirAndName($time), $img);
            echo "$v 下载完成\r\n";
        }
        echo "第" . $page . "页下载完成\r\n";
    }

    /**
     * 获取图片地址
     *
     * @return array
     */
    public function getImageUrl($goutteClient, $page)
    {
        $time = date('Y-m-d', time());
        $crawler = $goutteClient->request('GET', "https://" . env('WEB_SITE_URL') . "/htm/movielist1/$page.htm");
        $url = $crawler->filter('img')->each(function (Crawler $node, $i) {
            $urlList = $node->attr('src');
            return $urlList;
        });
        return [$url, $time];
    }

    /**
     * 生成目录和文件名
     *
     * @param $time
     * @return string
     */
    public function makeDirAndName($time)
    {
        $dir = 'you_know';
        return $dir . '/' . $time . '/' . time() . '_' . rand(10000, 99999) . '.png';
    }

}
