<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>knskzs</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/loading.css')}}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    {{--顶部开始--}}
    <header class="main-header">
        <a href="index2.html" class="logo">
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
                    <img src="{{asset('images/user2-160x160.jpg')}}" class="img-circle" alt="头像">
                </div>
                <div class="pull-left info">
                    <p>用户名</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> 登录</a>
                </div>
            </div>
            <ul class="sidebar-menu" data-widget="tree">
                {{--<li class="header">折叠菜单</li>--}}
                {{--<li class="treeview">--}}
                    {{--<a href="#">--}}
                        {{--<i class="fa fa-bars"></i> <span>折叠菜单</span>--}}
                        {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
                    {{--</a>--}}
                    {{--<ul class="treeview-menu">--}}
                        {{--<li><a href="#"><i class="fa fa-circle-o"></i> 折叠菜单1</a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-circle-o"></i> 折叠菜单2</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span> 美剧</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>普通菜单2</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>普通菜单3</span></a></li>
            </ul>
        </section>
    </aside>
    {{--左侧结束--}}

    <div class="content-wrapper">
        {{--主体头部开始--}}
        <section class="content-header">
            <h1>
                大标题
                <small>小标题</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 面包屑1</a></li>
                <li class="active">面包屑2</li>
            </ol>
        </section>
        {{--主体头部结束--}}
        {{--主体内容开始--}}
        <section class="content">
            <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div id="drama-link" class="panel panel-primary">
                        <!-- Default panel contents -->

                    </div>
                </div>
            </div>

            <div class="modal fade bs-example-modal-sm" id="myModall" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="alert alert-info" role="alert" style="text-align: center">下载链复制成功</div>
                </div>
            </div>

            <div class="marketing">
                <div id="drama-list" class="row">
                    <div class="front-loading">
                        <div class="front-loading-block"></div>
                        <div class="front-loading-block"></div>
                        <div class="front-loading-block"></div>
                    </div>
                </div>
            </div>

        </section>
        {{--主体内容结束--}}
    </div>
    {{--底部开始--}}
    <footer class="main-footer">
        版权
    </footer>
    {{--底部结束--}}
</div>
</body>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/adminlte.min.js')}}"></script>
<script>
    $(function() {
        $.ajax({
            url:'{{ url('api/dramalist') }}',
            dataType: 'json',
            beforeSend : function () {
                $(".front-loading").show();
            },
            complete : function () {
                $(".front-loading").hide();
            },
            success : function(data) {
                var html = "";
                $.each(data, function(i, item) {
                    html +=
                        "<div class=\"col-xs-6 col-sm-4 col-md-3 col-lg-2\">\n" +
                        "<img class=\"img-rounded\" src="+item['image']+" alt=\"Generic placeholder image\">\n" +
                        "<h4>"+item['name']+"</h4>\n" +
                        "<p><a class=\"btn btn-default btn-sm\" href=\"#\" role=\"button\" data-toggle=\"modal\" data-target=\"#myModal\"><i class=\"fa fa-hand-o-down\" aria-hidden=\"true\"></i></a></p>\n" +
                        "</div>";
                });
                $("#drama-list").html(html);
            }
        });
    });

    $('.time-close').click(function() {
        $.ajax({
            url:'{{ url('api/dramalink') }}',
            dataType: 'json',
            beforeSend : function () {
                $(".front-loading").show();
            },
            complete : function () {
                $(".front-loading").hide();
            },
            success : function(data) {
                var html = "<div class=\"panel-heading\">行尸走肉 ed2k\n" +
                    "                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>\n" +
                    "                        </div>\n" +
                    "                        <div class=\"panel-body\">\n" +
                    "                            <div class=\"my-collect\">\n" +
                    "                                <button type=\"button\" class=\"btn btn-default\" disabled=\"disabled\"><i class=\"fa fa-file-video-o\" aria-hidden=\"true\"></i> 第三季</button>\n" +
                    "                            </div>\n" +
                    "                            <div class=\"row\">\n" +
                    "                                <button type=\"button\" class=\"btn btn-link col-xs-3 col-sm-2 col-md-1 col-lg-1 time-close\" data-dismiss=\"modal\" aria-label=\"Close\" data-toggle=\"modal\" data-target=\".bs-example-modal-sm\">第01集</button>\n" +
                    "                            </div>\n" +
                    "                        </div>";
                $.each(data, function(i, item) {
                    html += "";
                });
                $("#drama-link").html(html);
            }
        });
        // setTimeout(function() {
        //     $("#myModall").modal("hide")
        // }, 1000);
    });

    $('.downlink').click(function () {
        alert(3);
    });
</script>
</html>
