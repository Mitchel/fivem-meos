@extends('layouts.app')
@section('pagename', __('Profiel: :citizen_number', ['citizen_number' => $citizen_number]))

@section('content')
    @if($user->supervisor == 1)
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="app-card">
                    @forelse($profile as $data)
                        <div class="app-card-header profile-info">
                            <img src="{{ $data->picture }}" alt="{{ $data->fullname }}">
                            <p class="title">{{ $data->fullname }}</p>
                            <p class="description">BSN: <strong>{{ $data->citizen_number }}</strong></p>
                            <p class="description">Geboortedatum: <strong>{{ $data->birthday }}</strong></p>
                            <p class="description">Geslacht: <strong>{{ $data->gender }}</strong></p>
                        </div>
                        <div class="app-card-body profile-info border-bottom">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Gebruikersnaam</strong>{{ $data->username }}</div>
                                <div class="col-sm-12 col-md-4 mb-sm-3"><strong>DNA</strong>{{ $data->dna_code }}</div>
                                <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Vingerprint</strong>{{ $data->fingerprint }}</div>
                            </div>
                        </div>
                        <div class="app-card-body profile-info border-bottom">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Nationaliteit</strong>{{ $data->nationality }}</div>
                                <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Telefoonnummer</strong>{{ $data->phone_number }}</div>
                                <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Laatst opgezocht</strong>{{ $data->last_search }}</div>
                            </div>
                        </div>
                        <div class="app-card-body profile-info">
                            <strong>Notitie op naam van {{ $data->fullname }}</strong>
                            <p>{{ $data->comments }}</p>
                            @if ($data->comments == 0)Deze gebruiker heeft geen notities op zijn of haar naam staan.@endif
                        </div>
                    @empty
                        <div class="app-card-body">Het profiel dat je probeert te zoeken, bestaat niet of is verwijderd.</div>
                    @endforelse
                </div>
            </div>

            <div class="col-sm-12 col-md-7">
                <div class="app-card">
                    <div class="app-card-header">
                        <p class="title">Werk informatie</p>
                    </div>
                    @forelse($profile as $user)
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
                    @empty
                        <div class="app-card-body">
                            Er is geen informatie om te tonen.
                        </div>
                    @endforelse
                </div>

                <div class="app-card">
                    <div class="app-card-header">
                        <p class="title">Rapporten op naam</p>
                        <p class="description">Aantal: x rapporten</p>
                    </div>
                    <div class="app-card-body">
                        <span style="color: red;">!! MOET NOG GEMAAKT WORDEN !!</span>
                    </div>
                </div>

            </div>
        </div>
    @else
        <div class="app-card">
            <div class="app-card-body text-center">
                Je hebt geen toegang tot deze pagina omdat je geen leidinggevende bent.
            </div>
        </div>
    @endif
@endsection
