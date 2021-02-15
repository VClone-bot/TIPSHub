<!-- PERMET D'AFFICHER ET GÉRER LES ÉVÉNEMENTS -->
@extends('layouts.page_template')

@section('head')
<title>Gérer les événements</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-offset-0">
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
        </div>
    </div>
    <div class="container-fluid">
        <br>                  
        <h4>Gestion des événements</h4><br>
        <div class="event_listing">
            @foreach ($events as $e)
            <hr class="hr-primary" />
            <div class="row">
                <div class="col-md-2">
                    @if(Session::get('IS_ADMIN'))
                        <form action="{{ route('event.del') }}" method="post">
                        @csrf
                            <input type='text' name="id_event" value="{{ $e->id }}" hidden>
                            <button type="submit" class="btn btn-primary btn-lg" style="background-color:#1b1b1b;">Supprimer l'événement</button>
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
                <div class="col-md-2">
                    <img src="{{ $e->visual_url }}" style="height:400px;width:300px;">
                </div>
                <div class="col-md-6">
                    Nom: {{ $e->name }} <br><br>
                    Date: {{ date("d/m/Y", strtotime($e->date)) }} {{ date("H:i", strtotime($e->heure)) }} <br>
                    Lieu: {{ $e->lieu }} <br>
                    Type: {{ $e->type }} <br>
                    <a href="{{ $e->facebook_link }}">Lien Facebook</a> <br><br>
                    Description: {{ $e->description }} <br><br>
                    @if(!$e->published)
                        Événement non publié
                    @endif
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