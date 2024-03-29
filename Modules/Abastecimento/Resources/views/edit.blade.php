@extends('layouts.app')

@section('content')
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-10 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Criar {!! config('abastecimento.name') !!} </h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="#!" class="btn btn-sm btn-primary">Informações Gerais</a>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! form($form) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
