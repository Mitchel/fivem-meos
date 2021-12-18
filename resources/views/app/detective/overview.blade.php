@extends('layouts.app')
@section('pagename', 'Detective overview')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="app-card">
                <div class="app-card-header">
                    <p class="title">Recherche leiding</p>
                </div>

                <div class="app-card-body profiles">
                    <ul>
                        @forelse($detectivesupervisor as $data)
                            <li>
                                <img src="{{ $data->picture }}" alt="{{ $data->fullname }}">
                                <span class="fullname">{{ $data->fullname }}</span>
                                <span class="citizen_number">{{ $data->function }}</span>
                            </li>
                        @empty
                            <li>Momenteel zijn er geen leidinggevende.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="app-card">
                <div class="app-card-header">
                    <p class="title">Rechercheurs</p>
                </div>

                <div class="app-card-body profiles">
                    <ul>
                        @forelse($detectives as $data)
                            <li>
                                <img src="{{ $data->picture }}" alt="{{ $data->fullname }}">
                                <span class="fullname">{{ $data->fullname }}</span>
                                <span class="citizen_number">{{ $data->function }}</span>
                            </li>
                        @empty
                            <li>Momenteel zijn er geen rechercheurs.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-9">
            <div class="app-card">
                <div class="app-card-header">
                    <p class="title">Recherche rapporten</p>
                </div>
                <div class="app-card-body">
                    <span style="color: red;">Deze functie word in een later stadium ingebouwd.</span>
                </div>
            </div>
        </div>
    </div>
@endsection
