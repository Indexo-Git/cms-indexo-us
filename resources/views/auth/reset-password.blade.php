@extends('layouts.auth')

@section('content')
    <div class="panel card-sign">
        @include('includes.errors.g-token')
        <div class="card-title-sign mt-3 text-end">
            <h2 class="title text-uppercase font-weight-bold m-0"><i class="bx bx-user-circle mr-1 text-6 position-relative top-5"></i> {{ __('auth.sign-up') }}</h2>
        </div>
        <div class="card-body">
            <form id="reset" class="chk-radios-form form-validation" method="POST" action="{{ route('password.update') }}">
                @csrf
                @include('auth.includes.forms.email', ['autofocus' => true])
                @include('auth.includes.forms.password-confirm')
                <div class="row mb-3 form-group">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary mt-2">{{ __('auth.restore-password') }}</button>
                    </div>
                </div>
                <p class="text-center">{{ __('auth.already-registered') }} <a href="{{ route('login') }}">{{ __('auth.sign-in') }}!</a></p>
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('includes.google-recaptcha', ['form' => 'reset'])
@endsection
