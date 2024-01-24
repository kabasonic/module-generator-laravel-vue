{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <title>ًApplication</title>--}}
{{--    @vite('resources/css/app.css')--}}
{{--</head>--}}
{{--<body>--}}
{{--<div id="app"></div>--}}
{{--@vite('resources/js/app.js')--}}
{{--</body>--}}
{{--</html>--}}

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AppVerk - zadanie rekrutacyjne FullStack Developer 2024</title>
    @vite('resources/css/reset.css')
    @vite('resources/css/app.css')
</head>
<body class="body">
<nav class="nav">
    <img src="/public/logo.svg" alt="logo" />
    <button class="button">GENERATE FILES</button>
</nav>
<main id="app" class="main">
    @vite('resources/js/app.js')
</main>
</body>
</html>
