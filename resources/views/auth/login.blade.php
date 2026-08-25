@extends('layouts.app')

@section('title', 'Inloggen')

@section('content')
<div class="auth-box">
    <h1>Inloggen</h1>

    @if($errors->any())
        <div class="alert alert-error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">E-mailadres</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="password">Wachtwoord</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group form-check">
            <label><input type="checkbox" name="remember"> Onthoud mij</label>
        </div>
        <button type="submit" class="btn btn-primary">Inloggen</button>
    </form>

    <p class="auth-link">Nog geen account? <a href="{{ route('register') }}">Registreren</a></p>
</div>
@endsection
