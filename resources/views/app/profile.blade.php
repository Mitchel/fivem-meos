@extends('layouts.app')
@section('pagename', 'Mijn profiel')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-5">
            <div class="app-card">
                <div class="app-card-header profile-info">
                    <img src="{{ $user->picture }}" alt="{{ $user->fullname }}">
                    <p class="title">{{ $user->fullname }}</p>
                    <p class="description">BSN: <strong>{{ $user->citizen_number }}</strong></p>
                    <p class="description">Geboortedatum: <strong>{{ $user->birthday }}</strong></p>
                    <p class="description">Geslacht: <strong>{{ $user->gender }}</strong></p>
                </div>
                <div class="app-card-body profile-info border-bottom">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Gebruikersnaam</strong>{{ $user->username }}</div>
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>DNA</strong>{{ $user->dna_code }}</div>
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Vingerprint</strong>{{ $user->fingerprint }}</div>
                    </div>
                </div>
                <div class="app-card-body profile-info border-bottom">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Nationaliteit</strong>{{ $user->nationality }}</div>
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Telefoonnummer</strong>{{ $user->phone_number }}</div>
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Laatst opgezocht</strong>{{ $user->last_search }}</div>
                    </div>
                </div>
            </div>
            <div class="app-card">
                <div class="app-card-header">
                    <p class="title">Wachtwoord veranderen</p>
                </div>
                <div class="app-card-body">
                    <span style="color: red;">Deze functie word in een later stadium ingebouwd.</span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-7">
            <div class="app-card">
                <div class="app-card-header">
                    <p class="title">Werk informatie</p>
                </div>
                <div class="app-card-body profile-info border-bottom">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 mb-sm-3"><strong>Functie</strong>{{ $user->function }}</div>
                        <div class="col-sm-12 col-md-3 mb-sm-3"><strong>Roepnummer</strong>{{ $user->call_sign }}</div>
                        <div class="col-sm-12 col-md-3 mb-sm-3"><strong>Recherche</strong>@if($user->detective == 1) Ja @else Nee @endif</div>
                        <div class="col-sm-12 col-md-3 mb-sm-3"><strong>Recherche leiding</strong>@if($user->detective_supervisor == 1) Ja @else Nee @endif</div>
                    </div>
                </div>
                <div class="app-card-body profile-info border-bottom">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Vuurwapen SN</strong>{{ $user->weapon }}</div>
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Taser SN</strong>{{ $user->taser }}</div>
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Laatste MEOS-inlog</strong>{{ $user->last_login }}</div>
                    </div>
                </div>
            </div>

            <div class="app-card">
                <div class="app-card-header">
                    <p class="title">Rapporten</p>
                    <p class="description">Aantal: <strong>{{ $reportstotal }}</strong> rapporten.</p>
                </div>
                @forelse($showreports as $data)
                    <a href="{{ route('reports.overview') }}/{{ $data->report_number }}" class="app-card-body border-bottom reports">
                        <div class="right-view">
                            <div class="item"><strong>Boete</strong>&euro; {{ $data->penalty }}</div>
                            <div class="item"><strong>Celstraf</strong>{{ $data->cell }} mnd</div>
                        </div>
                        <p class="title"><span class="reportnumber">#{{ $data->report_number }}</span> {{ $data->title }}</p>
                        <p class="by">Gekoppeld BSN: <strong>{{ $data->citizen_number }}</strong></p>
                    </a>
                @empty
                    <div class="app-card-body">Momenteel heb je nog geen rapporten geschreven, hup hup, kom van je luie reet af!</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
