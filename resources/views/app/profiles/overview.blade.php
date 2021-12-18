@extends('layouts.app')
@section('pagename', 'Profile Overview')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-7">
            <div class="app-card">
                <div class="app-card-header">
                    <p class="title">Profielen</p>
                    <p class="description">Laatste 10 opgezochte profielen</p>
                </div>
                <div class="app-card-body profiles">
                    <ul>
                        @forelse($profiles as $profiles)
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

        <div class="col-sm-12 col-md-5">
            <div class="app-card">
                <div class="app-card-header">
                    <p class="title">Profiel aanmaken</p>
                    <p class="description">Vul het formulier volledig in.</p>
                </div>
                @if ($errors->any())
                    <div class="auth-card-body error">
                        @foreach($errors->all() as $error)
                            <p>Iets ging niet helemaal goed...</p>
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('profiles.overview') }}" method="POST" autocomplete="off">
                    <div class="app-card-body">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" value="{{ old('fullname') }}" placeholder="Volledige naam" required autocomplete="off">
                                <label for="fullname">Volledige naam</label>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('citizen_number') is-invalid @enderror" id="citizen_number" name="citizen_number" value="{{ old('citizen_number') }}" placeholder="BSN nummer" required>
                                <label for="citizen_number">BSN nummer</label>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('picture') is-invalid @enderror" id="picture" name="picture" value="{{ old('picture') }}" placeholder="Foto">
                                <label for="picture">Profielfoto (bijv. Imgur URL)</label>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="birthday" name="birthday" value="{{ old('birthday') }}" placeholder="Geboortedatum" required autocomplete="off">
                                <label for="birthday">Geboortedatum</label>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" aria-label="Geslacht" required>
                                    <option disabled selected>Maak een keuze</option>
                                    <option value="man">Man</option>
                                    <option value="vrouw">Vrouw</option>
                                </select>
                                <label for="gender">Geslacht</label>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('nationality') is-invalid @enderror" id="nationality" name="nationality" value="{{ old('nationality') }}" placeholder="Nationaliteit" required autocomplete="off">
                                <label for="nationality">Nationaliteit</label>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" placeholder="Telefoonnummer" required autocomplete="off">
                                <label for="phone_number">Telefoonnummer</label>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('fingerprint') is-invalid @enderror" id="fingerprint" name="fingerprint" value="{{ old('fingerprint') }}" placeholder="Vingerafdruk" required autocomplete="off">
                                <label for="fingerprint">Vingerpatroon</label>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('dna_code') is-invalid @enderror" id="dna_code" name="dna_code" value="{{ old('dna_code') }}" placeholder="DNA" required autocomplete="off">
                                <label for="dna_code">DNA</label>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="app-card-footer">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Profiel aanmaken</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
