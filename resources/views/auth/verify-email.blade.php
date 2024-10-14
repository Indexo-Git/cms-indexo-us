@extends('layouts.auth')

@section('content')
    <div class="panel card-sign">
        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success">{{ __('auth.success-recover-link-sent') }}</div>
        @endif
        @include('includes.errors.g-token')
        <div class="card-title-sign mt-3 text-end">
            <h2 class="title text-uppercase font-weight-bold m-0"><i class="bx bx-user-circle mr-1 text-6 position-relative top-5"></i> {{ __('auth.account-verification') }}</h2>
        </div>
        <div class="card-body">
            <p>{{ __('auth.thanks-sign-up') }}</p>
            <form id="verification" method="post" action="{{ route('verification.send') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary mt-2">{{ __('auth.resend-verification-link') }}</button>
                    </div>
                </div>
            </form>
            <div class="row mb-3">
                <div class="col">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-default mt-2">{{ __('auth.logout') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('includes.google-recaptcha', ['form' => 'verification'])
@endsection
