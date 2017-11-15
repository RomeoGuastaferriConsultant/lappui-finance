<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>L'Appui-Finance - @yield('titre')</title>

        <link rel="stylesheet" type="text/css" href="css/lappui.css"/>
        <link rel="icon" type="image/png" href="img/favicon/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="img/favicon/favicon-16x16.png" sizes="16x16">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        @include('layouts.banniere')

        <div class="content">
            @yield('contenu')
        </div>
    </body>
</html>
<script type="text/javascript">
<?php include 'js/jquery-3.2.1.js'?>
<?php include 'js/footer.js'?>
</script>