<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>AdminLTE 2 | Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
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
                    <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle" alt="头像">
                </div>
                <div class="pull-left info">
                    <p>用户名</p>
                    <a href="#"><i class="fa fa-circle text-success"></i>状态</a>
                </div>
            </div>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">菜单</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bars"></i> <span>折叠菜单</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> 折叠菜单1</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> 折叠菜单2</a></li>
                    </ul>
                </li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>普通菜单1</span></a></li>
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
            主内容
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
</html>
