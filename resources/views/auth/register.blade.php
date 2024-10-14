@extends('layouts.auth')

@section('content')
    <div class="panel card-sign">
        @include('includes.errors.g-token')
        <div class="card-title-sign mt-3 text-end">
            <h2 class="title text-uppercase font-weight-bold m-0"><i class="bx bx-user-circle mr-1 text-6 position-relative top-5"></i> {{ __('auth.sign-up') }}</h2>
        </div>
        <div class="card-body">
            <form id="register" class="chk-radios-form form-validation" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group mb-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">{{ __('forms.your-name') }}</label>
                    <input id="name" type="text" class="form-control form-control-lg" name="name" value="{{ old('name') }}" placeholder="{{ __('forms.your-name') }}" required autofocus minlength="2">
                    @error('name')
                        <label id="name-error" class="error" for="name">{{ $message }}</label>
                    @enderror
                </div>
                @include('auth.includes.forms.email')
                @include('auth.includes.forms.password-confirm')
                <div class="row mb-3 form-group">
                    <div class="col-sm-8">
                        <div class="checkbox-custom checkbox-default">
                            <input id="terms" name="terms" type="checkbox" value="terms" required>
                            <label for="terms">{{ __('auth.agree-with') }} <a tabindex="-1" href="{{ route('privacy') }}" target="_blank">{{ __('auth.privacy-policy') }}</a></label>
                        </div>
                        <label class="error" for="terms"></label>
                    </div>
                    <div class="col-sm-4 text-right">
                        <button type="submit" class="btn btn-primary mt-2">{{ __('auth.register') }}</button>
                    </div>
                </div>
                <p class="text-center">{{ __('auth.already-registered') }} <a href="{{ route('login') }}">{{ __('auth.sign-in') }}!</a></p>
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('includes.google-recaptcha', ['form' => 'register'])
@endsection
