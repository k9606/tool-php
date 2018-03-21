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
        $client = new \GuzzleHttp\Client();
        list($imgArr, $time) = $this->getImageUrl();
        foreach ($imgArr as $v) {
            $img = $client->request('get', $v)->getBody()->getContents();
            Storage::disk('local')->put($this->makeDirAndName($time), $img);
            echo "$v 下载完成\r\n";
        }
    }

    public function getImageUrl()
    {
        $time = date('Y-m-d', time());
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.803ee.com/htm/movielist1/1.htm');
        $url = $crawler->filter('img')->each(function (Crawler $node, $i) {
            $urlList = $node->attr('src');
            return $urlList;
        });
        return [$url, $time];
    }

    public function makeDirAndName($time)
    {
        $dir = 'you_know';
        return $dir . '/' . $time . '/' . time() . '_' . rand(10000, 99999) . '.png';
    }

}
