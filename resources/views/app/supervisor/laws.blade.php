@extends('layouts.app')
@section('pagename', 'Laws')

@section('content')
    @if($user->supervisor == 1)
        Laws
    @else
        <div class="app-card">
            <div class="app-card-body text-center">
                Je hebt geen toegang tot deze pagina omdat je geen leidinggevende bent.
            </div>
        </div>
    @endif
@endsection
