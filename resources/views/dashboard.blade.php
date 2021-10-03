@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid py-4">
            <div class="row">
            <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex flex-column h-100">
                            <p class="mb-1 pt-2 text-bold">Informações da empresa </p>
                            <h5 class="font-weight-bolder">BTZ Transports</h5>
                            <p class="">
                                <ul>
                                    <li>Endereço: Av. das Palmeiras, 40 – Maringá–PR</li>
                                    <li>Contato: (44) 3246-4144 / (44) 99999-8888 (whats) -sac@btztransports.com.br</li>
                                    <li>Horário de atendimento: seg/sex – 08h00 – 22h00</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                        <div class="border-radius-lg h-100">
                        {{-- <img src="../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves"> --}}
                        <div class="position-relative d-flex align-items-center justify-content-center h-100">
                            <img class="w-100 position-relative z-index-2 pt-4" src="{{ asset('img/btz.png') }}">
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </main>
@stop
