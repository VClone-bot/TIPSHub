<!-- PERMET D'AJOUTER UN ÉVÉNEMENENT -->
@extends('layouts.page_template')

@section('head')
<title>Ajouter un événément</title>
@endsection

@section('content')
<div class="container">
    <div class="row" style="margin-top:45px;">
        <div class="col-md-8 col-md-offset-8">
            <h4>Ajout d'événement</h4>
            <br>
            <form action="{{ route('event.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="results">
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
            </div>
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" name="name" placeholder="Entre le nom de l'événément, ne pas utiliser de /" value="{{ old('name') }}">
                    <span class="text-danger">@error('name') {{ $message }} @enderror </span>
                </div>
                <div class="form-group"> 
                    <label for="date">Date</label>
                    <input type="date" class="form-control" name="date" placeholder="Entrez la date de l'événement" value="{{ old('date') }}">
                    <span class="text-danger">@error('date') {{ $message }} @enderror </span>
                </div>
                <div class="form-group"> 
                    <label for="date">Date</label>
                    <input type="time" class="form-control" name="heure" placeholder="Entrez l'heure' de l'événement" value="{{ old('heure') }}">
                    <span class="text-danger">@error('heure') {{ $message }} @enderror </span>
                </div>
                <div class="form-group">
                    <label for="lieu">Lieu</label>
                    <input type="text" class="form-control" name="lieu" placeholder="Entrez le lieu de l'événement" value="{{ old('lieu') }}">
                    <span class="text-danger">@error('lieu'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <!-- <input type="text" class="form-control" name="type" placeholder="Entrez le type d'événement (match/cabaret etc..)" value="{{ old('type') }}"> -->
                    <select name="type">
                        <option value="match">Match</option>
                        <option value="cabaret">Cabaret</option>
                        <option value="événement extérieur">Événement Extérieur</option>
                        <option value="tournoi">Tournoi
                        <option value="soirée">Soirée</option>
                        <option value="wei_wed">WEI/WED</option>
                        <option value="sortie">Sortie</option>
                        <option value="stage">Stage</option>
                    </select>
                    <span class="text-danger">@error('type'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="facebook_link">Lien Facebook</label>
                    <input type="text" class="form-control" name="facebook_link" placeholder="Copier/coller le lien de l'événement Facebook" value="{{ old('facebook_link') }}">
                    <span class="text-danger">@error('facebook_link'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" placeholder="Description de l'événement" cols="80" rows="8" value="{{ old('description') }}"></textarea>
                    <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="visual">Affiche de l'événement</label>
                    <input type="file" class="form-control" name="visual" placeholder="Description de l'événement" value="{{ old('visual') }}">
                    <span class="text-danger">@error('visual'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">Créer l'événement</button>
                </div>
                <a href="manage_events">Retour à la gestion des événements</a>
            </form>
        </div>
    </div>
</div>
@endsection