@extends('layouts.app')
@section('pagename', 'Warrants Overview')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="app-card">
                <div class="app-card-header">
                    <p class="title">Arrestatiebevel aanmaken</p>
                </div>
                <form>
                    <div class="app-card-body">
                        <span style="color: red;">Formulier aanmaken.</span>
                    </div>
                    <div class="app-card-footer">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Arrestatiebevel aanmaken</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-8">
            <div class="app-card">
                <div class="app-card-header">
                    <p class="title">Openstaande arrestatiebevelen</p>
                </div>
                <div class="app-card-body">
                    <span style="color: red;">Overzicht aanmaken.</span>
                </div>
            </div>
        </div>
    </div>
@endsection
