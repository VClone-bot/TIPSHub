<!-- CONTIENT DIVERSES INFOS UTILES: DATES DES REUS, TRUCS EN COURS ETC... -->
<!-- PEUT-ÊTRE AJOUTER UNE SECTION POUR LES TÂCHES EN COURS DE CHACUN -->
@extends('layouts.page_template')

@section('head')
<title>Infos du bureau</title>
@endsection

@section('content')
<div class="container">
    <div class="col">
        <form action="{{ route('info.create') }}" method="post">
        @csrf
            <div class="form-group">
                <label for="texte" size="400">Ajouter un billet</label>
                <input type='text' class="form-control" name="texte" placeholder="Tapez votre texte (min 15 caractères, max 400 caractères)">
                <span class="text-danger">@error('texte') {{ $message }} @enderror </span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary" style="background-color:#1b1b1b;">Ajouter</button>
            </div>
        </form>
    </div>
    <div class="col">
        @foreach ($infos as $info)
        <div class="row">
            <div class="container p-3 my-3 border" style="display: block;">
                <div class="col">
                    <form action="{{ route('info.delete') }}" method="post">
                        @csrf
                            <input type="text" name="id" value="{{ $info->id }}" hidden>
                            <button type="submit" class="btn btn-primary" style="background-color:#1b1b1b;">Supprimer</button>
                    </form>
                </div>

                <div class='col' style="font-size:24px;overflow-wrap: break-word;">
                    De: {{ $info->poster }}, le {{ date('d/m/Y H:i', strtotime($info->created_at)) }} <br>
                    {{ $info->texte }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection