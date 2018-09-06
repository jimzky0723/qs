<?php
    $access = \Illuminate\Support\Facades\Session::get('access');
    $auth = \Illuminate\Support\Facades\Session::get('auth');
?>
<nav class="navbar navbar-expand-lg mai-sub-header">
    <div class="container">
        <!-- Mega Menu structure-->
        <nav class="navbar navbar-expand-md">
            <button type="button" data-toggle="collapse" data-target="#mai-navbar-collapse" aria-controls="#mai-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler hidden-md-up collapsed">
                <div class="icon-bar"><span></span><span></span><span></span></div>
            </button>
            <div id="mai-navbar-collapse" class="navbar-collapse collapse mai-nav-tabs">
                <ul class="nav navbar-nav">
                    <li class="nav-item parent"><a href="#" role="button" aria-expanded="false" class="nav-link"><span class="icon s7-home"></span><span>Home</span></a>
                        <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                            <li class="nav-item">
                                <a href="{{ asset('/') }}" class="nav-link">
                                    <span class="icon s7-monitor"></span>
                                    <span class="name">Dashboard</span>
                                 </a>
                            </li>
                            @if($access->registration)
                            <li class="nav-item">
                                <a href="{{ url('number') }}" class="nav-link">
                                    <span class="icon s7-download"></span>
                                    <span class="name">Get Number</span>
                                </a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{ url('screen') }}" class="nav-link" target="_blank">
                                    <span class="icon s7-display1"></span>
                                    <span class="name">Main Screen</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if($access->card || $access->vital || $access->pedia || $access->im || $access->surgery || $access->ob || $access->dental || $access->bite)
                    <li class="nav-item parent"><a href="#" role="button" aria-expanded="false" class="nav-link"><span class="icon s7-next-2"></span><span>Next Patient</span></a>
                        <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                            @if($access->card)
                            <li class="nav-item">
                                <a href="{{ url('patient/card') }}" class="nav-link">
                                    <span class="icon s7-id"></span>
                                    <span class="name">Card Issuance</span>
                                </a>
                            </li>
                            @endif
                            @if($access->vital)
                            <li class="nav-item">
                                <a href="{{ url('patient/vital') }}" class="nav-link">
                                    <span class="icon s7-graph3"></span>
                                    <span class="name">Vital Signs</span>
                                </a>
                            </li>
                            @endif
                            @if($access->pedia || $access->im || $access->surgery || $access->ob || $access->dental || $access->bite)
                            <li class="nav-item">
                                <a href="{{ url('patient/consultation') }}" class="nav-link">
                                    <span class="icon fa fa-stethoscope"></span>
                                    <span class="name">Consultation</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    <li class="nav-item parent"><a href="#" role="button" aria-expanded="false" class="nav-link"><span class="icon s7-users"></span><span>Patients</span></a>
                        <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                            <li class="nav-item">
                                <a href="{{ url('patient/list') }}" class="nav-link">
                                    <span class="icon s7-display2"></span>
                                    <span class="name">Today's Patient</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if($auth->access=='admin')
                    <li class="nav-item parent"><a href="#" role="button" aria-expanded="false" class="nav-link"><span class="icon s7-tools"></span><span>Settings</span></a>
                        <ul class="mai-nav-tabs-sub mai-sub-nav nav">
                            <li class="nav-item">
                                <a href="{{ url('settings/user') }}" class="nav-link">
                                    <span class="icon s7-users"></span>
                                    <span class="name">Users</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('settings/access') }}" class="nav-link">
                                    <span class="icon s7-unlock"></span>
                                    <span class="name">Access Level</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('settings/parameters') }}" class="nav-link">
                                    <span class="icon s7-config"></span>
                                    <span class="name">Parameters</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
        <!--Search input-->
        <div class="system-title">
            QueSystem
        </div>
    </div>
</nav>