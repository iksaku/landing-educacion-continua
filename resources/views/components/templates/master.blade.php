<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        {{-- Fonts --}}
        <link rel="preconnect" href="https://rsms.me">
        <link rel="dns-prefetch" href="https://rsms.me">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        {{-- Styles --}}
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @stack('styles')
    </head>

    <body class="min-h-screen">
        {{ $slot }}

        {{-- Scripts --}}
        @stack('scripts')
    </body>
</html>
