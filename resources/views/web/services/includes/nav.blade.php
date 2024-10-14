<nav id="sub-menu" class="mt-100 d-md-block d-none">
    <div class="container py-3">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav services-nav justify-content-center">
                    <li class="nav-item"><a @class(['nav-link', 'active' => Request::url() == url('web-design-colorado')]) href="{{ url('web-design-colorado') }}">Web Design</a></li>
                    <li class="nav-item"><a @class(['nav-link', 'active' => Request::url() == url('e-commerce-colorado')]) href="{{ url('e-commerce-colorado') }}">E-Commerce</a></li>
                    <li class="nav-item"><a @class(['nav-link', 'active' => Request::url() == url('tracking-website-colorado')]) href="{{ url('tracking-website-colorado') }}">Tracking Website</a></li>
                    <li class="nav-item"><a @class(['nav-link', 'active' => Request::url() == url('web-development-colorado')]) href="{{ url('web-development-colorado') }}">Web Development</a></li>
                    <li class="nav-item"><a @class(['nav-link', 'active' => Request::url() == url('search-engine-optimization-colorado')]) href="{{ url('search-engine-optimization-colorado') }}">SEO</a></li>
                    <li class="nav-item"><a @class(['nav-link', 'active' => Request::url() == url('call-tracking-colorado')]) href="{{ url('call-tracking-colorado') }}">Call Tracking</a></li>
                    <li class="nav-item"><a @class(['nav-link', 'active' => Request::url() == url('web-consulting-colorado')]) href="{{ url('web-consulting-colorado') }}">Web Consulting</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
