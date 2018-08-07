<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>远方小镇</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="description" content="Rain的博客---远方小镇">
        <meta name="keywords" content="博客,IT,技术,php,css,js">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <h1><?php echo $hello;?></h1>
        <pre><?php var_dump($user);?></pre>
    </body>
</html>
