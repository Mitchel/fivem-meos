@extends('layouts.app')
@section('pagename', __('Straf: :id', ['id' => $id]))

@section('content')
    @if($user->supervisor == 1)
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="app-card">
                    <div class="app-card-header">
                        <p class="title">Straf toevoegen</p>
                    </div>
                    <form method="POST" action="{{ route('supervisor.edit', ['id' => $laws->id]) }}">
                        <div class="app-card-body">
                            @csrf

                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $laws->name }}" placeholder="Titel" required autocomplete="off">
                                        <label for="name">Naam van de straf</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="fine" name="fine" value="{{ $laws->fine }}" placeholder="Boetebedrag" required autocomplete="off">
                                        <label for="fine">Boete in &euro;</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="months" name="months" value="{{ $laws->months }}" placeholder="Maanden" required autocomplete="off">
                                        <label for="months">Celstraf</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="description" name="description" style="height: 75px" required>{{ $laws->description }}</textarea>
                                        <label for="description">Omschrijving</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="app-card-footer">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Straf aanpassen</button>
                            </div>
                        </div>
                    </form>
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
