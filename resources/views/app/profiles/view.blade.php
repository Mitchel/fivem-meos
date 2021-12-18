@extends('layouts.app')
@section('pagename', __('Profiel: :citizen_number', ['citizen_number' => $citizen_number]))

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-5">
            @forelse($showprofile as $data)
            <div class="app-card">
                <div class="app-card-header profile-info">
                    <img src="{{ $data->picture }}" alt="{{ $data->fullname }}">
                    <p class="title">{{ $data->fullname }}</p>
                    <p class="description">BSN: <strong>{{ $data->citizen_number }}</strong></p>
                    <p class="description">Geboortedatum: <strong>{{ $data->birthday }}</strong></p>
                    <p class="description">Geslacht: <strong>{{ $data->gender }}</strong></p>
                </div>
                <div class="app-card-body profile-info border-bottom">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Nationaliteit</strong>{{ $data->nationality }}</div>
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>DNA</strong>{{ $data->dna_code }}</div>
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Vingerprint</strong>{{ $data->fingerprint }}</div>
                    </div>
                </div>
                <div class="app-card-body profile-info border-bottom">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Telefoonnummer</strong>{{ $data->phone_number }}</div>
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Laatst opgezocht</strong>{{ $data->last_search }}</div>
                    </div>
                </div>
                <div class="app-card-body profile-info border-bottom">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Aantal rapporten</strong>{{ $reportstotal }} rapport(en)</div>
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Totaal boetes</strong>&euro; {{ $totalpenalty }}</div>
                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Totaal celstraf</strong>{{ $totalcell }} maand(en)</div>
                    </div>
                </div>
                <div class="app-card-body profile-info">
                    <strong>Notitie op naam van {{ $data->fullname }}</strong>
                    <p>{{ $data->comments }}</p>
                    @if ($data->comments == 0)Deze gebruiker heeft geen notities op zijn of haar naam staan.@endif
                </div>
            </div>
            @empty
                <div class="app-card"><div class="app-card-body">Het profiel dat je probeert te zoeken, bestaat niet of is verwijderd.</div></div>
            @endforelse
            <div class="app-card">
                <div class="app-card-header">
                    <a href="{{ route('reports.create') }}" class="btn btn-success btn-sm"><i class="far fa-plus fa-fw"></i> Nieuw voertuig</a>
                    <p class="title">Voertuigen</p>
                    <p class="description">Op naam van gebruiker</p>
                </div>
                @forelse($showvehicles as $data)
                    <div class="app-card-body profile-info border-bottom">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 mb-3"><strong>Merk</strong>{{ $data->brand }}</div>
                            <div class="col-sm-12 col-md-6 mb-3"><strong>Type</strong>{{ $data->type }}</div>
                            <div class="col-sm-12 col-md-6 mb-sm-3"><strong>Kenteken</strong>{{ $data->license_plate }}</div>
                            <div class="col-sm-12 col-md-6"><strong>Wok status</strong><span style="color: red;">!! KOMT NOG !!</span></div>
                        </div>
                    </div>
                @empty
                    <div class="app-card-body">Deze gebruiker heeft geen auto's die bekend zijn bij de Politie.</div>
                @endforelse
            </div>
            <div class="app-card">
                <div class="app-card-header">
                    <a href="{{ route('reports.create') }}" class="btn btn-success btn-sm"><i class="far fa-plus fa-fw"></i> Nieuw pand</a>
                    <p class="title">Panden</p>
                    <p class="description">Huis - Loods - Bedrijfspand - Overig</p>
                </div>
                @forelse($showproperties as $data)
                    <div class="app-card-body profile-info border-bottom">
                        <div class="row">
                            <div class="col-sm-12 col-md-8 mb-sm-3"><strong>Straatnaam</strong>{{ $data->street }}</div>
                            <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Postcode</strong>{{ $data->zipcode }}</div>
                        </div>
                    </div>
                @empty
                    <div class="app-card-body">Deze gebruiker heeft geen panden die bekend zijn bij de Politie.</div>
                @endforelse
            </div>
        </div>

        <div class="col-sm-12 col-md-7">
            @foreach($showwarrant as $data)
                <div class="app-card warrant">
                    <div class="app-card-header">
                        <p class="title">Arrestatiebevel: {{ $data->title }}</p>
                        <p class="description">Door: <strong>{{ $data->officer }}</strong></p>
                    </div>
                    <div class="app-card-body"><p>{{ $data->reason }}</p></div>
                </div>
            @endforeach
            <div class="app-card">
                <div class="app-card-header">
                    <a href="{{ route('reports.create') }}" class="btn btn-success btn-sm"><i class="far fa-plus fa-fw"></i> Nieuw rapport</a>
                    <p class="title">Rapporten</p>
                    <p class="description">Onderstaande rapporten staan op de naam van gebruiker.</p>
                </div>
                @forelse($showreport as $data)
                    <a href="{{ route('reports.overview') }}/{{ $data->report_number }}" class="app-card-body border-bottom reports">
                        <div class="right-view">
                            <div class="item"><strong>Boete</strong>&euro; {{ $data->penalty }}</div>
                            <div class="item"><strong>Celstraf</strong>{{ $data->cell }} mnd</div>
                        </div>
                        <p class="title"><span class="reportnumber">#{{ $data->report_number }}</span> {{ $data->title }}</p>
                        <p class="by">Door: <strong>{{ $data->created_by }}</strong></p>
                    </a>
                @empty
                    <div class="app-card-body">Deze gebruiker heeft een schoon strafblad, er zijn momenteel geen rapporten bekend.</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
