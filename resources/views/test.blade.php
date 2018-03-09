<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta charset="UTF-8">
    <title>欧美电视剧列表页(1/54) - 80s电影网</title>
    <meta name="keywords" content="电影下载" />
    <meta name="description" content="欧美电视剧列表页(1/54)" />

    <script src="/static/jquery.min.js"></script>
    <script src="/static/jquery.lazyload.min.js"></script>
    <link rel="stylesheet" href="/static/bootstrap/css/bootstrap.min.css">
    <script src="/static/bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="/build/static/style-1fcd5d70f1.css">
    <script src="/build/static/header-4fecc2a548.js"></script>
</head>
<body>
<div role="navigation" class="navbar navbar-inverse" id="nav" >
    <div class="container" >
        <div class="navbar-header" style="padding-left: 1em;">
            <a class="navbar-brand text-hide" href="/">
                <img src="/static/80slogo.png" alt="80s电影网">80s电影网</a>

            <button class="navbar-toggle" data-toggle="collapse" data-target="#responsive-navbar">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>

            <button id="resp_search_btn" class="visible-xs-inline">
                <span class="glyphicon glyphicon-search" style="color:#fff; font-size:20px;"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="responsive-navbar">
            <ul class="nav navbar-nav" style="font-size:16px;">
                <li><a href="/movie/1-0-0-0-0-0-0"><span class="glyphicon glyphicon-film"></span> 电影</a></li>
                <li><a href="/movie/2-0-0-0-0-0-0"><span class="glyphicon glyphicon-bishop"></span> 电视剧</a></li>
                <li><a href="/movie/4-0-0-0-0-0-0"><span class="glyphicon glyphicon-knight"></span> 综艺节目</a></li>
                <li><a href="/movie/7-0-0-0-0-0-0"><span class="glyphicon glyphicon-education"></span> 公开课</a></li>
                <li><a href="/movie/14-0-0-0-0-0-0"><span class="glyphicon glyphicon-eye-open"></span> 动漫</a></li>
                <li><a href="/movie/5-0-0-0-0-0-0"><span class="glyphicon glyphicon-headphones"></span> 音乐MV</a></li>
                <li><a href="/movie/6-0-0-0-0-0-0"><span class="glyphicon glyphicon-camera"></span> 视频短片</a></li>
                <!-- <li><a href="#" style="color:#31708f;">
                  <span class="glyphicon glyphicon-star-empty"></span> 专题/系列</a></li> -->
                <li id='search-bar'>
                    <form class="navbar-form navbar-right form-inline" action="/search" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="search_input" name="keyword" placeholder="输入电影名...">
                        </div>
                        <button type="submit" class="" id="search_btn">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </form>
                </li>
            </ul>

        </div>
    </div>
</div>

<div>

</div>

<div class="container" id="path">
    <ol class="breadcrumb col-lg-12">
        <li><a href="/">网站首页</a></li>
        <li class="actived">欧美电视剧</li>
    </ol>
</div>

