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
    var websocket = new WebSocket('ws://192.168.0.141:8282');

    websocket.onopen = function(evt) {
        //websocket.send("hello");
        console.log('onopen' + evt);
    };

    websocket.onmessage = function(evt) {
        console.log('onmessage' + evt);
    };

    websocket.onclose = function(evt) {
        console.log('onclose' + evt);
    };

    websocket.onerror = function(evt, e) {
        console.log('onerror' + evt + e);
    };
</script>
</html>