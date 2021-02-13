<!-- CONTIENT LE PLANNING DE L'ASSO: SOIRÉES + CALENDRIER SPECTACLES + DATES REU OU ENTRAINEMENT ETC... -->
<!-- PRESENTATION EN LIGNES OU EN CALENDRIER ? VOIR CE QUI EST LE MIEUX/MOINS CASSE-TÊTE -->
@extends('layouts.page_template')

@section('head')
<title>Prochains Événements</title>
@endsection

@section('content')
<div class="row">
    <div class="col-4 mx-auto w-70" >
        <div class="container">
            <div class="row" style="margin-top:45px;">                    
                <h4>Calendrier des événements</h4><br>
            </div>
            <div class="event_listing">
                @foreach ($events as $e)
                <hr class="hr-primary" />
                <div class="row">
                    <div class="col">
                        <img src="{{ $e->visual_url }}" style="height:600px;">
                    </div>
                    <div class="col">
                        Nom: {{ $e->name }} <br>
                        Date: {{ $e->date }} {{ $e->heure }} <br>
                        Lieu: {{ $e->lieu }} <br>
                        Type: {{ $e->type }} <br>
                        <a href="{{ $e->facebook_link }}">Lien Facebook</a> <br>
                        Description: {{ $e->description }} <br>
                    </div>
                </div>
                @endforeach
            </form>
            </div>
            </div>
        </div>  
    </div>
</div>
@endsection