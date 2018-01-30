<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script>
        window.App = <?php echo json_encode([
            'user' => Auth::user(),
            'signedIn' => Auth::check(),
<<<<<<< HEAD
            'wxconfig' => config('app.debug') ? '' : $js->config(array(
=======
            'wxconfig' => app('wechat.official_account')->jssdk->buildConfig(array(
>>>>>>> 21f67f65d278a35aa1cfa9e86f22b4a53e8ad049
               'onMenuShareTimeline',
               'onMenuShareAppMessage',
               'onMenuShareQQ',
               'onMenuShareWeibo',
               'onMenuShareQZone',
            ), false)
        ]); ?>
    </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
