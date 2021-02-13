<!-- PERMET DE CRÉER UN COMPTE SUR LE SITE DE LA TIPS -->
@extends('layouts.page_template')

@section('head')
<title>Register</title>
@endsection

@section('content')
<div class="container">
    <div class="row" style="margin-top:45px;">
        <div class="col-md-4 col-md-offset-4">
            <h4>Register</h4>
            <br>
            <form action="{{ route('auth.create') }}" method="post">
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
                    <input type="text" class="form-control" name="name" placeholder="Entre votre nom prénom" value="{{ old('name') }}">
                    <span class="text-danger">@error('name') {{ $message }} @enderror </span>
                </div>
                <div class="form-group"> 
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Entrez votre email" value="{{ old('email') }}">
                    <span class="text-danger">@error('email') {{ $message }} @enderror </span>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe">
                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary">Créer mon compte</button>
                </div>
                <a href="login">J'ai déjà un compte</a>
            </form>
        </div>
    </div>
</div>
@endsection