@extends('layouts.app')
@section('pagename', 'Dashboard')

@section('content')
    <div class="row">
        @if($user->admin == '1')
            <div class="col-sm-12 col-md-3">
                <div class="app-card stats">
                    <div class="app-card-body text-center"><i class="far fa-file-alt fa-fw"></i><p><strong>{{ $statsReports }}</strong> Rapporten</p></div>
                </div>
            </div>

            <div class="col-sm-12 col-md-3">
                <div class="app-card stats">
                    <div class="app-card-body text-center"><i class="far fa-users fa-fw"></i><p><strong>{{ $statsProfiles }}</strong> Profielen</p></div>
                </div>
            </div>

            <div class="col-sm-12 col-md-3">
                <div class="app-card stats">
                    <div class="app-card-body text-center"><i class="far fa-siren-on fa-fw"></i><p><strong>{{ $statsLaws }}</strong> Straffen</p></div>
                </div>
            </div>

            <div class="col-sm-12 col-md-3">
                <div class="app-card stats">
                    <div class="app-card-body text-center"><i class="far fa-users-crown fa-fw"></i><p><strong>{{ $statsUsers }}</strong> Agenten</p></div>
                </div>
            </div>
        @endif

        <div class="col-sm-12 col-md-6">
            <div class="app-card">
                <div class="app-card-header">
                    <a href="{{ route('reports.create') }}" class="btn btn-success btn-sm"><i class="far fa-plus fa-fw"></i> Nieuw rapport</a>
                    <p class="title">Rapporten</p>
                    <p class="description">Laatste 5 opgezochte rapporten</p>
                </div>
                @forelse($recentReports as $data)
                    <a href="{{ route('reports.overview') }}/{{ $data->report_number }}" class="app-card-body border-bottom reports">
                        <p class="title"><span class="reportnumber">#{{ $data->report_number }}</span> {{ $data->title }}</p>
                        <p class="by">Gekoppeld BSN: <strong>{{ $data->citizen_number }}</strong> | Door: <strong>{{ $data->created_by }}</strong></p>
                    </a>
                @empty
                    <div class="app-card-body">Momenteel zijn er geen rapporten te vinden.</div>
                @endforelse
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="app-card">
                <div class="app-card-header">
                    <a href="{{ route('profiles.overview') }}" class="btn btn-success btn-sm"><i class="far fa-plus fa-fw"></i> Nieuw profiel</a>
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
                                @if($user->admin == '1')
                                    <a href="{{ route('profiles.delete', $profiles->citizen_number) }}" class="btn btn-danger btn-sm"><i class="far fa-trash-alt fa-fw" style="margin: 0;"></i></a>
                                @endif
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
