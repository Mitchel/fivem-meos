@extends('layouts.app')
@section('pagename', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="app-card">
                <div class="app-card-header">
                    <a href="{{ route('reports.create') }}" class="btn btn-success btn-sm"><i class="far fa-plus fa-fw"></i> Nieuw rapport</a>
                    <p class="title">Rapporten</p>
                    <p class="description">Laatste 5 opgezochte rapporten</p>
                </div>
                <div class="app-card-body">
                    .app-card-body .reports
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="app-card">
                <div class="app-card-header">
                    <a href="{{ route('profiles.create') }}" class="btn btn-success btn-sm"><i class="far fa-plus fa-fw"></i> Nieuw profiel</a>
                    <p class="title">Profielen</p>
                    <p class="description">Laatste 5 opgezochte profielen</p>
                </div>
                <div class="app-card-body profiles">
                    <ul>
                        @forelse($recentProfiles as $profiles)
                            <li>
                                <img src="{{ $profiles->picture }}" alt="{{ $profiles->fullname }}">
                                <span class="fullname">{{ $profiles->fullname }}</span>
                                <span class="citizen_number">BSN: {{ $profiles->citizen_number }}</span>
                                <a href="{{ route('profiles.overview') }}/{{ $profiles->citizen_number }}" class="btn btn-primary btn-sm"><i class="far fa-eye fa-fw"></i> Bekijk</a>
                                <a href="{{ route('reports.create') }}" class="btn btn-success btn-sm"><i class="far fa-plus fa-fw"></i> Nieuw rapport</a>
                            </li>
                        @empty
                            <li>Momenteel zijn er geen profielen te vinden.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
