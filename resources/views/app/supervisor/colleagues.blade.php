@extends('layouts.app')
@section('pagename', 'Medewerkers')

@section('content')
    @if($user->supervisor == 1)
        <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="app-card">
                <div class="app-card-header">
                    <p class="title">Medewerkersprofiel aanmaken</p>
                </div>
                <form>
                    <div class="app-card-body">
                        <span style="color: red;">Formulier aanmaken.</span>
                    </div>
                    <div class="app-card-footer">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Medewerkersprofiel aanmaken</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-8">
            <div class="row">
                @forelse($colleagues as $data)
                    <div class="col-sm-12 col-md-6">
                        <div class="app-card">
                            <div class="app-card-header no-border">
                                <a href="{{ route('supervisor.colleagues') }}/{{ $data->citizen_number }}" class="btn btn-primary btn-sm"><i class="far fa-eye fa-fw"></i></a>
                                <a href="{{ route('reports.create') }}" class="btn btn-success btn-sm"><i class="far fa-pencil fa-fw"></i></a>
                                <img class="pic-small" src="{{ $data->picture }}" alt="{{ $data->fullname }}">
                                <p class="title">{{ $data->fullname }}</p>
                                <p class="description">{{ $data->function }} ({{ $data->call_sign }})</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-sm-12 col-md-12"><div class="app-card"><div class="app-card-body">Momenteel zijn er geen medewerkers bij de Politie.</div></div></div>
                @endforelse
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
