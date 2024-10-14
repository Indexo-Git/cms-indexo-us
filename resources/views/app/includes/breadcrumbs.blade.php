<header class="page-header">
    <h2>{{ __($title) }}</h2>
    <div class="right-wrapper text-right">
        <ol class="breadcrumbs mr-3">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="bx bx-tachometer"></i>
                </a>
            </li>
            <li><span>{{ __('words.section') }}</span></li>
            <li><span>{{ __($title) }}</span></li>
        </ol>
    </div>
</header>
