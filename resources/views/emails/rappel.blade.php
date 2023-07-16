@component('mail::message')
# Rappel d'événement

Bonjour,

Votre événement '**{{ $event->libelle }}**' est prévu pour le **{{ $event->date_event }}**.

Rappel : Cet événement aura lieu dans 3 jours.

@component('mail::button', ['url' => url("breukh-api/events/{$event->id}")])
Voir les détails de l'événement
@endcomponent


Merci,<br>
{{ config('app.name') }}
@endcomponent




    @section('content')
        <h1>Détails de l'événement</h1>

        <p>Nom de l'événement : {{ $event->name }}</p>
        <p>Date de l'événement : {{ $event->date }}</p>
        <p>Description de l'événement : {{ $event->description }}</p>


    @endsection
