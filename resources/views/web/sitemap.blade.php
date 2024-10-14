@extends('layouts.web')

@section('schema')
    @include('web.includes.schema')
@endsection

@section('content')
    @include('web.includes.page-title-area')
    <div class="blog-details-area pt-92 pt-sm-77 pb-100 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h3>Services</h3>
                    <ul>
                        @foreach($services as $service)
                            <li><span data-target="{{ url($service->url) }}" class="special-action">{{ $service->name }}</span></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h3>Tools</h3>
                    <ul>
                        <li><span data-target="{{ route('website-cost-calculator') }}" class="special-action">Website Cost Calculator</span></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h3>Other links</h3>
                    <ul>
                        <li><span data-target="{{ route('about') }}" class="special-action">About Us</span></li>
                        <li><span data-target="{{ route('contact') }}" class="special-action">Contact</span></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h3>Legal</h3>
                    <ul>
                        <li><span data-target="{{ route('terms-conditions') }}" class="special-action">Terms & Conditions</span></li>
                        <li><span data-target="{{ route('privacy') }}" class="special-action">Privacy Policy</span></li>
                        <li><span data-target="{{ route('sitemap') }}" class="special-action">Sitemap</span></li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <h3>Blog posts</h3>
                    <ul>
                        @foreach($posts as $post)
                            <li><span data-target="{{ route('single', $post->url) }}" class="special-action">{{ $post->title }}</span></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
