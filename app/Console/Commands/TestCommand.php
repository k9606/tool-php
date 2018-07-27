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
        for ($i = 0; $i <= 10000; $i++) {
            $urls[] = 'http://knskzs.com';
            $urls[] = 'http://knskzs.com/';
            for ($i = 0; $i <= 100; $i++) {
                $urls[] = 'http://knskzs.com/?page=' . $i;
            }
            $api = 'http://data.zz.baidu.com/urls?site=knskzs.com&token=j2uKCZxtd8ieGZTc';
            $ch = curl_init();
            $options = [
                CURLOPT_URL => $api,
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POSTFIELDS => implode("\n", $urls),
                CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
            ];
            curl_setopt_array($ch, $options);
            $result = curl_exec($ch);
            curl_close($ch);
            echo $result . "\r\n";
            echo date('Y-m-d H:i:s', time()) . ' - ' . time() . "\r\n";
            echo "-------------------------------------\r\n";
            echo "\r\n";
            unset($urls);
            sleep(60);
        }

        echo 'end';
    }

    public function gett($client, $guzzleClient, $page)
    {
        $time = date('Y-m-d', time());
        try {
            $crawler = $client->request('GET', "https://www.740ee.com/htm/pic1/$page.htm");
            echo "爬第 $page 页  " . date('Y-m-d H:i:s', time()) . "\r\n";
        } catch (\Exception $e) {
            echo $e . "\r\n";
            return;
        }

        $imgArr = $crawler->filter('img')->each(function (Crawler $node, $i) {
            $urlList = $node->attr('src');
            return $urlList;
        });
        foreach ($imgArr as $v) {
            try {
                if (strpos($v, 'alicdn') !== false) {
                    echo 'alicdn' . "\r\n";
                    return;
                }
                $img = $guzzleClient->request('get', $v)->getBody()->getContents();
            } catch (\Exception $e) {
                echo $e . "\r\n";
                return;
            }

            Storage::disk('local')->put($this->makeDirAndName($time), $img);
            echo "$v 下载完成\r\n";
        }
        unset($imgArr);
        echo "释放内存\r\n";
        return;
//        vpd($url);
//        // 剧名
//        $teleplayName = $crawler->filter('div.picContent > img');
//        vpd($teleplayName);
        // 美剧url
//        $teleplayUrl = $crawler->filter('p.desc > a.aurl');
//        // 图片
//        $teleplayNameImg = $crawler->filter('div.img-item > a > img');
//        // 评分
//        $teleplayCount = $crawler->filter('span.count');
//
//        $data = [];
//
//        foreach ($teleplayName as $k => $v) {
//            $data[$k][] = $v->textContent;
//        }
//        foreach ($teleplayUrl as $k => $v) {
//            $data[$k][] = $v->attributes['length']->textContent;
//        }
//        foreach ($teleplayNameImg as $k => $v) {
//            $data[$k][] = $v->attributes['length']->textContent;
//        }
//        foreach ($teleplayCount as $k => $v) {
//            $data[$k][] = $v->textContent;
//        }
//
//        var_dump($data);
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
