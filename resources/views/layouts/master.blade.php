<!doctype html>
<html lang="{{$lang}}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>L'Appui-Financier - @yield('titre')</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/tooltips.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/lappui.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/tabs.css') }}" rel="stylesheet" />
        <link rel="icon" type="image/png" href="img/favicon/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="img/favicon/favicon-16x16.png" sizes="16x16">
    </head>
    <body>
        @include('layouts.banniere')
        <div class="contenu">
            @yield('contenu')
        </div>
        <script src="{{ asset('js/jquery-3.2.1.js') }}"></script>
        <script src="{{ asset('js/controllers/LocalizationController.js') }}"></script>
        <script src="{{ asset('js/tooltips.js') }}"></script>
        <script src="{{ asset('js/banniere.js') }}"></script>
        <script src="{{ asset('js/forms.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/tabs.js') }}"></script>
        @stack('scripts')
    </body>
</html>
