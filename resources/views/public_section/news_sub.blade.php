<!-- PERMET AU GRAND PUBLIC DE RECEVOIR UNE ALERTE PAR MAIL LORS D'UN NOUVEL ÉVÉNEMENT -->
@extends('layouts.page_template')

@section('head')
<title>Recevez nos alertes</title>
@endsection

@section('content')
<div class="container">
    <div class="row" style="margin-top:45px;">
        <div class="col-md-6 col-md-offset-4">
            <h4>Recevoir nos alertes</h4>
            <br>
            <form action="{{ route('news_sub.add') }}" method="post">
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
                    <label for="email">Entrez votre email</label>
                    <input type="email" class="form-control" name="email" placeholder="Entrez votre email pour recevoir nos alertes" value="{{ old('email') }}">
                    <span class="text-danger">@error('email') {{ $message }} @enderror </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">S'inscrire à la Newsletter</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection