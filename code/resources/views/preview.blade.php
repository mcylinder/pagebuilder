<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? ''}}</title>
    <link href="/css/tailwind.min.css" rel="stylesheet">

<style>

</style>


</head>

<body class="bg-white ">

@foreach($bricks as $brick)
    {!! $brick->html !!}
    @endforeach

</body>

</html>
