@extends('layouts.web')

@section('schema')
    @include('web.includes.schema')
@endsection

@section('content')
    <div class="blog-details-area pt-92 pt-sm-77 pb-100 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="blog-details br-bottom-ebebeb text-center">
                        <picture>
                            <source srcset="{{ asset('storage/posts/'.$post->id.'.webp') }}" type="image/webp">
                            <img class="img-fluid mb-5" src="{{ asset('storage/posts/'.$post->id.'.jpg') }}" alt="{{ $post->title }}">
                        </picture>
                        <h1 class="text-center mb-3">{{ $post->title }}</h1>
                        <h5 class="text-center mb-3"><a href="{{ url($post->category->url) }}">{{ $post->category->name }}</a></h5>
                        <h6 class="text-center mb-5">{{ \Carbon\Carbon::parse($post->created_at)->format('F jS, Y') }}</h6>
                        <div class="text-justify">
                            {!! $post->content !!}
                        </div>
                    </div>
                    <div class="row pt-30">
                        <div class="col-lg-6 col-sm-6">
                            <div class="social-icons style-7">
                                <span>{{ __('words.share') }}:</span>
                                <a href="https://www.facebook.com/sharer.php?u={{ route('single', $post->url) }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/share?url={{ route('single', $post->url) }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($posts->count() && $posts->count() > 3)
                <div class="row mt-77">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h3>{{ __('blog.related-posts') }} {{ $post->category->name }}</h3>
                        </div>
                    </div>
                </div>
                <div class="row blog-carousel mt-35">
                    @foreach($posts as $post)
                        <div class="col-lg-3">
                            <div class="blog-single">
                                <div class="blog-thumb">
                                    <a href="{{ route('single', $post->url) }}"><img src="{{ asset('storage'. $post->image) }}" alt="{{  $post->title }}" /></a>
                                </div>
                                <div class="blog-desc mt-30">
                                    <h3><a href="{{ route('single', $post->url) }}">{{ $post->title }}</a></h3>
                                    <ul class="blog-date-time">
                                        <li><a href="{{ route('single', $post->url) }}"><i class="fa fa-clock-o"></i>  {{ $post->created_at->format('d/m/Y') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
