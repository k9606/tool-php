<?php

namespace App\Console\Commands;

use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CrawlerDramaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:drama {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '电视剧爬虫';

    /**
     * 图片前缀
     *
     * @var string
     */
    protected $imgUrlPrefix = 'http://files.zmzjstu.com/ftp';

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

        switch ($this->argument('type')) {
            case 'init':
                $this->baseData($client);
                break;
            case 'link':
                $this->downloadLink($client);
                break;
            default:
                break;
        }
    }

    /**
     * 基础数据模块
     *
     * @param $client
     */
    protected function baseData($client)
    {
        for ($page = 1; $page >= 1; $page++) {
            $crawler = $client->request('GET', "http://m.zimuzu.tv/resourcelist?channel=ustv&category=&year=&sort=update
            &page=$page");
            $this->getBaseData($crawler, $page);

            unset($crawler);
        }

        return;
    }

    /**
     * 获取基础数据
     *
     * @param $crawler
     * @param $page
     */
    protected function getBaseData($crawler, $page)
    {
        $nameOrCode = $crawler->filter('p.desc > a.aurl');
        $image = $crawler->filter('div.img-item > a > img');
        $time = date('Y-m-d H:i:s', time());
        foreach ($nameOrCode as $k => $v) {
            $data[$k]['name'] = $v->textContent;
            $data[$k]['code'] = $this->shearCode($v->attributes['length']->textContent);
        }
        foreach ($image as $k => $v) {
            $data[$k]['image'] = $this->shearImgUrl($v->attributes['length']->textContent);
            $data[$k]['created_at'] = $time;
        }
        if (!$data) die('爬取完毕');

        $this->saveBaseData($data, $page);

        return;
    }

    /**
     * 截取剧集代码
     *
     * @param $url
     * @return mixed
     */
    protected function shearCode($url)
    {
        $url = explode('/', $url);

        return end($url);
    }

    /**
     * 截取图片路径
     *
     * @param $url
     * @return mixed
     */
    protected function shearImgUrl($url)
    {
        $url = explode($this->imgUrlPrefix, $url);

        return end($url);
    }

    /**
     * 保存基础数据
     *
     * @param $data
     * @param $page
     * @return int
     */
    protected function saveBaseData($data, $page)
    {
        DB::table('drama')->insert($data);
        echo '第 ' . $page . ' 页数据已处理' . "\r\n";

        return sleep(3);
    }

    /**
     * 下载链接模块
     *
     * @param $client
     */
    protected function downloadLink($client)
    {
        $list = DB::table('drama')->select('id', 'name', 'code')->get();
        foreach ($list as $v) {
            $this->makeDetailUrl($client, $v);
        }
    }

    /**
     * 生成详情url
     *
     * @param $client
     * @param $dramaData
     */
    protected function makeDetailUrl($client, $dramaData)
    {
        for ($season = 1; $season >= 1; $season++) {
            for ($episode = 1; $episode >= 1; $episode++) {
                $url = "http://m.zimuzu.tv/resource/item?rid=$dramaData->code&season=$season&episode=$episode";
                $crawler = $client->request('GET', $url);

                $dramaData->season = $season;
                $dramaData->episode = $episode;

                $link = $this->checkNeedType($crawler, $dramaData);
                if (!$link && $episode == 1) return;
                if (!$link) break;
                echo $url . "\r\n";

                unset($crawler);
            }
        }
    }

    /**
     * 检测需要的类型
     *
     * @param $crawler
     * @param $dramaData
     * @return array|bool
     */
    protected function checkNeedType($crawler, $dramaData)
    {
        $type = $crawler->filter('a.mui-navigate-right');
        $typeList = [];
        foreach ($type as $v) {
            $typeList[] = $v->textContent;
        }
        if (!$typeList) return false;
        $link = []; // TODO : 去掉一个 & sleep3
        foreach ($typeList as $k => $v) {
            if (mb_strpos($v, 'MP4') !== false && mb_strpos($v, '中文') !== false) {
                $link[] = $this->getLink($crawler, $dramaData, $k, 'mp4');
            }
            if (!$link) {
                if (mb_strpos($v, 'HR-HDTV') !== false && mb_strpos($v, '中文') !== false) {
                    $link[] = $this->getLink($crawler, $dramaData, $k, 'mkv');
                }
            }
        }
        if (!$link) return false;

        return $link;
    }

    /**
     * 获取下载链接
     *
     * @param $crawler
     * @param $dramaData
     * @param $num
     * @return bool
     */
    protected function getLink($crawler, $dramaData, $num, $vedioType)
    {
        $link = $crawler->filter('li.mui-col-xs-6.aurl > a');
        foreach ($link as $v) {
            $linkArr[] = $v->attributes['length']->textContent;
        }
        if (!$linkArr) return false;

        foreach ($linkArr as $v) {
            if (mb_strpos($v, 'ed2k://') !== false) {
                $links[] = $v;
            }
        }

        return $this->renameLink($dramaData, $links[$num], $vedioType);
    }

    /**
     * 重命名链接
     *
     * @param $dramaData
     * @param $link
     * @return mixed
     */
    protected function renameLink($dramaData, $link, $vedioType)
    {
        if ($vedioType == 'mp4') {
            $linkArr = explode('.mp4', $link);
        } elseif ($vedioType == 'mkv') {
            $linkArr = explode('.mkv', $link);
            if (!isset($linkArr[1])) $linkArr = explode('.mp4', $link);
        }

        $newlink = 'ed2k://|file|'
            . $dramaData->name . '[第' . $dramaData->season . '季第' . $dramaData->episode . '集][knskzs.com].mp4'
            . $linkArr[1];
        $this->saveLink($dramaData, $newlink);

        return $link;
    }

    /**
     * 保存链接
     *
     * @param $dramaData
     * @param $newlink
     * @return int
     */
    protected function saveLink($dramaData, $newlink)
    {
        DB::table('drama_link')->insert([
            'drama_id' => $dramaData->id,
            'season' => $dramaData->season,
            'episode' => $dramaData->episode,
            'link' => $newlink,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        echo $dramaData->name . '第 ' . $dramaData->season . ' 季第 ' . $dramaData->episode . ' 集链接已处理' . "\r\n";

        return sleep(3);
    }
}
