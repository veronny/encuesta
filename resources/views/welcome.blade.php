@extends('layouts.app') @section('content')
<div class="container-fluid">

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <img src="{{ url('img/logo.png') }}" style="width:150px;height:50px">

        <div class="text-center">
            <strong>ENCUESTAS SEGÚN SERVICIO DE ATENIÓN NIVEL Y CATEGORIA</strong>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">{{__('Bienvenido!')}}</h1>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <a href="{{ url('/consulta') }}">CONSULTA EXTERNA</a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-md-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <a href="{{ url('/emergencia') }}">EMERGENCIA</a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-medkit fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pending Requests Card Example -->
                            <div class="col-md-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <a href="{{ url('/hospi') }}">HOSPITALIZACION</a>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-hospital fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>
</div>
@endsection
