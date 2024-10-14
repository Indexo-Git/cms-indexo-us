<aside id="sidebar-left" class="sidebar-left">
    <div class="sidebar-header">
        <div class="sidebar-title">
            {{ __('sidebar.menu') }}
        </div>
        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li @class(['nav-active' => Route::currentRouteName() == 'dashboard'])>
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="bx bx-tachometer" aria-hidden="true"></i>
                            <span>{{ __('sidebar.dashboard') }}</span>
                        </a>
                    </li>
                    <li @class(['nav-active' => Route::currentRouteName() == 'analytics'])>
                        <a class="nav-link" href="{{ route('analytics') }}">
                            <i class="bx bx-stats" aria-hidden="true"></i>
                            <span>{{ __('sidebar.analytics') }}</span>
                        </a>
                    </li>
                    <li @class(['nav-active' => Route::currentRouteName() == 'messages'])>
                        <a class="nav-link" href="{{ route('messages') }}">
                            <i class="bx bx-envelope" aria-hidden="true"></i>
                            <span>{{ __('sidebar.messages') }} {{ $unread->count() ? '('.$unread->count().')' : '' }}</span>
                        </a>
                    </li>
                    <li @class(['nav-active' => Route::currentRouteName() == 'calls'])>
                        <a class="nav-link" href="{{ route('calls') }}">
                            <i class="bx bx-phone-incoming" aria-hidden="true"></i>
                            <span>{{ __('sidebar.calls') }}</span>
                        </a>
                    </li>
                    <li @class(['nav-active' => Route::currentRouteName() == 'quotes'])>
                        <a class="nav-link" href="{{ route('quotes') }}">
                            <i class="bx bx-barcode" aria-hidden="true"></i>
                            <span>{{ __('sidebar.quotes') }}</span>
                        </a>
                    </li>
                    @if(Auth::user()->is_admin)
                        <li class="nav-group-label">{{ __('sidebar.content') }}</li>
                        <li @class(['nav-active' => Route::currentRouteName() == 'services'])>
                            <a class="nav-link" href="{{ route('services') }}">
                                <i class="bx bx-collection" aria-hidden="true"></i>
                                <span>{{ __('sidebar.services') }}</span>
                            </a>
                        </li>
                        @if($settings['portfolio_active']->value == 'on')
                            <li @class(['nav-active' => Route::currentRouteName() == 'portfolios' || Route::currentRouteName() == 'new-portfolio'])>
                                <a class="nav-link" href="{{ route('portfolios') }}">
                                    <i class="bx bx-briefcase" aria-hidden="true"></i>
                                    <span>{{ __('sidebar.portfolio') }}</span>
                                </a>
                            </li>
                        @endif
                        @if($settings['blog_active']->value == 'on')
                            <li @class(['nav-active' => Route::currentRouteName() == 'posts' || Route::currentRouteName() == 'new-post'])>
                                <a class="nav-link" href="{{ route('posts') }}">
                                    <i class="bx bx-news" aria-hidden="true"></i>
                                    <span>{{ __('sidebar.blog') }}</span>
                                </a>
                            </li>
                            <li @class(['nav-active' => Route::currentRouteName() == 'open-ai'])>
                                <a class="nav-link" href="{{ route('open-ai') }}">
                                    <i class="bx bx-bot" aria-hidden="true"></i>
                                    <span>{{ __('sidebar.ai-generator') }}</span>
                                </a>
                            </li>
                        @endif
                        @if($settings['shop_active']->value == 'on')
                            <li class="nav-group-label">{{ __('sidebar.ecommerce') }}</li>
                            <li @class(['nav-active' => Route::currentRouteName() == 'categories'])>
                                <a class="nav-link" href="{{ route('categories') }}">
                                    <i class="bx bxs-component" aria-hidden="true"></i>
                                    <span>{{ __('sidebar.categories') }}</span>
                                </a>
                            </li>
                            <li @class(['nav-active' => Route::currentRouteName() == 'products'])>
                                <a class="nav-link" href="{{ route('products') }}">
                                    <i class="bx bx-cube" aria-hidden="true"></i>
                                    <span>{{ __('sidebar.products') }}</span>
                                </a>
                            </li>
                            <li @class(['nav-active' => Route::currentRouteName() == 'attributes'])>
                                <a class="nav-link" href="{{ route('attributes') }}">
                                    <i class="bx bx-customize" aria-hidden="true"></i>
                                    <span>{{ __('sidebar.attributes') }}</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-group-label">{{ __('sidebar.administration') }}</li>
                        <li @class(['nav-active' => Route::currentRouteName() == 'users'])>
                            <a class="nav-link" href="{{ route('users') }}">
                                <i class="bx bx-user" aria-hidden="true"></i>
                                <span>{{ __('sidebar.users') }}</span>
                            </a>
                        </li>
                        <li @class(['nav-parent','nav-active nav-expanded' => Route::currentRouteName() == 'call-tracking' || Route::currentRouteName() == 'target-numbers'])>
                            <a class="nav-link" href="#">
                                <i class="bx bx-dialpad-alt" aria-hidden="true"></i>
                                <span>{{ __('sidebar.call-tracking') }}</span>
                            </a>
                            <ul class="nav nav-children">
                                <li>
                                    <a href="{{ route('target-numbers') }}" @class(['nav-link','font-weight-bold' => Route::currentRouteName() == 'target-numbers'])>
                                        {{ __('sidebar.target-numbers') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('call-tracking') }}" @class(['nav-link','font-weight-bold' => Route::currentRouteName() == 'call-tracking'])>
                                        {{ __('sidebar.tracked-numbers') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li @class(['nav-active' => Route::currentRouteName() == 'settings'])>
                            <a class="nav-link" href="{{ route('settings') }}">
                                <i class="bx bx-cog" aria-hidden="true"></i>
                                <span>{{ __('sidebar.settings') }}</span>
                            </a>
                        </li>
                    @else
                        @if($settings['shop_active']->value == 'on' && $settings['payment_active']->value == 'on')
                            <li @class(['nav-active' => Route::currentRouteName() == 'history'])>
                                <a class="nav-link" href="{{ route('history') }}">
                                    <i class="bx bx-package" aria-hidden="true"></i>
                                    <span>{{ __('sidebar.orders') }}</span>
                                </a>
                            </li>
                        @endif
                    @endif
                    <li>
                        <a class="nav-link" href="{{ route('index') }}" target="_blank">
                            <i @class(['bx', 'bx-store' => $settings['shop_active']->value == 'on' && $settings['payment_active']->value == 'on', 'bx-globe' => $settings['shop_active']->value != 'on' || $settings['payment_active']->value != 'on']) aria-hidden="true"></i>
                            <span>{{ __('sidebar.visit') }} {{ $settings['shop_active']->value == 'on' && $settings['payment_active']->value == 'on' ? __('sidebar.shop') : __('sidebar.website') }}</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <script>
            // Maintain Scroll Position
            if (typeof localStorage !== 'undefined') {
                if (localStorage.getItem('sidebar-left-position') !== null) {
                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
                    sidebarLeft.scrollTop = initialPosition;
                }
            }
        </script>
    </div>
</aside>
