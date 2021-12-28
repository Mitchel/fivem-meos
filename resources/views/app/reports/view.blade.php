@extends('layouts.app')
@section('pagename', __('Report: :report_number', ['report_number' => $report_number]))

@section('content')
    @forelse($reports as $report)
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="app-card reports-view">
                    <div class="app-card-header">
                        <a href="{{ route('reports.create') }}" class="btn btn-danger btn-sm"><i class="far fa-trash-alt fa-fw"></i></a>
                        <a href="{{ route('reports.create') }}" class="btn btn-success btn-sm"><i class="far fa-pencil fa-fw"></i></a>
                        <p class="title"><span class="reportnumber">#{{ $report->report_number }}</span> {{ $report->title }}</p>
                        <p class="description">Geschreven door: <strong>{{ $report->created_by }}</strong> op <strong>{{ $report->date }}</strong> om <strong>{{ $report->time }}</strong>.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12">
                <div class="app-card">
                    <div class="app-card-body report-details">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <strong>Gekregen straf</strong>
                                <p><strong>{{ $report->cell }}</strong> maanden en <strong>&euro; {{ $report->penalty }}</strong> euro</p>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <strong>Laatst opgezocht</strong>
                                <p>{{ $report->last_search }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-12">
                <div class="app-card reports-view">
                    <div class="app-card-body">
                        <div class="report-header">
{{--                            <img src="{{ asset('images/politie-logo.png') }}" class="img-fluid" alt="Politie Eenheid Los Santos">--}}
                            <p>Eenheid Los Santos</p>
                            <p>District LS-Zuid</p>
                            <p>Basisteam Mission Row</p>

                            <p class="report_number">Proces-verbaalnummer: <span>{{ $report->report_number }}</span></p>
                            <p class="title">Proces-verbaal</p>
                            <p class="type">{{ $report->type }}</p>
                        </div>

                        <div class="report-body">
                            @if($report->type == 'aangifte')
                                <div class="row">
                                    <div class="col-sm-6 col-md-2">Feit</div>
                                    <div class="col-sm-6 col-md-10"><span>:</span> {{ $report->laws }}</div>
                                    <div class="col-sm-6 col-md-2">Pleegdatum/tijd</div>
                                    <div class="col-sm-6 col-md-10"><span>:</span> Op {{ $report->date }} om {{ $report->time }} uur</div>
                                </div>
                            @endif

                            <p>Ik, verbalisant, <strong>{{ $report->created_by }}</strong>, <strong>{{ $report->created_by_function }}</strong> van politie Eenheid Los Santos, verklaar het volgende:</p>

                            @if($report->type == 'beschikking')
                                <p>Op <strong>{{ $report->date }}</strong>, omstreeks <strong>{{ $report->time }}</strong> uur, bevond ik mij in uniform gekleed en met algemene politietaak belast op de openbare weg,</p>
                            @elseif($report->type == 'aanhouding')
                                <p>Op <strong>{{ $report->date }}</strong>, omstreeks <strong>{{ $report->time }}</strong> uur, bevond ik mij in uniform gekleed en met algemene politietaak belast op de openbare weg,</p>
                                <p>Daar heb ik aangehouden:<br/> <i>Een verdachte die op basis van nader identiteitsonderzoek, bleek te zijn</i>:</p>

                                <div class="row">
                                    <div class="col-sm-6 col-md-2">Volledige naam</div>
                                    <div class="col-sm-6 col-md-10"><span>:</span> <span class="pv-1">{{ $report->Profile->fullname }}</span></div>
                                    <div class="col-sm-6 col-md-2">Burgerservicenummer</div>
                                    <div class="col-sm-6 col-md-10"><span>:</span> <span class="pv-1">{{ $report->citizen_number }}</span></div>
                                    <div class="col-sm-6 col-md-2">Geboren op</div>
                                    <div class="col-sm-6 col-md-10"><span>:</span> <span class="pv-1">{{ $report->Profile->birthday }}</span></div>
                                    <div class="col-sm-6 col-md-2">Geslacht</div>
                                    <div class="col-sm-6 col-md-10"><span>:</span> <span class="pv-1"><span class="first_letter">{{ $report->Profile->gender }}</span></span></div>
                                    <div class="col-sm-6 col-md-2">Nationaliteit</div>
                                    <div class="col-sm-6 col-md-10"><span>:</span> <span class="pv-1"><span class="first_letter">{{ $report->Profile->nationality }}</span></span></div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 col-md-2">Identiteitsfouillering</div>
                                    <div class="col-sm-6 col-md-10"><span>:</span> <span class="pv-1">{{ $report->identity_search }}</span></div>
                                    <div class="col-sm-6 col-md-2">Veiligheidsfouillering</div>
                                    <div class="col-sm-6 col-md-10"><span>:</span> <span class="pv-1">{{ $report->security_search }}</span></div>
                                    <div class="col-sm-6 col-md-2">Inbeslagname</div>
                                    <div class="col-sm-6 col-md-10"><span>:</span> <span class="pv-1">{{ $report->seizure }}</span></div>
                                    <div class="col-sm-6 col-md-2">Gebruik transportboeien</div>
                                    <div class="col-sm-6 col-md-10"><span>:</span> <span class="pv-1">{{ $report->transport_cuffs }}</span></div>
                                    <div class="col-sm-6 col-md-2">Gebruik geweld</div>
                                    <div class="col-sm-6 col-md-10"><span>:</span> <span class="pv-1">{{ $report->used_force }}</span></div>
                                    <div class="col-sm-6 col-md-2">Juridische bijstand</div>
                                    <div class="col-sm-6 col-md-10"><span>:</span> <span class="pv-1">{{ $report->legal_aid }}</span></div>
                                    <div class="col-sm-6 col-md-2">Rechten voorgelezen</div>
                                    <div class="col-sm-6 col-md-10"><span>:</span> <span class="pv-1">{{ $report->legal_aid }}</span></div>
                                </div>

                                <p>Ik, verbalisant, <strong>{{ $report->created_by }}</strong>, heb <strong>{{ $report->Profile->fullname }}</strong>, hierna verdachte, aangehouden voor de volgende gepleegde overtreding(en):<br/>- {{ $report->laws }}</p>

                                <p class="title"><strong>Bevindingen</strong></p> <p>{{ $report->findings }}</p>
                                <p class="title"><strong>Verklaring</strong></p> <p>{{ $report->statement }}</p>

                                <p>De verdachte heeft zich omstreeks <strong>{{ $report->time }}</strong> uur op het hoofdbureau van Basisteam Mission Row gemeld en is aangehouden voor de vergrepen die zijn uitgevoerd.</p>

                                <p class="title"><strong>Voorgeleiding</strong></p>
                                <p>Op genoemd bureau werd de verdachte ten spoedisgste voorgeleid voor de hulpofficier van justitie. Deze gaf omstreeks <strong>{{ $report->time }}</strong> uur het bevel de verdachte op te houden voor onderzoek.</p>

                                <p>Waarvan door mij, <strong>{{ $report->created_by }}</strong>, op ambtseed is opgemaakt, dit proces-verbaal te Los Santos op <strong>{{ $report->date }}</strong> om <strong>{{ $report->time }}</strong> uur.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TODO: Straffen tonen vanuit Laws -->
{{--        <div class="row">--}}
{{--            <div class="col-sm-12 col-md-4">--}}
{{--                <div class="app-card">--}}
{{--                    <div class="app-card-header blue-bg">--}}
{{--                        <p class="title">Artikel 196 - Onrechtmatig voordoen als pol...</p>--}}
{{--                    </div>--}}
{{--                    <div class="app-card-body profile-info">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-12 col-md-6">--}}
{{--                                <strong>Boetebedrag</strong>--}}
{{--                                &euro; 435--}}
{{--                            </div>--}}

{{--                            <div class="col-sm-12 col-md-6">--}}
{{--                                <strong>Celstraf</strong>--}}
{{--                                12 maand(en)--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-12 col-md-4">--}}
{{--                <div class="app-card">--}}
{{--                    <div class="app-card-header blue-bg">--}}
{{--                        <p class="title">Administratiekosten</p>--}}
{{--                    </div>--}}
{{--                    <div class="app-card-body profile-info">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-12 col-md-6">--}}
{{--                                <strong>Boetebedrag</strong>--}}
{{--                                &euro; 9--}}
{{--                            </div>--}}

{{--                            <div class="col-sm-12 col-md-6">--}}
{{--                                <strong>Celstraf</strong>--}}
{{--                                0 maand(en)--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    @empty
        <div class="app-card">
            <div class="app-card-body text-center">
                Het procesverbaal dat je probeert te zoeken, bestaat niet of is verwijderd. Probeer het opnieuw.
            </div>
        </div>
    @endforelse
@endsection
