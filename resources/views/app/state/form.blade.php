@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <form class="form-validation" method="post" action="{{ $state->exists ? route('update-state') : route('create-state') }}" method="post">
                @csrf
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-map"></i>
                                <h2 class="card-big-info-title">Información</h2>
                                <p class="card-big-info-desc">Agrega el nombre del estado</p>
                                <p class="card-big-info-desc"><small>* Campos obligatorios</small></p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div @class(['form-group row align-items-center pb-3', 'has-error' => $errors->has('name')])>
                                    <label for="name" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Nombre del estado <span class="required">*</span></label>
                                    <div class="col-lg-7 col-xl-6">
                                        <div class="input-group">
                                            <input id="name" name="name" type="text" class="form-control form-control-modern" value="{{ old('name', $state->name) }}" placeholder="Nombre del estado" required minlength="2" maxlength="45" autocomplete="off" autofocus>
                                            <button class="btn btn-primary" type="submit">Guardar</button>
                                        </div>
                                        @if($errors->has('name'))
                                            <label id="name-error" class="error" for="name">{{ $errors->first('name') }}</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($state->exists)
                            <input name="id" type="hidden" value="{{ $state->id }}">
                        @endif
                    </div>
                </section>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        (function($) {
            'use strict';

            @include('app.includes.scripts.pnotify')

        }(jQuery));
    </script>
@endsection
