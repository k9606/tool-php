<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GetHtml extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:html';

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
        $url = 'https://www.eee551.com/htm/movielist1/';
        $url = 'http://www.80s.tw/ju/list/----12-';
        $url = 'https://www.eee551.com/htm/pic1/170924.htm';
        $a = $this->curl_request($url);
        //include
        $html = new simple_html_dom();
        Log::info($a);
        var_dump($a);
    }

    public function curl_request($url, $post = '', $cookie_jar = '',$cookie = '',$http = 1)
    {
        $ch = curl_init(); //初始化curl
        curl_setopt($ch, CURLOPT_URL, $url); //抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0); //设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        if($cookie){
            curl_setopt($ch, CURLOPT_COOKIE, $cookie); //设置Cookie信息保存在指定的文件中
        }else{
            curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar); //设置Cookie信息保存在指定的文件中
        }

        if($post){
            curl_setopt($ch, CURLOPT_POST, 1); //post提交方式
            $post = is_array($post) ? http_build_query($post) : $post;
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }

        if ($http) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        }

        $data = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $data;
    }

}
