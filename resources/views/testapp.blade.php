<?php
//if (empty($_SERVER['HTTPS'])) {
//    header("Location: https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");
//    exit;
//}
//?>
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}"><!--urlのTopの部分を消してadminとすると管理画面にいける-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">{{--これがないとエラー出るけどそれだけなので必要かどうかよくわからない...追記:セキュリティ関係、詳細＝＞　https://readouble.com/laravel/5.4/ja/csrf.html　--}}
    <title>Vue TODO</title>

    <link rel="stylesheet" href="css/app.css">

    <script>
        window.Laravel = {};
        window.Laravel.csrfToken = "{{ csrf_token() }}";
    </script>
</head>
<body>
<?php
ini_set('display_errors',1);
?>
<div id="app">
    {{--routerによって切り替わる表示部分--}}
</div>

{{--<div id="exam">--}}
    {{--<examp></examp>--}}
{{--</div>--}}
</body>

<script src="js/app.js"></script>
</html>