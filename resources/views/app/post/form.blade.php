@extends('layouts.app')

@section('content')
    <form class="action-buttons-fixed" action="{{ $post->exists ? route('update-post') : route('create-post') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="row">
                <div class=col">
                    <div class="alert alert-danger">
                        <h5>{{ __('words.errors') }}</h5>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="row mt-2">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-news "></i>
                                <h2 class="card-big-info-title">{{ __('posts.information') }}</h2>
                                <p class="card-big-info-desc">{{ __('posts.information-description') }}</p>
                                <p class="card-big-info-desc"><small>* {{ __('forms.required-fields') }}</small></p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                @include('app.includes.forms.text', ['label' => __('posts.title-post'), 'required' => true, 'input' => 'title',  'value' => $post->title, 'placeholder' => __('posts.title-post'), 'paddingBottom' => true, 'data' => 'minlength="2" maxlength="255" autocomplete="off" autofocus'])
                                @if($post->exists)
                                    @include('app.includes.forms.text', ['label' => __('forms.url'), 'required' => false, 'input' => 'url',  'value' => $post->url, 'placeholder' => __('forms.url'), 'paddingBottom' => true])
                                    <div @class(['form-group row align-items-center pb-3'])>
                                        <label for="preview-url" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ __('forms.preview-url') }}</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <a href="{{ route('single', $post->url) }}"><i class="fa fa-external-link"></i>{{ route('single', $post->url) }}</a>
                                        </div>
                                    </div>
                                @endif
                                @include('app.includes.forms.textarea', ['label' =>  __('forms.description'), 'required' => true, 'input' => 'description',  'value' => $post->description, 'placeholder' => __('forms.description'), 'paddingBottom' => true])
                                @include('app.includes.forms.select', ['label' => __('categories.title'), 'required' => true, 'input' => 'category', 'paddingBottom' => true, 'options' => $categories->pluck('name', 'id')->toArray(), 'conditionSelected' => old('category', $post->category_id)])
                                @include('app.includes.forms.image', [
                                            'label' => __('forms.main-image'),
                                            'required' => !Storage::disk('public')->exists('/posts/'.$post->id. '.jpg'),
                                            'input' => 'image',
                                            'paddingBottom' => false,
                                            'previewFile' => true,
                                            'previewPath' => '/posts/'.$post->id,
                                            'showDelete' => false,
                                            'help' => __('forms.help-image')
                                ])
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-text"></i>
                                <h2 class="card-big-info-title">{{ __('posts.content') }}</h2>
                                <p class="card-big-info-desc">{{ __('posts.recommended-length', ['length' => 700]) }}</p>
                                <p class="card-big-info-desc"><small>* {{ __('forms.required-fields') }}</small></p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <textarea id="content" class="form-control form-control-modern" name="content">{{ old('content', $post->content) }}</textarea>
                                @if($errors->has('content'))
                                    <label id="content-error" class="error" for="content">{{ $errors->first('content') }}</label>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        @include('app.includes.seo', ['item' => $post])
        <div class="row action-buttons">
            <div class="col-12 col-md-auto">
                <button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                    <i class="bx bx-save text-4 me-2"></i> {{ __('forms.save') }}
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="{{ route('posts') }}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">{{ __('words.cancel') }}</a>
            </div>
            @if($post->exists)
                <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
                    <button id="{{ $post->id }}" type="button" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                        <i class="bx bx-trash text-4 me-2"></i> {{ __('forms.delete') }}
                    </button>
                </div>
                <input name="id" type="hidden" value="{{ $post->id }}">
            @endif
        </div>
    </form>
@endsection

@section('js')
    <script src="{{ asset('app/vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        (function($) {
            'use strict';

            @include('app.includes.scripts.pnotify')

            $('.image-popup-no-margins').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: false,
                fixedContentPos: true,
                mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
                image: {
                    verticalFit: true
                },
                zoom: {
                    enabled: true,
                    duration: 300 // don't forget to change the duration also in CSS
                }
            });

            @if($post->exists)
                $('.delete-button').on( 'click', function () {
                    @include('app.includes.scripts.sweet-delete', [
                        'modelTranslation' => 'posts.model',
                        'deleteQuestion' => 'posts.delete-question'
                    ])
                });
            @endif

            tinymce.init({
                selector: 'textarea#content',
                menu: {
                    happy: { title: 'View', items: 'code' }
                },
                toolbar: 'undo redo | blocks  bold italic | bullist numlist link | alignleft aligncenter alignright alignjustify  | removeformat ',
                plugins: [
                    'code', 'checklist', 'visualblocks',  'lists','link','preview','fullscreen', 'wordcount'
                ],
                menubar: 'happy',
                height: 650
            });

        }(jQuery));
    </script>
@endsection
