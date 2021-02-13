<!-- PERMET DE SE LOGGER AVEC SON MAIL + MOT DE PASSE ET ACCÉDER À L'ESPACE MEMBRE/BUREAU -->
@extends('layouts.page_template')

@section('head')
<title>Login</title>
@endsection

@section('content')
<div class="container">
    <div class="row" style="margin-top:45px;">
        <div class="col-md-4 col-md-offset-4">
            <h4>Connexion</h4>
            <br>
            <form action="{{ route('auth.check') }}" method='post'>
            @csrf
            <div class="results">
                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
            </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Entrez votre email" value="{{ old('email') }}">
                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe">
                    <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">Connexion</button>
                </div>
                <a href="register">Créer un compte</a>
            </form>
        </div>
    </div>
</div>
@endsection