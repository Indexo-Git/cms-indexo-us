@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-xl-3 mb-4 mb-xl-0">
            <section class="card">
                <div class="card-body pt-0">
                    <div class="thumb-info mb-3">
                        <img src="{{ asset('app/img/!logged-user.jpg') }}" class="rounded img-fluid" alt="John Doe">
                        <div class="thumb-info-title">
                            <span class="thumb-info-inner">{{ Auth::user()->name }}</span>
                            <span class="thumb-info-type">{{ Auth::user()->hash }}</span>
                        </div>
                    </div>
                    <div class="widget-toggle-expand mb-3">
                        <div class="widget-header">
                            <h5 class="mb-2 font-weight-semibold text-dark">Progreso del perfil</h5>
                            <div class="widget-toggle">+</div>
                        </div>
                        <div class="widget-content-expanded">
                            <ul class="simple-todo-list mt-3">
                                <li @class(['completed' => Auth::user()->email_verified_at])>Validar correo electrónico</li>
                                <li @class(['completed' => Auth::user()->addresses->count()])>Agregar una dirección fiscal y/o de entrega</li>
                                <li>Realizar una compra</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-8 col-xl-9">
            @if(!Auth::user()->addresses->count())
                <div class="alert alert-warning nomargin fade show mt-3" role="alert">
                    <h4 class="font-weight-bold text-dark">¡Atención!</h4>
                    <p>Si deseas poder realizar una compra es necesario que des de alta al menos una dirección fiscal y/o de entrega.</p>
                    <p>
                        <a href="{{ route('new-address') }}"><button class="btn btn-default mt-1 mb-1" type="button">Agregar dirección</button></a>
                    </p>
                </div>
            @endif
            <div class="row mb-3">
                <div class="col-xl-6">
                    <a href="{{ route('history') }}" class="text-decoration-none">
                        <section class="card card-featured-left card-featured-primary mb-3">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-primary">
                                            <i class="bx bx-package"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h3 class="bold clear-link">Mis pedidos</h3>
                                            <div class="info">
                                                <span class="clear-link">Checar status de pedidos, cancelar pedidos o comprar algo de nuevo.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
                <div class="col-xl-6">
                    <a href="{{ route('my-account') }}" class="text-decoration-none">
                        <section class="card card-featured-left card-featured-primary mb-3">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-primary">
                                            <i class="bx bxs-user-account"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h3 class="bold clear-link">Inicio de sesión</h3>
                                            <div class="info">
                                                <span class="clear-link">Cambiar nombre de la cuenta, correo electrónico y/o contraseña.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
                <div class="col-xl-6">
                    <a href="{{ route('addresses') }}" class="text-decoration-none">
                        <section class="card card-featured-left card-featured-primary mb-3">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-primary">
                                            <i class="bx bxs-map-pin"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h3 class="bold clear-link">Mis direcciones</h3>
                                            <div class="info">
                                                <span class="clear-link">Editar direcciones de envío y/o facturación para tus pedidos.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
                <div class="col-xl-6">
                    <a href="{{ route('wishlist') }}" class="text-decoration-none">
                        <section class="card card-featured-left card-featured-primary mb-3">
                            <div class="card-body">
                                <div class="widget-summary">
                                    <div class="widget-summary-col widget-summary-col-icon">
                                        <div class="summary-icon bg-primary">
                                            <i class="bx bx-heart"></i>
                                        </div>
                                    </div>
                                    <div class="widget-summary-col">
                                        <div class="summary">
                                            <h3 class="bold clear-link">Mis lista de deseos</h3>
                                            <div class="info">
                                                <span class="clear-link">Guarda productos para má adelante. Esta lista de productos es privada.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
