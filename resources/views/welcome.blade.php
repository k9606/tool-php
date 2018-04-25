<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome</title>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway';
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Welcome
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    ws = new WebSocket("ws://192.168.0.144:7272");
    // 服务端主动推送消息时会触发这里的onmessage
    ws.onmessage = function(e){
        // json数据转换成js对象
        console.log(e.data);
        // var type = data.type || '';
        // switch(type){
        //     // Events.php中返回的init类型的消息，将client_id发给后台进行uid绑定
        //     case 'init':
        //         // 利用jquery发起ajax请求，将client_id发给后端进行uid绑定
        //         //$.post('./bind.php', {client_id: data.client_id}, function(data){}, 'json');
        //         break;
        //     // 当mvc框架调用GatewayClient发消息时直接alert出来
        //     default :
        //         alert(e.data);
        // }
    };
</script>
</html>
