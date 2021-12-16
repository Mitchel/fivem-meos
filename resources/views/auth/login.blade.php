@extends('layouts.auth')
@section('pagename', 'Login')

@section('content')
    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <form class="auth-card" action="{{ route('auth.login') }}" method="POST">
            <div class="auth-card-header">
                <p>Quality MEOS</p>
                <p>Gebruik het onderstaande formulier om in te loggen in het MEOS van QualityRP met jouw persoonlijke gegevens.</p>
            </div>
            @if ($errors->any())
                <div class="auth-card-body error">
                    @foreach($errors->all() as $error)
                        <p>Iets ging niet helemaal goed...</p>
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="auth-card-body">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" placeholder="Gebruikersnaam" required>
                    <label for="username">Gebruikersnaam</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control @error('username') is-invalid @enderror" id="password" name="password" placeholder="Wachtwoord" required>
                    <label for="password">Wachtwoord</label>
                </div>
            </div>
            <div class="auth-card-footer">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Inloggen</button>
                </div>
            </div>
        </form>
    </div>
@endsection
