@extends('layouts.app')

@section('content')
    <section class="content-with-menu mailbox">
        <div class="content-with-menu-container" data-mailbox data-mailbox-view="folder">
            <div class="inner-menu-toggle">
                <a href="#" class="inner-menu-expand" data-open="inner-menu">
                    {{ __('messages.show-menu') }} <i class="fas fa-chevron-right"></i>
                </a>
            </div>
            <menu id="content-menu" class="inner-menu" role="menu">
                <div class="nano">
                    <div class="nano-content">
                        <div class="inner-menu-toggle-inside">
                            <a href="#" class="inner-menu-collapse">
                                <i class="fas fa-chevron-up d-inline-block d-md-none"></i><i class="fas fa-chevron-left d-none d-md-inline-block"></i> {{ __('messages.hide-menu') }}
                            </a>
                            <a href="#" class="inner-menu-expand" data-open="inner-menu">
                                {{ __('messages.show-menu') }} <i class="fas fa-chevron-down"></i>
                            </a>
                        </div>
                        <div class="inner-menu-content">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="{{ route('messages') }}" @class(['menu-item','active' => Route::currentRouteName() == 'messages'])>{{ __('messages.inbox') }} @if($unread->count())<span class="badge badge-primary font-weight-normal float-end">{{ $unread->count() }}</span>@endif</a>
                                </li>
                                <li>
                                    <a href="{{ route('trash') }}" @class(['menu-item text-danger','active' => Route::currentRouteName() == 'trash'])>{{ __('messages.trash') }}</a>
                                </li>
                            </ul>
                            <hr class="separator">
                            <div class="sidebar-widget m-0">
                                <div class="widget-header">
                                    <h6 class="title">Labels</h6>
                                    <span class="widget-toggle">+</span>
                                </div>
                                <div class="widget-content">
                                    <ul class="list-unstyled mailbox-bullets">
                                        <li>
                                            <a href="{{ route('type-message', 1) }}" class="menu-item">{{ __('messages.leads') }} <span class="ball green"></span></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('type-message', 2) }}" class="menu-item">{{ __('messages.spam') }} <span class="ball pink"></span></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('type-message', 3) }}" class="menu-item">{{ __('messages.evangelists') }} <span class="ball blue"></span></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('type-message', 4) }}" class="menu-item">{{ __('messages.other') }} <span class="ball gray"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </menu>
            @yield('inbox-content')
        </div>
    </section>
@endsection

@section('js')
    <script>
        (function($) {
            'use strict';
            @include('app.includes.scripts.pnotify')
        }(jQuery));
    </script>
@endsection
