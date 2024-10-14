@extends('layouts.app')

@section('content')
    <form class="action-buttons-fixed" action="{{ route('open-ai-create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mt-2">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-bot"></i>
                                <h2 class="card-big-info-title">{{ __('openai.information') }}</h2>
                                <p class="card-big-info-desc">{{ __('openai.information-description') }}</p>
                                <p class="card-big-info-desc"><small>* {{ __('forms.required-fields') }}</small></p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                @include('app.includes.forms.text', ['label' => __('posts.title-post'), 'required' => true, 'input' => 'title',  'value' => null, 'placeholder' => __('posts.title-post'), 'paddingBottom' => true, 'data' => 'minlength="2" maxlength="255" autocomplete="off" autofocus'])
                                @include('app.includes.forms.text', ['label' => __('openai.keyword'), 'required' => true, 'input' => 'keyword',  'value' => null, 'placeholder' => __('openai.keyword'), 'paddingBottom' => true])
                                @include('app.includes.forms.select', ['label' => __('categories.title'), 'required' => true, 'input' => 'category', 'paddingBottom' => false, 'options' => $categories->pluck('name', 'id')->toArray(), 'conditionSelected' => old('category')])
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row action-buttons">
            <div class="col-12 col-md-auto">
                <button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                    <i class="bx bx-save text-4 me-2"></i> {{ __('forms.save') }}
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="{{ route('posts') }}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">{{ __('words.cancel') }}</a>
            </div>
        </div>
    </form>
@endsection
