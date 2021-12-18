@extends('layouts.app')
@section('pagename', 'Laws')

@section('content')
    @if($user->supervisor == 1)
        <div class="row">
            @if ($errors->any())
                <div class="col-sm-12 col-md-12">
                    <div class="app-card">
                        <div class="app-card-body error">
                            <p>Iets ging niet goed, de korpsleiding is iets minder trots op je!</p>
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            @if(session()->has('success'))
                <div class="col-sm-12 col-md-12">
                    <div class="app-card">
                        <div class="app-card-body success">
                            <p>Goed gedaan, de korpsleiding is trots op je!</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-sm-12 col-md-4">
                <div class="app-card">
                    <div class="app-card-header">
                        <p class="title">Informatie over straf toevoegen</p>
                    </div>
                    <div class="app-card-body law-info">
                        Via deze pagina kan je als leidinggevende straffen toevoegen, aanpassen en verwerken. Uiteraard dient een straf aan bepaalde eisen te voldoen:
                        <ul>
                            <li>Celstraf dient uitgeschreven te worden in minuten.</li>
                            <li>Boetebedrag dient uitgeschreven te worden zonder komma.</li>
                            <li>Omschrijving dient duidelijk ingevuld te worden.</li>
                        </ul>
                        Al jou ingevulde data kan geraadpleegd worden door een verbalisant tijdens het maken van een rapport.
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="app-card">
                    <div class="app-card-header">
                        <p class="title">Straf toevoegen</p>
                    </div>
                    <form method="POST" action="{{ route('supervisor.laws') }}">
                        <div class="app-card-body">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Titel" required autocomplete="off">
                                        <label for="name">Naam van de straf</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('fine') is-invalid @enderror" id="fine" name="fine" value="{{ old('fine') }}" placeholder="Boetebedrag" required autocomplete="off">
                                        <label for="fine">Boete in &euro;</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('months') is-invalid @enderror" id="months" name="months" value="{{ old('months') }}" placeholder="Maanden" required autocomplete="off">
                                        <label for="months">Celstraf</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-floating">
                                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Omschrijving" id="description" name="description" style="height: 75px" required></textarea>
                                        <label for="description">Omschrijving</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="app-card-footer">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Straf aanmaken</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-sm-12 col-md-12">
                <div class="row">
                    @forelse($showlaws as $data)
                        <div class="col-sm-12 col-md-4">
                            <div class="app-card">
                                <div class="app-card-header">
                                    <p class="title">{{ $data->name }}</p>
                                </div>
                                <div class="app-card-body profile-info">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-4 mb-sm-3"><strong>Boetebedrag</strong>&euro; {{ $data->fine }}</div>
                                        <div class="col-sm-12 col-md-5 mb-sm-3"><strong>Celstraf</strong>{{ $data->months }} maand(en)</div>
                                        <div class="col-sm-12 col-md-3 mb-sm-3">
                                            <a href="{{ route('supervisor.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="far fa-pencil fa-fw"></i></a>
                                            <a href="{{ route('supervisor.delete', $data->id) }}" class="btn btn-danger btn-sm"><i class="far fa-trash fa-fw"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col">
                            <div class="app-card"><div class="app-card-body text-center">Momenteel zijn er nog geen straffen toegevoegd.</div></div>
                        </div>
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
