<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/vue.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <title>Document</title>
</head>
<body>
<div class="content">
    <div id="app">
        <ol>
            <li v-for="value in sites">
                @{{ value.name }}
            </li>
        </ol>
    </div>
</div>
</body>
<script>

    axios.get('/test')
        .then(function(response){
            //console.log(response);
            new Vue({
                el: '#app',
                data: {
                    sites: [
                        response.data
                        //console.log(response.data)
                    ]
                }
            })
        })
</script>
</html>