<div class="container" style="padding: 0;">

    <div class="col-xs-12" id="mainbody" style="margin-left:0px;margin-right:0px; padding: 0 10px;">
        <div class="clearfix col-sm-12 col-xs-12" style="margin-bottom:2em; padding:16px; line-height:200%;">

            <div class="">
                <strong>地区：</strong>
                <a id="ju_cate2" href="/movie/2-0-0-0-0-0-0">所有</a>
                <a id="ju_cate9" href="/movie/9-0-0-0-0-0-0">大陆剧</a>
                <a id="ju_cate10" href="/movie/10-0-0-0-0-0-0">港台剧</a>
                <a id="ju_cate11" href="/movie/11-0-0-0-0-0-0">日韩剧</a>
                <a id="ju_cate12" href="/movie/12-0-0-0-0-0-0">欧美剧</a>
                <br>
            </div>




            <div class="">
                <strong>年代：</strong>
                <a id="year0" href="/movie/12-0-0-0-0-0-0">所有</a>
                <a id="year2018" href="/movie/12-0-0-2018-0-0-0">2018</a>
                <a id="year2017" href="/movie/12-0-0-2017-0-0-0">2017</a>
                <a id="year2016" href="/movie/12-0-0-2016-0-0-0">2016</a>
                <a id="year2015" href="/movie/12-0-0-2015-0-0-0">2015</a>
                <a id="year2014" href="/movie/12-0-0-2014-0-0-0">2014</a>
                <a id="year2013" href="/movie/12-0-0-2013-0-0-0">2013</a>
                <br>
            </div>




            <strong>排序：</strong>
            <a id="orderby0" href="/movie/12-0-0-0-0-0-0">最近更新</a>
            <a id="orderbyg" href="/movie/12-0-0-0-0-0-g">评分</a>
            <a id="orderbyh" href="/movie/12-0-0-0-0-0-h">人气</a>
        </div>

        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/22394">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201802/poster_20180228_6712643_b.jpg">
                <span class="poster-score">8.3</span>
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/22394">诸事不顺</a></h4>
                <em>第2集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/21741">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201711/poster_20171107_5616699_b.jpg">
                <span class="poster-score">7.8</span>
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/21741">闪电侠 第四季</a></h4>
                <em>第14集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/22057">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201712/poster_20171228_4791156_b.jpg">
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/22057">洛维航线</a></h4>
                <em>第6集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/22270">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201802/poster_20180201_8676159_b.jpg">
                <span class="poster-score">8.0</span>
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/22270">沉默的天使</a></h4>
                <em>第6集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/22061">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201712/poster_20171228_8183898_b.jpg">
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/22061">白闻名/白色名望</a></h4>
                <em>第9集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/21817">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201711/poster_20171117_5631953_b.jpg">
                <span class="poster-score">6.8</span>
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/21817">明日传奇 第三季</a></h4>
                <em>第12集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/21793">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201711/poster_20171115_1441028_b.jpg">
                <span class="poster-score">6.8</span>
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/21793">天蝎 第四季</a></h4>
                <em>第17集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/22396">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201802/poster_20180228_2594429_b.jpg">
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/22396">鬼玩人之阿什斗鬼[第三季]</a></h4>
                <em>第1集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/22395">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201802/poster_20180228_6515788_b.jpg">
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/22395">我是僵尸[第四季]</a></h4>
                <em>第1集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/21791">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201711/poster_20171115_8549217_b.jpg">
                <span class="poster-score">8.8</span>
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/21791">良医</a></h4>
                <em>第15集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/22186">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201801/poster_20180117_7973866_b.jpg">
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/22186">崩溃人生[第二季]</a></h4>
                <em>第7集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/22386">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201802/poster_20180227_8933417_b.jpg">
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/22386">天佑吾王</a></h4>
                <em>第1集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/22385">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201802/poster_20180227_8051332_b.jpg">
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/22385">隧道迷案/边隧谜案 第三季</a></h4>
                <em>第3集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/22384">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201802/poster_20180227_6983290_b.jpg">
                <span class="poster-score">8.2</span>
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/22384">连带伤害</a></h4>
                <em>第2集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/21738">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201711/poster_20171107_9480126_b.jpg">
                <span class="poster-score">8.5</span>
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/21738">行尸走肉 第八季</a></h4>
                <em>第9集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/21790">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201711/poster_20171115_7322566_b.jpg">
                <span class="poster-score">8.5</span>
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/21790">路西法 第三季</a></h4>
                <em>第15集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/21993">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201712/poster_20171214_8438702_b.jpg">
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/21993">相对宇宙 第一季</a></h4>
                <em>第6集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/21737">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201711/poster_20171107_6643022_b.jpg">
                <span class="poster-score">6.1</span>
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/21737">反击 第六季</a></h4>
                <em>第9集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/22338">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201802/poster_20180217_8026548_b.jpg">
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/22338">星际之门：起源</a></h4>
                <em>第5集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/22333">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201802/poster_20180216_6324427_b.jpg">
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/22333">零异频道[第三季]</a></h4>
                <em>第3集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/22323">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201802/poster_20180213_3421914_b.jpg">
                <span class="poster-score">9.3</span>
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/22323">国土安全[第七季]</a></h4>
                <em>第2集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/22211">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201801/poster_20180121_4930460_b.jpg">
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/22211">超能/超越 第二季</a></h4>
                <em>第6集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/22240">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201801/poster_20180126_6442822_b.jpg">
                <span class="poster-score">8.8</span>
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/22240">美国罪案故事[第二季]</a></h4>
                <em>第5集</em>
            </div>
        </div>
        <div class="col-xs-4 col-md-2 list_mov">
            <a href="/movie/21776">
                <img class="img-responsive center-block lazy" data-original="//t.dyxz.la/upload/img/201711/poster_20171114_5153357_b.jpg">
                <span class="poster-score">7.9</span>
            </a>
            <div class="list_mov_title">
                <h4><a href="/movie/21776">星际迷航：发现号 第一季</a></h4>
                <em>第15集(全)</em>
            </div>
        </div>

        <div id="pager" class="clearfix col-sm-12 col-xs-12" style="padding:0;">
            <nav>
                <ul class="pager">
                    第1页
                    <!-- / 共54页 -->
                    <li><a href="/movie/12-24-0-0-0-0-0">下一页</a></li>
                    <li><a href="/movie/12-1272-0-0-0-0-0">尾页</a></li>
                    <ul>
            </nav>
            <br>
            <br>
        </div>

        <script language="javascript">
            $(document).ready(function() {
                $('div.genre_list > a:eq(6)').nextAll().hide();
                $('.genre_more').show();
                $('.genre_more').on('click', function(){
                    $('div.genre_list > a:eq(6)').nextAll().show();
                    $(this).hide();
                    event.preventDefault();
                });

                $('div.location_list > a:eq(6)').nextAll().hide();
                $('.location_more').show();
                $('.location_more').on('click', function(){
                    $('div.location_list > a:eq(6)').nextAll().show();
                    $(this).hide();
                    event.preventDefault();
                });

                $('#ju_cate12').addClass('bg-info');
                $('#genre0').addClass('bg-info');
                $('#language0').addClass('bg-info');
                $('#location0').addClass('bg-info');
                $('#year0').addClass('bg-info');
                $('#orderby0').addClass('bg-info');

                $("img.lazy").lazyload({
                    effect : "fadeIn"
                });
            });
        </script>
    </div>

    <div class="col-xs-12" id="sidebar" style="margin-left:0px;margin-right:0px; padding: 0 10px;">
    </div>

</div>
<script>

</script>

<div id="footer">
    <div class="container">
        <p>
            <a href="#">返回顶部</a>
            <span>|</span>
            <a href="/movie/1-0-0-2016-0-0-0">2016电影</a>
            <span>|</span>
            <a href="http://blog.80s.tw/" target="_blank">下载教程</a>
            <span>|</span>
            <a href="/contact">联系我们</a>
        </p>
        <p id="copyright">
            80s电影网( www.80s.tw )，专业的MP4视频网站
        </p>
        <a id="full-site-link" class="btn btn-sm btn-success center-block" href="http://www.80s.tw">
            <span class="glyphicon glyphicon-log-in"></span>
            切换至电脑版</a>
    </div>
</div>
<script src="/static/footer.js?v=1216"></script>
</body>
</html>
<script type="text/javascript">
    if (/(iphone|ipad|ipod|iOS)/i.test(navigator.userAgent)){

    }
    if (/(android)/i.test(navigator.userAgent)){

    }

</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111405124-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-111405124-1');
</script>
