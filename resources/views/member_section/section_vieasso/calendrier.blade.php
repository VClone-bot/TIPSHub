<!-- CONTIENT LE PLANNING DE L'ASSO: SOIRÉES + CALENDRIER SPECTACLES + DATES REU OU ENTRAINEMENT ETC... -->
<!-- PRESENTATION EN LIGNES OU EN CALENDRIER ? VOIR CE QUI EST LE MIEUX/MOINS CASSE-TÊTE -->
@extends('layouts.page_template')

@section('head')
<title>Prochains Événements</title>
@endsection

@section('content')
<div class="container">
    <br>
    <div class="row">
        <div class="col" >                   
            <h2>Calendrier des événements</h2><br>
        </div>
    </div>
    <div class="event_listing">
        @foreach ($events as $e)
        <hr class="hr-primary" />
        <div class="row">
            <div class="col">
                <img src="{{ $e->visual_url }}" style="height:600px;">
            </div>
            <div class="col-md-3">
                {{ $e->name }} <br><br>
                Date: {{ date("d/m/Y", strtotime($e->date)) }} {{ date("H:i", strtotime($e->heure)) }} <br><br>
                Lieu: {{ $e->lieu }} <br><br>
                Type: {{ ucfirst($e->type) }} <br><br>
                <a href="{{ $e->facebook_link }}">Lien Facebook</a> <br><br>
                {{ $e->description }}
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection