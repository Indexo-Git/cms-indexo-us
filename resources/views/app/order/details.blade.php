@extends('layouts.app')

@section('content')
    <div class="invoice">
        @include('app.order.invoice')
    </div>
    <div class="d-grid gap-3 d-md-flex justify-content-md-end me-4">
        <a href="{{ route('print-order', $order->hash) }}" target="_blank" class="btn btn-primary ms-3"><i class="fas fa-print"></i> Imprimir</a>
    </div>
@endsection
