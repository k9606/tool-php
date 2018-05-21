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
    protected $signature = 'crawl:ustv {type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '美剧爬虫';

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
                $this->handleBaseData($client);
                break;
            case 'link':
                $this->handleDownloadLink($client);
                break;
            default:
                break;
        }
    }

    protected function handleBaseData($client)
    {
        for ($page = 1; $page >= 1; $page ++) {
            $crawler = $client->request('GET', "http://m.zimuzu.tv/resourcelist?channel=ustv&category=&year=&sort=update
            &page=$page");

            $this->getBaseData($crawler, $page);

            unset($crawler);
        }

        return;
    }

    protected function getBaseData($crawler, $page)
    {
        $name = $crawler->filter('p.desc > a.aurl');
        $code = $crawler->filter('p.desc > a.aurl');
        $score = $crawler->filter('span.count');
        $image = $crawler->filter('div.img-item > a > img');
        $time = date('Y-m-d H:i:s', time());

        foreach ($name as $k => $v) {
            $data[$k]['name'] = $v->textContent;
        }
        foreach ($code as $k => $v) {
            $data[$k]['code'] = $this->shearCode($v->attributes['length']->textContent);
        }
        foreach ($score as $k => $v) {
            $data[$k]['score'] = $v->textContent;
        }
        foreach ($image as $k => $v) {
            $data[$k]['image'] = $this->shearImgUrl($v->attributes['length']->textContent);
            $data[$k]['created_at'] = $time;
        }
        if (!$data) die('爬取完毕');

        $this->saveBaseData($data, $page);

        return;
    }

    protected function saveBaseData($data, $page)
    {
        DB::table('drama')->insert($data);
        echo '第 ' . $page . ' 页数据已处理' . "\r\n";

        return sleep(3);
    }

    protected function shearCode($url)
    {
        $url = explode('/', $url);

        return end($url);
    }

    protected function shearImgUrl($url)
    {
        $url = explode($this->imgUrlPrefix, $url);

        return end($url);
    }

    public function handleDownloadLink($client)
    {
        $dramaList = DB::table('drama')->select('id', 'name', 'code')->get();

        foreach ($dramaList as $v) {
            $this->getAloneUrl($client, $v);
        }
    }

    protected function getAloneUrl($client, $dramaData)
    {
        for ($season = 1; $season >=1; $season ++) {
            for ($episode = 1; $episode >=1; $episode ++) {
                $url = "http://m.zimuzu.tv/resource/item?rid=$dramaData->code&season=$season&episode=$episode";

                $crawler = $client->request('GET', $url);

                $dramaData->season = $season;
                $dramaData->episode = $episode;

                $link = $this->handleAloneUrl($crawler, $dramaData);

                if (!$link && $episode == 1) return;
                if (!$link) break;
                echo $url . "\r\n";

                unset($crawler);
            }
        }
    }

    protected function handleAloneUrl($crawler, $dramaData)
    {
        $type = $crawler->filter('a.mui-navigate-right');

        $typeList = [];
        foreach ($type as $v) {
            $typeList[] = $v->textContent;
        }
        if (!$typeList) return false;

        $link = [];
        foreach ($typeList as $k => $v) {
            if (mb_strpos($v, 'MP4') !== false && mb_strpos($v, '中文') !== false) {
                $link[] = $this->getDownloadLink($crawler, $dramaData, $k);
            } elseif (mb_strpos($v, 'HR-HDTV') !== false && mb_strpos($v, '中文') !== false) {
                $link[] = $this->getDownloadLink($crawler, $dramaData, $k);
            }
        }
        if (!$link) return false;

        return $link;
    }

    protected function getDownloadLink($crawler, $dramaData, $digit)
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

        return $this->renameDownloadLink($dramaData, $links[$digit]);
    }

    protected function renameDownloadLink($dramaData, $link)
    {
        $linkArr = explode('.mp4', $link);

        $newlink = 'ed2k://|file|'
            . $dramaData->name . '[第' . $dramaData->season . '季第' . $dramaData->episode . '集][knskzs.com].mp4'
            . $linkArr[1];

        $this->saveDownloadLink($dramaData, $newlink);

        return $link;
    }

    protected function saveDownloadLink($dramaData, $newlink)
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
