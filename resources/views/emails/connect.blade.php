@extends('layouts.email')

@section('content')
    <h2>Let's connect Message</h2>
    <div class="proposition">
        <p>You've been contacted. Please review the following information:</p>
    </div>
    <h3>Information</h3>
    <ul>
        <li><strong>Name:</strong> {{ $sender }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Phone:</strong> {{ $phone }}</li>
        <li><strong>Website:</strong> {{ $website }}</li>
    </ul>
@endsection
