<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="knskzs">
    <meta name="keywords"
          content="knskzs, knskzs美剧, 好看的美剧, 美剧下载, 美剧在线观看, 美剧网, 天天美剧, 美剧天堂, 美剧推荐, 人人美剧, 美剧, 看美剧, 美剧吧, 美剧在线, 美剧分享, 美剧百度云, 美剧更新, 最新美剧, 美剧排行榜前十名, 美剧排行榜, 科幻美剧, 美剧下载最好的网站, 有什么好看的美剧, 美剧迅雷下载, 美剧免费下载, 高清电影迅雷下载, 手机mp4电影下载, 最新电视剧在线观看, bt美剧, 高清美剧下载, 美剧bt下载, meijv, meiju, mj, knskzsmeijv, knskzsmeiju, knskzsmj">
    <meta name="baidu-site-verification" content="iS3ORI53k7" />
    <title>knskzs</title>

    {{--<link rel="stylesheet" href="{{asset('css/app.css')}}">--}}
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    {{--<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">--}}
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    {{--<link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">--}}
    <link href="https://cdn.bootcss.com/admin-lte/2.4.2/css/AdminLTE.min.css" rel="stylesheet">

    {{--<link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">--}}
    <link href="https://cdn.bootcss.com/admin-lte/2.4.2/css/skins/_all-skins.min.css" rel="stylesheet">

    {{--<link rel="stylesheet" href="{{asset('css/jquery.toast.min.css')}}">--}}
    <link href="https://cdn.bootcss.com/jquery-toast-plugin/1.3.2/jquery.toast.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/loading.css')}}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    {{--顶部开始--}}
    <header class="main-header">
        <a href="" class="logo">
            <span class="logo-mini">kk</span>
            <span class="logo-lg">knskzs.com</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">缩小菜单</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    {{--顶部结束--}}
    {{--左侧开始--}}
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('images/user-default.jpg')}}" class="img-circle" alt="头像">
                </div>
                <div class="pull-left info">
                    @if (Auth::guest())
                        <p>用户名</p>
                        <a href="{{ url('/login') }}"><i class="fa fa-circle text-yellow"></i> 未登陆</a>
                    @else
                        <p>{{ Auth::user()->name }}</p>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                    class="fa fa-circle text-success"></i> 已登陆</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endif
                </div>
            </div>
            <ul class="sidebar-menu" data-widget="tree">
                <li><a href="{{ url('/') }}"><i class="fa fa-circle-o text-red"></i><span>&nbsp;美剧</span></a></li>
                <li><a href=""><i class="fa fa-circle-o text-yellow"></i><span>&nbsp;群聊 (在测试还没上线)</span></a></li>
            </ul>
        </section>
    </aside>
    {{--左侧结束--}}
    <div class="content-wrapper">
        {{--主体头部开始--}}
        <section class="content-header">
            <h1>美剧
                <small>列表</small>
            </h1>
        </section>
        {{--主体头部结束--}}
        {{--主体内容开始--}}
        <section class="content">
            <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><span id="nna"></span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="panel-body" id="drama-link">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"></h3>
                            <div class="pull-right">
                                <div class="form-inline pull-right">
                                    <div>
                                        <fieldset>
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-addon"><strong>剧名</strong></span>
                                                <input type="text" name="dramaname" id="drama-name" placeholder="剧名"
                                                       class="form-control">
                                                <span class="input-group-btn">
                                    <a type="button" id="search-drama-name" class="btn btn-primary"><i
                                                class="fa fa-search"></i></a>
                                    <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-undo"></i></a>
                                </span>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <div class="marketing">
                                <div id="drama-list" class="row">
                                    @foreach ($lists as $list)
                                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                            <img class="img-rounded" src="{{ $list->image }}"
                                                 alt="Generic placeholder image">
                                            <h4>{{ $list->tname }}</h4>
                                            <p><a did="{{ $list->id }}" nna="{{ $list->name }}"
                                                  class="btn btn-default btn-sm btn-down"
                                                  href="#" role="button"
                                                  data-toggle="modal" data-target="#myModal"><i
                                                            class="fa fa-hand-o-down"
                                                            aria-hidden="true"></i></a></p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="drama-page" class="box-footer clearfix">
                            {{ $lists->links() }}
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
        {{--主体内容结束--}}
    </div>
    {{--底部开始--}}
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright © 2018-<?php echo date('Y', time());?> <a href="">Bishengfei</a>.</strong> 蜀ICP备18020458号
    </footer>
    {{--底部结束--}}
</div>
</body>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>

{{--<script src="{{asset('js/app.js')}}"></script>--}}
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

{{--<script src="{{asset('js/adminlte.min.js')}}"></script>--}}
<script src="https://cdn.bootcss.com/admin-lte/2.4.2/js/adminlte.min.js"></script>

{{--<script src="{{asset('js/jquery.toast.min.js')}}"></script>--}}
<script src="https://cdn.bootcss.com/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

{{--<script src="{{asset('js/clipboard.min.js')}}"></script>--}}
<script src="https://cdn.bootcss.com/clipboard.js/2.0.0/clipboard.min.js"></script>
<script>
    $(document).on('click', '.btn-down', function () {
        var nna = $(this).attr('nna');
        var did = $(this).attr('did');
        var html = '';
        $.ajax({
            url: '{{ url('api/dramalink') }}',
            data: {'did': did},
            dataType: 'json',
            type: 'post',
            beforeSend: function () {
                $("#nna").html('-');
                $("#drama-link").html('<div class="front-loading">\n' +
                    '                <div class="front-loading-block"></div>\n' +
                    '                <div class="front-loading-block"></div>\n' +
                    '                <div class="front-loading-block"></div>\n' +
                    '            </div>');
            },
            complete: function () {
            },
            success: function (data) {
                if (data.code == -1) {
                    html +=
                        "<div class=\"my-collect\">\n" +
                        "<button type=\"button\" class=\"btn btn-default\" disabled=\"disabled\"><i class=\"fa fa-file-video-o\" aria-hidden=\"true\"></i>&nbsp;&nbsp;抱歉, 暂无数据</button>\n" +
                        "</div>\n";
                    $("#drama-link").html(html);
                    $("#nna").html(nna);
                } else if (data.code == 200) {
                    var arr = Object.keys(data.data);
                    for (var i = 0; i < arr.length; i++) {
                        var season = i + 1;
                        html +=
                            "<div class=\"my-collect\">\n" +
                            "<button type=\"button\" class=\"btn btn-default\" disabled=\"disabled\"><i class=\"fa fa-file-video-o\" aria-hidden=\"true\"></i>&nbsp;&nbsp;第" + season + "季</button>\n" +
                            "</div>\n" +
                            "<div id=\"drama-links" + season + "\" class=\"row\">\n";
                        for (var j = 0; j < data.data[season].length; j++) {
                            var e = data.data[season][j]['episode'];
                            var dlink = data.data[season][j]['link'];
                            var trg = "j" + j + i + "i";
                            html += "<button type=\"button\" class=\"btn btn-link col-xs-3 col-sm-2 col-md-1 col-lg-1 time-close spop-sd\" data-clipboard-target='#" + trg + "' data-dismiss=\"modal\" aria-label=\"Close\" data-toggle=\"modal\" data-target=\".bs-example-modal-sm\">第" + e + "集<input style='opacity: 0' id=" + trg + " type='text' value=" + dlink + "></button>\n";
                        }
                        html += "</div>";
                        $("#drama-link").html(html);
                        $("#nna").html(nna);
                    }
                }
                $('.spop-sd').click(function () {
                    $.toast({
                        text: "下载链复制成功",
                        heading: '提示',
                        allowToastClose: false,
                        hideAfter: 1000,
                        stack: false,
                        textAlign: 'left',
                        loader: true,
                        loaderBg: '#ffffff',
                        position: 'top-right'
                    })
                });
            }
        });
    });

    $('#search-drama-name').click(function () {
        var dramaname = $('#drama-name').val();
        if (dramaname == '') return false;
        $.ajax({
            url: '{{ url('api/dramasearch') }}',
            data: {'dramaname': dramaname},
            dataType: 'json',
            type: 'post',
            beforeSend: function () {
                $(".front-loading").show();
            },
            complete: function () {
                $(".front-loading").hide();
            },
            success: function (data) {
                var data = data.data;
                var html = "";
                $.each(data, function (i, item) {
                    html +=
                        '<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">\n' +
                        '                    <img class="img-rounded" src="' + item.image + '" alt="Generic placeholder image">\n' +
                        '                    <h4>' + item.tname + '</h4>\n' +
                        '                    <p>\n' +
                        '                        <a did="' + item.id + '" nna="' + item.name + '" class="btn btn-default btn-sm btn-down" href="#" role="button" data-toggle="modal" data-target="#myModal">\n' +
                        '                            <i class="fa fa-hand-o-down" aria-hidden="true">\n' +
                        '                            </i>\n' +
                        '                        </a>\n' +
                        '                    </p>\n' +
                        '                </div>';
                });
                $("#drama-list").html(html);
                $("#drama-page").html('');
            }
        });
    });

    var clipboard = new ClipboardJS('.btn');
    clipboard.on('success', function (e) {
        e.clearSelection();
    });
    clipboard.on('error', function (e) {
    });
</script>
</html>
