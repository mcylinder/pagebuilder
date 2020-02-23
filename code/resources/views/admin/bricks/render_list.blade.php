<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Render List</title>
    <link href="/css/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-white">
@foreach($bricks_need_image as $brick)
<span class="brick" data-brick_id="{{$brick->id}}">
    {!! $brick->html !!}
</span>
@endforeach


<script src='/js/app.js'></script>
</body>

</html>
