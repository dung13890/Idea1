<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>App Framgia</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Application For Tester">
    <meta name="author" content="Developer of Framgia">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ Html::style(elixir('assets/css/app.css')) }}
    @stack('prestyles')
</head>
<body class="skin-blue sidebar-mini">
    <div class="wrapper">
        @include('app._partials.header')
        <div class="content-wrapper">
            @yield('page-content')
        </div>
    </div>

    {{ Html::script('vendor/jquery/jquery.min.js') }}
    {{ Html::script('vendor/bootstrap/js/bootstrap.min.js') }}
    {{ Html::script(elixir('assets/js/app.js')) }}
    @stack('prescripts')
</body>
</html>
