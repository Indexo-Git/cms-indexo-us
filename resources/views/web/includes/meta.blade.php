<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=1">
<title>{{ $metaTitle ?? $settings['website_name']->value }} </title>
<link rel="shortcut icon" href="{{ asset('favicon.png') }}">
@if(!(isset($exception) && $exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException))
    <meta name="description" content="{{ $description }}">
    @if($keywords != '')
        <meta name="keywords" content="{{ $keywords }}">
    @endif
    <meta name="author" content="https://indexo.us">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="dc.description" content="{{ $description }}">
    <meta name="dc.relation" content="{{ url()->current() }}">
    <meta name="dc.source" content="{{ route('index') }}">
    <meta name="dc.language" content="en_US">
    <meta name="robots" content="{{ isset($noIndex) && $noIndex ? 'noindex, nofollow' : 'index, follow' }}">
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="indexo.us">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? $settings['website_name']->value }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:image" content="{{ $metaImage ?? asset('web/images/meta/meta-default.jpg') }}">
    <meta property="og:image:secure_url" content="{{ asset('web/images/meta/meta-default.jpg') }}">
    <meta property="og:image:width" content="1201">
    <meta property="og:image:height" content="628">
    <meta property="og:image:alt" content="{{ $title ?? $settings['website_name']->value }}">
    <meta property="twitter:card" content="summary">
    <meta property="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $metaImage ?? asset('web/images/meta/meta-default.jpg') }}">
@endif

