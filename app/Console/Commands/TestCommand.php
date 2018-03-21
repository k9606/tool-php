<?php

namespace App\Console\Commands;

use Goutte\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
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
        $client = new \GuzzleHttp\Client();  //忽略SSL错误
        $response = $client->get("http://t.dyxz.la/upload/img/201803/poster_20180317_8771820_b.jpg", ['save_to' => public_path('/')]);
    }

    public function getImageUrl()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://m.80s.tw/movie/12-0-0-0-0-0-0');
        $url = $crawler->filter('img.lazy')->each(function (Crawler $node, $i) {
            $urlList = $node->attr('data-original');
            return $urlList;
        });
        return $url;
    }

}
