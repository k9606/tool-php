<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('css/loading.css')}}">
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>影视名</th>
                <th>集数</th>
                <th>来源</th>
            </tr>
        </thead>
        <tbody id="vedio-list">
        </tbody>
    </table>
    <div class="front-loading">
        <div class="front-loading-block"></div>
        <div class="front-loading-block"></div>
        <div class="front-loading-block"></div>
    </div>
</div>
<script>
    $(function() {
        $.ajax({
            url:'{{ url('admin/ajaxGetVideoList') }}',
            data:"",
            type: "get",
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend : function () {
                $(".front-loading").show();
            },
            complete : function () {
                $(".front-loading").hide();
            },
            success : function(data) {
                var code = data.dataType;
                var html = "";
                var codeMark='';

                $.each(data.list, function(i, item) {
                    if (code == 'cache') {
                        codeMark = '缓存';
                    } else if(code == 'new') {
                        codeMark = '网络';
                    }

                    html += "<tr>" +
                                "<td>"+item[0]+"</td>" +
                                "<td>"+item[1]+"</td>" +
                                "<td>"+codeMark+"</td>" +
                            "</tr>";
                });

                $("#vedio-list").html(html);
            }
        });
    });
</script>