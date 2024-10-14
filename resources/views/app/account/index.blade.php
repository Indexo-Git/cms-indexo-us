@extends('layouts.app')

@section('content')
    <form class="action-buttons-fixed form-validation" action="{{ route('update-account') }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-user-circle"></i>
                                <h2 class="card-big-info-title">{{ Auth::user()->name }}</h2>
                                <p class="card-big-info-desc">Modifica aquí los datos de acceso a tu cuenta.</p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                @include('app.includes.forms.text', ['label' => __('forms.full-name'), 'required' => true, 'input' => 'name',  'value' => $user->name, 'placeholder' => __('forms.full-name'), 'paddingBottom' => true, 'data' => 'minlength="2" maxlength="255" autocomplete="off" autofocus'])
                                @include('app.includes.forms.email', ['label' => __('forms.email'), 'required' => true, 'input' => 'email',  'value' => $user->email, 'placeholder' => __('forms.email'), 'paddingBottom' => true])
                                @include('app.includes.forms.password', ['label' => __('forms.password'), 'required' => !$user->exists, 'input' => 'password', 'placeholder' => '******', 'paddingBottom' => true, 'data' =>  'minlength="8"'])
                                @include('app.includes.forms.password-confirm', ['label' => __('forms.password-confirm'), 'required' => !$user->exists, 'input' => 'password_confirmation', 'placeholder' => '******', 'paddingBottom' => true, 'data' =>  'minlength="8"'])
                                <div class="form-group row align-items-center">
                                    <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0"></label>
                                    <div class="col-lg-7 col-xl-6">
                                        <p>* Campos obligatorios</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row action-buttons">
            <div class="col-12 col-md-auto">
                <button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                    <i class="bx bx-save text-4 me-2"></i> Actualizar cuenta
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="{{ route('dashboard') }}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancelar</a>
            </div>
        </div>
    </form>
@endsection

@section('js')
    <script>
        (function($) {
            'use strict';

            @include('app.includes.scripts.pnotify')

        }(jQuery));
    </script>
@endsection
