<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    {{-- Inseriamo  css --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <!-- Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}

    <!-- Styles -->
    <style>
        /* tolgo lo stile e lo inserisco all'interno della cartella sass/app.scss */

    </style>
</head>

<body>

    {{-- inseriamo il js  quello creato per il front --}}
    <script src="{{ asset('js/front.js') }}"></script>
</body>

</html>
