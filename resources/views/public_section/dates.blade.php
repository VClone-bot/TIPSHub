<!-- CONTIENT LES DATES/LIEU/HEURES DES SPECTACLES AINSI QUE LA FORMULE PROPOSÉE ET UN DESCRIPTIF DE CETTE FORMULE -->
<!-- A LINKER AVEC LES ÉVÉNEMENTS FACEBOOK -->
@extends('layouts.page_template')

@section('head')
<title>Nos dates et spectacles</title>
@endsection

@section('content')
<div class="container">
    <br>
    <div class="row">
        <div class="col" >                  
            <h2>Nos prochaines dates</h2><br>
        </div>
    </div>
    <div class="event_listing">
        @php $i = 0 @endphp
        @foreach ($events as $e)
        <hr class="hr-primary" />
        <div class="row">
            <div class="col">
                <img src="{{ $e->visual_url }}" style="height:600px;">
            </div>
            <div class="col-md-6">
                {{ $e->name }} <br><br>
                Date: {{ date("d/m/Y", strtotime($e->date)) }} {{ date("H:i", strtotime($e->heure)) }} <br><br>
                Lieu: {{ $e->lieu }} <br><br>
                <a href="{{ $e->facebook_link }}">Lien Facebook</a> <br><br>
                {{ $e->description }}
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection