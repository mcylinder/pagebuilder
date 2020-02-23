<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Render List</title>
    <link href="/css/tailwind.min.css" rel="stylesheet">
<style>
    span.brick {
        width: 1200px;
        display: inline-block;
        overflow: hidden;
    }
</style>


</head>

<body class="bg-white">

<div class="text-white bg-red-900 bg-no-repeat bg-center bg-cover h-screen xl:hidden text-4xl p-10 text-center">
    Please widen your browser to at least 1280px.<br/>It is currently <span id="howWide"></span>px wide.
</div>

@foreach($bricks_need_image as $brick)
<span class="brick" data-brick_id="{{$brick->id}}">
    {!! $brick->html !!}
</span>
@endforeach

<script src='/js/app.js'></script>
</body>

</html>
