<!-- PERMET D'AJOUTER UN ÉVÉNEMENENT -->
@extends('layouts.page_template')

@section('head')
<title>Ajouter un cours</title>
@endsection

@section('content')
<div class="container">
    <div class="row" style="margin-top:45px;">
        <div class="col-md-6 col-md-offset-4">
            <h4>Ajouter un cours</h4>
            <br>
            <form action="{{ route('cours.create') }}" method="post">
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
                    <label for="nom_du_cours">Nom du cours</label>
                    <input type="text" class="form-control" name="nom_du_cours" list="nom_cours">
                    <datalist id="nom_cours">
                        @foreach($nom_cours as $n)
                            <option>{{ $n->nom_du_cours }}</option>
                        @endforeach
                    </datalist>
                    <span class="text-danger">@error('nom_du_cours') {{ $message }} @enderror </span>
                </div>
                <div class="form-group"> 
                    <label for="date">Date</label>
                    <input type="date" class="form-control" name="date" placeholder="Entrez la date du cours" value="{{ old('date') }}">
                    <span class="text-danger">@error('date') {{ $message }} @enderror </span>
                </div>
                <div class="form-group"> 
                    <label for="heure">Heure</label>
                    <input type="time" class="form-control" name="heure" placeholder="Entrez l'heure du cours" value="{{ old('heure') }}">
                    <span class="text-danger">@error('heure') {{ $message }} @enderror </span>
                </div>
                <div class="form-group">
                    <label for="presentiel">Cocher si cours en présentiel</label>
                    <input type="checkbox" name="presentiel" value="1" style="transform: scale(1.7); margin-left: 10px;">
                    <span class="text-danger">@error('presentiel'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="lieu">Lieu (laisser blanc si distanciel)</label>
                    <input type="text" class="form-control" name="lieu" placeholder="Lieu où le cours aura lieu" value="{{ old('lieu') }}">
                    <span class="text-danger">@error('lieu'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="lien_visio">Lien visio (laisser blanc si présentiel)</label>
                    <input type="text" class="form-control" name="lien_visio" placeholder="Copier/coller le lien de la visioconférence" value="{{ old('lien_visio') }}">
                    <span class="text-danger">@error('lien_visio'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="mot_de_passe_visio">Mot de passe du lien de visio (laisser blanc si présentiel)</label>
                    <input type="text" class="form-control" name="mot_de_passe_visio" placeholder="Mot de passe pour entrer dans la salle de visio" value="{{ old('mot_de_passe_visio') }}">
                    <span class="text-danger">@error('mot_de_passe_visio'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">Ajouter le cours</button>
                </div>
                <a href="cours">Retour au calendrier des cours</a>
            </form>
        </div>
    </div>
</div>
@endsection