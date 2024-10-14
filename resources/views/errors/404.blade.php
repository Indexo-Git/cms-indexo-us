@extends('layouts.web')

@section('content')
    <div class="error-msg-area display-table pt-100 pt-sm-80 pb-100 pb-sm-80">
        <div class="vertical-middle">
            <div class="container">
                <div class="row align-items-center mt-5">
                    <div class="col-lg-12">
                        <div class="error-msg text-center">
                            <img id="pulque-404" src="{{ asset('web/svg/pulque.svg') }}" alt="404 pulque" class="img-fluid py-3 mt-3">
                            <h3 class="mt-5">Oops! This page could not be found!</h3>
                            <p>Sorry, the page you are looking for does not exist, has been deleted or has been renamed.</p>
                            <a href="{{ route('index') }}" class="btn-common btn-pink radius-50 mt-40">Return to homepage</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
