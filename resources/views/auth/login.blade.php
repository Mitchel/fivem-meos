@extends('layouts.auth')
@section('pagename', 'Login')

@section('content')
    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="auth-card">
            <div class="auth-card-header">
                <p>Quality MEOS</p>
                <p>Gebruik het onderstaande formulier om in te loggen in het MEOS van QualityRP met jouw persoonlijke gegevens.</p>
            </div>
{{--            <div class="auth-card-body error">--}}
{{--                <p>Iets ging niet helemaal goed...</p>--}}
{{--                <p>Hier de error melding.</p>--}}
{{--            </div>--}}
            <div class="auth-card-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control " id="username" name="username" value="" placeholder="Gebruikersnaam" autocomplete="off" required="">
                    <label for="username">Gebruikersnaam</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control " id="password" name="password" value="" placeholder="Wachtwoord" autocomplete="off" required="">
                    <label for="password">Wachtwoord</label>
                </div>
            </div>
            <div class="auth-card-footer">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Inloggen</button>
                </div>
            </div>
        </div>
    </div>
@endsection
