@extends('layouts.app')

@section('content')
    <form class="action-buttons-fixed form-validation" action="{{ $user->exists ? route('update-user') : route('create-user') }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-user-circle"></i>
                                <h2 class="card-big-info-title">{{ __('users.information') }}</h2>
                                <p class="card-big-info-desc">{{ __('users.information-description') }}</p>
                                <p class="card-big-info-desc"><small>* {{ __('forms.required-fields') }}</small></p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                @include('app.includes.forms.text', ['label' => __('forms.full-name'), 'required' => true, 'input' => 'name',  'value' => $user->name, 'placeholder' => __('forms.full-name'), 'paddingBottom' => true, 'data' => 'minlength="2" maxlength="255" autocomplete="off" autofocus'])
                                @include('app.includes.forms.email', ['label' => __('forms.email'), 'required' => true, 'input' => 'email',  'value' => $user->email, 'placeholder' => __('forms.email'), 'paddingBottom' => true])
                                @include('app.includes.forms.password', ['label' => __('forms.password'), 'required' => !$user->exists, 'input' => 'password', 'placeholder' => '******', 'paddingBottom' => true, 'data' =>  'minlength="8"'])
                                @include('app.includes.forms.password-confirm', ['label' => __('forms.password-confirm'), 'required' => !$user->exists, 'input' => 'password_confirmation', 'placeholder' => '******', 'paddingBottom' => true, 'data' =>  'minlength="8"'])
                                @include('app.includes.forms.select', ['label' => __('users.user-type'), 'required' => true, 'input' => 'type', 'paddingBottom' => true, 'options' => [
                                    '0' => __('users.client'),
                                    '1' => __('users.admin')
                                ], 'conditionSelected' => $user->exists && $user->is_admin])
                                @include('app.includes.forms.checkbox', ['label' => __('users.block-user'), 'input' => 'blocked', 'paddingBottom' => true, 'danger' => true, 'labelTwo' => __('users.prevent-logging'), 'checked' => $user->exists && $user->blocked])
                                @include('app.includes.forms.required-fields')
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
                <a href="{{ route('users') }}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">{{ __('words.cancel') }}</a>
            </div>
            @if($user->exists)
                <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
                    <button id="{{ $user->id }}" type="button" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                        <i class="bx bx-trash text-4 me-2"></i> {{ __('forms.delete') }}
                    </button>
                </div>
                <input name="id" type="hidden" value="{{ $user->id }}">
            @endif
        </div>
    </form>
@endsection

@section('js')
    <script>
        (function($) {
            'use strict';
            @include('app.includes.scripts.pnotify')
            @if($user->exists)
                $('.delete-button').on( 'click', function () {
                    @include('app.includes.scripts.sweet-delete', [
                        'modelTranslation' => 'users.model',
                        'deleteQuestion' => 'users.delete-question'
                    ])
                });
            @endif
        }(jQuery));
    </script>
@endsection
