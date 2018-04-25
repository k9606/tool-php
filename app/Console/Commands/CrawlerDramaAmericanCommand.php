<?php

namespace App\Console\Commands;

use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CrawlerDramaAmericanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ustv:crawl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '美剧爬虫';

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

        for ($page = 1; $page >= 1; $page++) {
            $this->getBaseData($client, $page);
        }
    }

    protected function getBaseData($client, $page)
    {
        $crawler = $client->request('GET', "http://m.zimuzu.tv/resourcelist?channel=ustv&category=&year=&sort=update&page=$page");

        $name = $crawler->filter('p.desc > a.aurl');
        $code = $crawler->filter('p.desc > a.aurl');
        $score = $crawler->filter('span.count');
        $image = $crawler->filter('div.img-item > a > img');
        $time = date('Y-m-d H:i:s', time());

        $data = [];
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

        DB::table('drama')->insert($data);
        echo '第 ' . $page . ' 页数据已处理' . "\r\n";

        return sleep(3);
    }

    protected function shearCode($url)
    {
        $code = explode('/', $url);

        return end($code);
    }

    protected function shearImgUrl($url)
    {
        $code = explode($this->imgUrlPrefix, $url);

        return end($code);
    }
}