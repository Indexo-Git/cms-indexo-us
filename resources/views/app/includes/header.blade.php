<header class="header">
    <div class="logo-container">
        <a href="{{ route('dashboard') }}" class="logo">
            @include('app.includes.logo', ['height' => 50])
        </a>
        <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <div class="header-right">
        <ul class="notifications">
            <li>
                <a href="#" class="dropdown-toggle notification-icon" data-bs-toggle="dropdown">
                    <i class="bx bx-envelope"></i>
                    @if($unread->count())<span class="badge">{{ $unread->count() }}</span>@endif
                </a>
                <div class="dropdown-menu notification-menu">
                    <div class="notification-title">
                        <span class="float-end badge badge-default">{{ $unread->count() }}</span>
                        {{ trans_choice('messages.unread-messages', $unread->count()) }}
                    </div>
                    <div class="content">
                        <ul>
                            @foreach($unread as $message)
                                <li>
                                    <a href="{{ route('view-message', ['id' => $message->id]) }}" class="clearfix">
                                        <span class="title">{{ $message->name }}</span>
                                        <span class="message">{{ $message->email }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="text-end">
                            <a href="{{ route('messages') }}" class="view-more">{{ __('messages.view') }}</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <span class="separator"></span>
        <div id="userbox" class="userbox">
            <a href="#" data-bs-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="{{ asset('app/img/!logged-user.jpg') }}" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/!logged-user.jpg">
                </figure>
                <div class="profile-info" data-lock-name="{{ Auth::user()->name }}" data-lock-email="{{ Auth::user()->email }}">
                    <span class="name">{{ Auth::user()->name }}</span>
                    <span class="role">{{ Auth::user()->hash }}</span>
                </div>
                <i class="fa custom-caret"></i>
            </a>
            <div class="dropdown-menu">
                <ul class="list-unstyled mb-2">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bx bx-power-off"></i> {{ __('header.logout') }}</a>
                    </li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</header>
