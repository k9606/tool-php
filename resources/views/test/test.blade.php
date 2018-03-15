<meta name="csrf-token" content="{{ csrf_token() }}">
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
</div>
<script>
    $(function() {
        $.ajax({
            url:'{{ url('/test') }}',
            data:"",
            type: "POST",
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend : function () {

            },
            complete : function () {

            },
            success : function(data) {
                var code = data.dataType;
                var html = "";
                $.each(data.list, function(i, item) {
                    html += "            <tr>\n" +
                        "                <td>"+item[0]+"</td>\n" +
                        "                <td>"+item[1]+"</td>\n" +
                        "                <td>"+code+"</td>\n" +
                        "            </tr>";
                });
                $("#vedio-list").html(html);
            }
        });
    });
</script>