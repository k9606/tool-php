<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
<script>
    var wsUrl = "ws://192.168.0.141:8282";

    var websocket = new WebSocket(wsUrl);

    //实例对象的onopen属性
    websocket.onopen = function(evt) {
        websocket.send("hello");
        console.log("conected-swoole-success");
    }

    // 实例化 onmessage
    websocket.onmessage = function(evt) {
        console.log("ws-server-return-data:" + evt.data);
    }

    //onclose
    websocket.onclose = function(evt) {
        console.log("close");
    }
    //onerror

    websocket.onerror = function(evt, e) {
        console.log("error:" + evt.data);
    }

</script>
</html>