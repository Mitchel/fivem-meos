<div id="app-header">
    <div class="container">
        <img src="{{ asset('images/politie-logo.png') }}" class="img-fluid" alt="Description about image">
        <p>Eenheid Los Santos</p>
    </div>
</div>

<div id="app-navigation">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <ul class="app-nav">
                    <li class="{{ checkActive('app.dashboard') }}"><a href="{{ route('app.dashboard') }}">Dashboard</a></li>
                    <li class="{{ checkActive('profiles.overview') }}"><a href="{{ route('profiles.overview') }}">Profielen</a></li>
                    <li class="{{ checkActive('reports.overview') }}"><a href="{{ route('reports.overview') }}">Rapporten</a></li>
                    <li class="{{ checkActive('warrants.overview') }}"><a href="{{ route('warrants.overview') }}">Arrestatiebevelen</a></li>

                    @if($user->detective == '1')
                        <li class="{{ checkActive('detective.overview') }}"><a href="{{ route('detective.overview') }}">Recherche</a></li>
                    @endif
                </ul>
            </div>
            <div class="col-sm-12 col-md-3">
                <ul class="app-nav-right">
                    <li>
                        <a class="dropdown-user dropdown-toggle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $user->fullname }} <span class="function">{{ $user->function }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                            <li><a class="dropdown-item" href="{{ route('app.profile') }}">Profiel</a></li>
                            <li><a class="dropdown-item" href="{{ route('app.statics') }}">Statistieken</a></li>
                            @if($user->supervisor == '1')
                                <li><h6 class="dropdown-header">Leidinggevende</h6></li>
                                <li><a class="dropdown-item" href="{{ route('supervisor.colleagues') }}">Medewerkers</a></li>
                                <li><a class="dropdown-item" href="{{ route('supervisor.laws') }}">Straffen</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Uitloggen</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
