<?php
    $user = \Illuminate\Support\Facades\Session::get('auth');
?>

<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="{{ url('resources/layout/') }}/images/icon/logo.png" alt="TDH Queuing System" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="#">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ url('number') }}">
                        <i class="fas fa-table"></i>Get Number</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-wheelchair"></i>Next Patient</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="{{ url('patient/vital') }}"><i class="fas fa-stethoscope"></i> Vital Signs</a>
                        </li>
                        <li>
                            <a href="{{ url('patient/vital') }}"><i class="fas fa-user-md"></i> Consultation</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-desktop"></i>Main Screen</a>
                </li>
                @if($user->access=='admin')
                <li>
                    <a href="#">
                        <i class="fas fa-gear"></i>Settings</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ url('resources/layout/') }}/images/icon/logo.png" alt="TDH QS" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="{{ url('/') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ url('number') }}">
                        <i class="fas fa-table"></i>Get Number</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-wheelchair"></i>Next Patient
                    </a>

                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        @if($user->access=='registration' || $user->access=='all' || $user->access=='admin')
                            <li>
                                <a href="{{ url('patient/card') }}"><i class="fas fa-credit-card"></i> Card Issuance</a>
                            </li>
                        @endif
                        @if($user->access=='vital' || $user->access=='all' || $user->access=='admin')
                        <li>
                            <a href="{{ url('patient/vital') }}"><i class="fas fa-stethoscope"></i> Vital Signs</a>
                        </li>
                        @endif
                        @if($user->access=='pedia' || $user->access=='all' || $user->access=='admin')
                        <li>
                            <a href="{{ url('patient/consultation') }}"><i class="fas fa-user-md"></i> Consultation</a>
                        </li>
                        @endif
                    </ul>
                </li>
                <li>
                    <a href="{{ url('screen') }}" target="_blank">
                        <i class="fas fa-desktop"></i>Main Screen</a>
                </li>
                @if($user->access=='admin')
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-gear"></i>Settings
                        </a>

                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li><a href="{{ url('settings/user') }}"><i class="fas fa-users"></i> Users</a></li>
                            <li><a href="{{ url('settings/access') }}"><i class="fas fa-lock"></i> Access Level</a></li>
                            <li><a href="{{ url('settings/parameter') }}"><i class="fas fa-wrench"></i> Parameters</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->