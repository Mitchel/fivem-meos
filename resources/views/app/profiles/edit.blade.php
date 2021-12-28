@extends('layouts.app')
@section('pagename', __('Profiel aanpassen: :citizen_number', ['citizen_number' => $citizen_number]))

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-9">
            <div class="app-card">
                <div class="app-card-header">
                    <p class="title">{{ $profile->fullname }}</p>
                    <p class="description">Profiel aanpassen</p>
                </div>
                <form method="POST" action="{{ route('profiles.edit', ['citizen_number' => $profile->citizen_number]) }}">
                    @csrf
                    <div class="app-card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $profile->fullname }}" placeholder="fullname" required autocomplete="off">
                                    <label for="fullname">Volledige naam</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $profile->birthday }}" placeholder="birthday" required autocomplete="off">
                                    <label for="birthday">Geboortedatum</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="citizen_number" name="citizen_number" value="{{ $profile->citizen_number }}" placeholder="citizen_number" required autocomplete="off">
                                    <label for="citizen_number">Burgerservicenummer</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nationality" name="nationality" value="{{ $profile->nationality }}" placeholder="nationality" required autocomplete="off">
                                    <label for="nationality">Nationaliteit</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="picture" name="picture" value="{{ $profile->picture }}" placeholder="picture" required autocomplete="off">
                                    <label for="picture">Profielfoto</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="dna_code" name="dna_code" value="{{ $profile->dna_code }}" placeholder="dna_code" required autocomplete="off">
                                    <label for="dna_code">DNA</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="fingerprint" name="fingerprint" value="{{ $profile->fingerprint }}" placeholder="fingerprint" required autocomplete="off">
                                    <label for="picture">Vingerprint</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $profile->phone_number }}" placeholder="phone_number" required autocomplete="off">
                                    <label for="phone_number">Telefoonnummer</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="app-card-footer">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Profiel aanpassen</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-3">
            <div class="app-card">
                <div class="app-card-header">
                    <p class="title">Informatie</p>
                    <p class="description">Profiel aanpassen</p>
                </div>

                <div class="app-card-body">
                    <span style="color: red; font-weight: 500;">LET OP!</span> Als je het profiel van een burger aanpast, dan blijven je veranderingen ook definitief. Deze veranderingen zijn niet terug te draaien.
                    Denk dus goed na wat je aanpast en of het ook echt nodig is om dit aan te passen.
                </div>
            </div>
        </div>
    </div>
@endsection
