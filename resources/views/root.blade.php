<!DOCTYPE html>
<html class="bg-white dark:bg-gray-900 antialiased" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @spladeHead
        @vite('resources/js/app.js')
    </head>
    <body class="">
        @splade
    </body>
</html>
