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
    {{--<link rel="stylesheet" href="{{asset('css/loading.css')}}">--}}
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
                    <p>用户名</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> 登录</a>
                </div>
            </div>
            <ul class="sidebar-menu" data-widget="tree">
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
            <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="panel panel-primary">

                        <div class="panel-heading">行尸走肉 ed2k
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="panel-body" id="drama-link">

                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade bs-example-modal-sm" id="myModall" tabindex="-1" role="dialog"
                 aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="alert alert-info" role="alert" style="text-align: center">下载链复制成功</div>
                </div>
            </div>

            <div class="marketing">
                <div id="drama-list" class="row">
                    @foreach ($lists as $list)
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                            <img class="img-rounded" src="{{ $list->image }}" alt="Generic placeholder image">
                            <h4>{{ $list->name }}</h4>
                            <p><a did="{{ $list->id }}" class="btn btn-default btn-sm btn-down" href="#" role="button"
                                  data-toggle="modal" data-target="#myModal"><i class="fa fa-hand-o-down"
                                                                                aria-hidden="true"></i></a></p>
                        </div>
                    @endforeach
                </div>
                {{ $lists->links() }}
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
{{--<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>--}}
{{--<script src="http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js"></script>--}}
<script>
    $('.btn-down').click(function () {
        var did = $(this).attr('did');
        var html = '';
        var htmls = '';
        $.ajax({
            url: '{{ url('api/dramalink') }}',
            data: {'did': did},
            dataType: 'json',
            type: 'post',
            beforeSend: function () {
                $(".front-loading").show();
            },
            complete: function () {
                $(".front-loading").hide();
            },
            success: function (data) {
                var arr = Object.keys(data.data);

                //console.log(data.data.length)
                //console.log(data.data[1].length)
                console.log(10101);
                for (var i = 0; i < arr.length; i++) {
                    var season = i + 1;
                    console.log(season);
                    html +=
                        "<div class=\"my-collect\">\n" +
                        "<button type=\"button\" class=\"btn btn-default\" disabled=\"disabled\"><i class=\"fa fa-file-video-o\" aria-hidden=\"true\"></i>第" + season + "季</button>\n" +
                        "</div>\n" +
                        "<div id=\"drama-links" + season + "\" class=\"row\">\n" ;

                    for (var j = 0; j < data.data[season].length; j++) {//遍历json数组时，这么写p为索引，0,1

                        var e = data.data[season][j]['episode'];
                        html += "<button type=\"button\" class=\"btn btn-link col-xs-3 col-sm-2 col-md-1 col-lg-1 time-close\" data-dismiss=\"modal\" aria-label=\"Close\" data-toggle=\"modal\" data-target=\".bs-example-modal-sm\">第" + e + "集</button>\n";

                        //console.log(data.data[season][j]['link'])
                        var cc = 'drama-links' + season;
                        console.log(cc);
                    }
                    html += "</div>";
                    //$("#"+ cc +"").html(html);
                    $("#drama-link").html(html);
                }




                // var season;
                // var episode;
                // var link;
                // $.each(data.data, function (i, item) {
                //     season = item.season;
                //     episode = item.episode;
                //     link = item.link;
                //     html +=
                //         "<div class=\"my-collect\">\n" +
                //         "<button type=\"button\" class=\"btn btn-default\" disabled=\"disabled\"><i class=\"fa fa-file-video-o\" aria-hidden=\"true\"></i>第" + season + "季</button>\n" +
                //         "</div>\n" +
                //         "<div class=\"row\">\n" +
                //         "<button type=\"button\" class=\"btn btn-link col-xs-3 col-sm-2 col-md-1 col-lg-1 time-close\" data-dismiss=\"modal\" aria-label=\"Close\" data-toggle=\"modal\" data-target=\".bs-example-modal-sm\">第" + episode + "集</button>\n" +
                //         "</div>";
                //     //console.log(i);
                //     //console.log(item.season);
                //     //console.log(item.episode);
                //     //console.log(item.link);
                // });
                // $("#drama-link").html(html);
            }
        });
        $('#myModall').on('shown.bs.modal', function () {
            setTimeout(function () {
                $("#myModall").modal("hide")
            }, 200);
        })
    });

    {{--function getClientData() {--}}
    {{--return remote_ip_info['city'] + returnCitySN['cip'];--}}
    {{--}--}}

    {{--//document.write("IP: " + returnCitySN['cip'] + "<br>地区代码: " + returnCitySN['cid'] + "<br>所在地: " + returnCitySN['cname']);--}}
    {{--console.log(returnCitySN['cip']);--}}
    {{--console.log(remote_ip_info['city']);//["province"] + "省" + ',' +remote_ip_info["city"] + "市")--}}

    {{--var ws = new WebSocket('ws://192.168.0.141:8282');--}}
    {{--var msgHtml = '';--}}

    {{--ws.onopen = function (evt) {--}}
    {{--//ws.send('44');--}}
    {{--//console.log(evt);--}}
    {{--};--}}

    {{--ws.onmessage = function (evt) {--}}
    {{--//console.log(ff);--}}
    {{--if (evt.data.indexOf('clientmarkk9606') != -1) {--}}
    {{--localStorage.setItem('clientId', evt.data.substring(15));--}}
    {{--} else {--}}
    {{--msgHtml +=--}}
    {{--"<div class=\"direct-chat-msg\">\n" +--}}
    {{--"<div class=\"direct-chat-info clearfix\">\n" +--}}
    {{--"<span class=\"direct-chat-name pull-left\">" + getClientData() + "</span>\n" +--}}
    {{--"<span class=\"direct-chat-timestamp pull-right\">" + getFormatDate() + "</span>\n" +--}}
    {{--"</div>\n" +--}}
    {{--"<img class=\"direct-chat-img\" src=\"{{ asset('images/user-default.jpg') }}\"\n" +--}}
    {{--"alt=\"message user image\">\n" +--}}
    {{--"<div class=\"direct-chat-text\">\n" + evt.data + "\n" +--}}
    {{--"</div>\n" +--}}
    {{--"</div>";--}}

    {{--$('.direct-chat-messages').html(msgHtml);--}}
    {{--//$('.direct-chat-msg').scrollTop();--}}
    {{--$('.direct-chat-messages').scrollTop($('.direct-chat-messages')[0].scrollHeight);--}}
    {{--}--}}
    {{--};--}}

    {{--ws.onclose = function () {--}}
    {{--//alert('close');--}}
    {{--};--}}

    {{--ws.onerror = function () {--}}
    {{--alert('error');--}}
    {{--};--}}

    {{--$('#msg-send').click(function () {--}}
    {{--var msg = $('#msg').val();--}}
    {{--if (msg == '') return;--}}
    {{--var clientId = localStorage.getItem('clientId');--}}
    {{--//alert(clientId);--}}
    {{--$.ajax({--}}
    {{--url: 'http://192.168.0.141/api/send',--}}
    {{--data: {'msg': msg, 'client_id': clientId},--}}
    {{--dataType: 'jsonp',--}}
    {{--type: 'post',--}}
    {{--success: function (data) {--}}
    {{--msgHtml +=--}}
    {{--"<div class=\"direct-chat-msg right\">\n" +--}}
    {{--"<div class=\"direct-chat-info clearfix\">\n" +--}}
    {{--"<span class=\"direct-chat-name pull-right\">" + getClientData() + "</span>\n" +--}}
    {{--"<span class=\"direct-chat-timestamp pull-left\">" + getFormatDate() + "</span>\n" +--}}
    {{--"</div>\n" +--}}
    {{--"<img class=\"direct-chat-img\" src=\"{{asset('images/user-default.jpg')}}\"\n" +--}}
    {{--"alt=\"message user image\">\n" +--}}
    {{--"<div class=\"direct-chat-text\">\n" + data.data + "\n" +--}}
    {{--"</div>\n" +--}}
    {{--"</div>";--}}
    {{--$('.direct-chat-messages').html(msgHtml);--}}
    {{--//$('.direct-chat-msg').scrollTop();--}}
    {{--$('.direct-chat-messages').scrollTop($('.direct-chat-messages')[0].scrollHeight);--}}
    {{--}--}}
    {{--});--}}
    {{--$('#msg').val('');--}}
    {{--});--}}

    {{--$("body").keydown(function () {--}}
    {{--if (event.keyCode == "13") {--}}
    {{--$('#msg-send').click();--}}
    {{--}--}}
    {{--});--}}

    {{--function getFormatDate() {--}}
    {{--var nowDate = new Date();--}}
    {{--var year = nowDate.getFullYear();--}}
    {{--var month = nowDate.getMonth() + 1 < 10 ? "0" + (nowDate.getMonth() + 1) : nowDate.getMonth() + 1;--}}
    {{--var date = nowDate.getDate() < 10 ? "0" + nowDate.getDate() : nowDate.getDate();--}}
    {{--var hour = nowDate.getHours() < 10 ? "0" + nowDate.getHours() : nowDate.getHours();--}}
    {{--var minute = nowDate.getMinutes() < 10 ? "0" + nowDate.getMinutes() : nowDate.getMinutes();--}}
    {{--var second = nowDate.getSeconds() < 10 ? "0" + nowDate.getSeconds() : nowDate.getSeconds();--}}
    {{--return year + "-" + month + "-" + date + " " + hour + ":" + minute + ":" + second;--}}
    {{--}--}}
</script>
</html>
