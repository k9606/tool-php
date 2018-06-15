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
                    <img src="{{asset('images/user-default.jpg')}}" class="img-circle" alt="头像">
                </div>
                <div class="pull-left info">
                    <p>用户名</p>woole
                    <a href="#"><i class="fa fa-circle text-success"></i> 登录</a>
                </div>
            </div>
            <ul class="sidebar-menu" data-widget="tree">
                <li><a href="{{ url('/') }}"><i class="fa fa-circle-o text-red"></i><span>&nbsp;美剧</span></a></li>
                <li><a href="{{ url('/message') }}"><i
                                class="fa fa-circle-o text-yellow"></i><span>&nbsp;socket&nbsp;基础</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i><span>&nbsp;普通菜单3</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-green"></i><span>&nbsp;普通菜单4</span></a></li>
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

            <div class="box box-danger direct-chat direct-chat-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">websocket 测试</h3>
                    <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-red">3</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                                data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="direct-chat-messages">

                    </div>

                    <div class="direct-chat-contacts">
                        <ul class="contacts-list">
                            <li>
                                <a href="#">
                                    <img class="contacts-list-img" src="{{asset('images/user-default.jpg')}}"
                                         alt="Contact Avatar">
                                    <div class="contacts-list-info">
              <span class="contacts-list-name">
                Count Dracula
                <small class="contacts-list-date pull-right">2/28/2015</small>
              </span>
                                        <span class="contacts-list-msg">How have you been? I was...</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="input-group">
                        <input id="msg" type="text" name="message" placeholder="输入信息..." class="form-control">
                        <span class="input-group-btn">
        <button id="msg-send" type="button" class="btn btn-danger btn-flat">发 送</button>
      </span>
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
<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>
<script>



    var ws = new WebSocket('ws://192.168.0.141:8282');
    var msgHtml = '';

    ws.onopen = function (evt) {
        //ws.send('44');
        //console.log(evt);
    };

    ws.onmessage = function (evt) {
        //console.log(ff);
        if (evt.data.indexOf('clientmarkk9606') != -1) {
            localStorage.setItem('clientId', evt.data.substring(15));
        } else {
            msgHtml +=
                "<div class=\"direct-chat-msg\">\n" +
                "<div class=\"direct-chat-info clearfix\">\n" +
                "<span class=\"direct-chat-name pull-left\">" + clientTmpName() + "</span>\n" +
                "<span class=\"direct-chat-timestamp pull-left\">&nbsp;" + getFormatDate() + "</span>\n" +
                "</div>\n" +
                "<img class=\"direct-chat-img\" src=\"{{ asset('images/user-default.jpg') }}\"\n" +
                "alt=\"message user image\">\n" +
                "<div style=\"display: inline-block; margin-left: 10px;float: left;\" class=\"direct-chat-text\">\n" + evt.data + "\n" +
                "</div>\n" +
                "</div>";

            $('.direct-chat-messages').html(msgHtml);
            //$('.direct-chat-msg').scrollTop();
            $('.direct-chat-messages').scrollTop($('.direct-chat-messages')[0].scrollHeight);
        }
    };

    ws.onclose = function () {
        //alert('close');
    };

    ws.onerror = function () {
        alert('error');
    };

    $('#msg-send').click(function () {
        var msg = $('#msg').val();
        if ($.trim(msg) == '' ) return;

        var clientId = localStorage.getItem('clientId');
        //alert(clientId);
        $.ajax({
            url: 'http://192.168.0.141/api/send',
            data: {'msg': msg, 'client_id': clientId},
            dataType: 'jsonp',
            type: 'post',
            success: function (data) {
                msgHtml +=
                    "<div class=\"direct-chat-msg right\">\n" +
                    "<div class=\"direct-chat-info clearfix\">\n" +
                    "<span class=\"direct-chat-timestamp pull-right\">&nbsp;" + getFormatDate() + "</span>\n" +
                    "<span class=\"direct-chat-name pull-right\">" + clientTmpName() + "</span>\n" +
                    "</div>\n" +
                    "<img class=\"direct-chat-img\" src=\"{{asset('images/user-default.jpg')}}\"\n" +
                    "alt=\"message user image\">\n" +
                    "<div style=\"display: inline-block; margin-right: 10px;float: right;\" class=\"direct-chat-text\">\n" + data.data + "\n" +
                    "</div>\n" +
                    "</div>";
                $('.direct-chat-messages').html(msgHtml);
                //$('.direct-chat-msg').scrollTop();
                $('.direct-chat-messages').scrollTop($('.direct-chat-messages')[0].scrollHeight);
            }
        });
        $('#msg').val('');
    });

    $("body").keydown(function () {
        if (event.keyCode == "13") {
            $('#msg-send').click();
        }
    });

    function clientTmpName() {
        return cutStr(returnCitySN['cname'], '省') + '[' + cutStr(returnCitySN['cip'], '.') + ']';
    }

    function cutStr(str, key) {
        var index = str.lastIndexOf(key);
        newStr = str.substring(index + 1, str.length);

        return newStr;
    }

    function getFormatDate() {
        var nowDate = new Date();
        // var year = nowDate.getFullYear();
        // var month = nowDate.getMonth() + 1 < 10 ? "0" + (nowDate.getMonth() + 1) : nowDate.getMonth() + 1;
        // var date = nowDate.getDate() < 10 ? "0" + nowDate.getDate() : nowDate.getDate();
        var hour = nowDate.getHours() < 10 ? "0" + nowDate.getHours() : nowDate.getHours();
        var minute = nowDate.getMinutes() < 10 ? "0" + nowDate.getMinutes() : nowDate.getMinutes();
        // var second = nowDate.getSeconds() < 10 ? "0" + nowDate.getSeconds() : nowDate.getSeconds();
        return hour + ":" + minute;
    }
</script>
</html>
