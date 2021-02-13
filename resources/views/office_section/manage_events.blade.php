<!-- PERMET D'AFFICHER ET GÉRER LES ÉVÉNEMENTS -->
@extends('layouts.page_template')

@section('head')
<title>Gérer les événements</title>
@endsection

@section('content')
<div class="row">
    <div class="col-2">
        @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif
        <a href="add_event"><button type="button" class="btn btn-primary btn-lg" style="background-color:#1b1b1b;">Créer un événement</button></a><br>
    </div>
    <div class="col-4">
        <div class="container">
            <div class="row" style="margin-top:45px;">                    
                <h4>Gestion des événements</h4><br>
            </div>
            <div class="event_listing">
                @foreach ($events as $e)
                <hr class="hr-primary" />
                <div class="row">
                    <div class="col">
                        @if(Session::get('IS_ADMIN'))
                            <form action="{{ route('event.del') }}" method="post">
                            @csrf
                                <input type='text' name="id_event" value="{{ $e->id }}" hidden>
                                <button type="button" class="btn btn-primary btn-lg" style="background-color:#1b1b1b;">Supprimer l'événement</button>
                            </form>
                        @endif
                        <form action="{{ route('event.modpage') }}" method="post">
                        @csrf
                            <input type='text' name="id_event" value="{{ $e->id }}" hidden>
                            <button type="submit" class="btn btn-primary btn-lg" style="background-color:#1b1b1b;">Modifier l'événement</button>
                        </form>
                        <form action="{{ route('event.arc') }}" method="post">
                        @csrf
                            <input type='text' name="id_event" value="{{ $e->id }}" hidden>
                            <button type="submit" class="btn btn-primary btn-lg" style="background-color:#1b1b1b;">Archiver l'événement</button>
                        </form>
                        @if(!$e->published)
                            <form action="{{ route('event.publish') }}" method="post" onsubmit="return confirm('Publier enverra un mail à toutes les personnes inscrites à la Newsletter sans retour en arrière possible, êtes-vous sûr de vouloir publier cet événement ?');">
                            @csrf
                                <input type="text" name="id_event" value="{{ $e->id }}" hidden>
                                <button type="submit" class="btn btn-primary btn-lg" style="background-color:#1b1b1b;">Publier l'événement</button>
                            </form>
                        @endif
                    </div>
                    <div class="col">
                        Nom: {{ $e->name }} <br>
                        Date: {{ $e->date }} {{ $e->heure }} <br>
                        Lieu: {{ $e->lieu }} <br>
                        Type: {{ $e->type }} <br>
                        <a href="{{ $e->facebook_link }}">Lien Facebook</a> <br>
                        Description: {{ $e->description }} <br>
                        @if(!$e->published)
                            Événement non publié
                        @endif
                    </div>
                    <div class="col">
                        <img src="{{ $e->visual_url }}" style="height:400px;width:300px;">
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