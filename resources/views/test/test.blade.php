<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
    <title>Document</title>
</head>
<body>

</body>
<script>
    $(function(){
        $.ajax({
            url:'{{url('/test')}}',
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
                var html = "";
                $.each(data, function(i, item){
                    html += "<tr product-title='"+ item.title +"+"+ item.tags +"'>\
							<td class='td-1'>"+ item.id +"</td>\
							<td>"+ item.title +"</td>\
							<td class='tbody-tr'>"+ item.type +"</td>\
							<td>"+ item.destination +"</td>\
							<td class='tbody-tr'>"+ item.tags +"</td>\
							<td class='tbody-tr'>"+ item.desc_short +"</td>\
							<td>"+ item.display +"</td>\
							<td>"+ item.tags +"</td>\
							<td>"+ item.category +"</td>\
							<td><a class='am-btn am-btn-primary bianji' ><i class='am-icon-eyedropper'></i></a></td>\
					</tr>";
                });
                $(".am-table-centered").find("tbody").html(html);
            }
        });
    });
</script>
</html>