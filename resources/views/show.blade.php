<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @section('content')
        <h1>Détails de l'événement</h1>

        <p>Nom de l'événement : {{ $event->name }}</p>
        <p>Date de l'événement : {{ $event->date }}</p>
        <p>Description de l'événement : {{ $event->description }}</p>


    @endsection
    </body>
</html>
