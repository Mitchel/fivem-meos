@extends('layouts.app')
@section('pagename', 'Reports Overview')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="app-card">
                <div class="app-card-header">
                    <p class="title">Rapporten zoeken op naam</p>
                </div>
                <div class="app-card-body">
                    <span style="color: red;">Deze functie word in een later stadium ingebouwd.</span>
                </div>
            </div>

            <div class="app-card">
                <div class="app-card-body">
                    top x criminelen met meeste pv's?
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
            <div class="app-card">
                <div class="app-card-header">
                    <a href="{{ route('reports.create') }}" class="btn btn-success btn-sm"><i class="far fa-plus fa-fw"></i> Nieuw rapport</a>
                    <p class="title">Rapporten</p>
                    <p class="description">Laatste 10 opgezochte rapporten</p>
                </div>
                @forelse($reports as $data)
                    <a href="{{ route('reports.overview') }}/{{ $data->report_number }}" class="app-card-body border-bottom reports">
                        <div class="right-view">
                            <div class="item"><strong>Boete</strong>&euro; {{ $data->penalty }}</div>
                            <div class="item"><strong>Celstraf</strong>{{ $data->cell }} mnd</div>
                        </div>
                        <p class="title"><span class="reportnumber">#{{ $data->report_number }}</span> {{ $data->title }}</p>
                        <p class="by">Gekoppeld BSN: <strong>{{ $data->citizen_number }}</strong> | Door: <strong>{{ $data->created_by }}</strong></p>
                    </a>
                @empty
                    <div class="app-card-body">Momenteel zijn er geen rapporten te vinden.</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
