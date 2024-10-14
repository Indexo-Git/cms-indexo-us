@extends('layouts.email')

@section('content')
    <h2>Contact Message</h2>
    <div class="proposition">
        <p>You've been contacted. Please review the following information:</p>
    </div>
    <h3>Information</h3>
    <ul>
        <li><strong>Name:</strong> {{ $sender }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Phone:</strong> {{ $phone }}</li>
        <li><strong>Message:</strong> {{ $content }}</li>
    </ul>
@endsection
