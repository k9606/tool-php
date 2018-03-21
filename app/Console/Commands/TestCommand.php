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
    protected $description = 'Command description';

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
        $goutteClient = new Client();
        $guzzleClient = new \GuzzleHttp\Client();
        for ($page = 1; $page <=5; $page++) {
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
            echo "$page\r\n";
        }
    }

    /**
     * 获取图片地址
     *
     * @return array
     */
    public function getImageUrl($goutteClient, $page)
    {
        $time = date('Y-m-d', time());
        $crawler = $goutteClient->request('GET', "https://www.803ee.com/htm/movielist1/$page.htm");
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
