@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="col-8">
                        <h6>Lista de Veículos</h6>
                        <a href="{{ route('Admin.Veiculo.create') }}" class="btn btn-sm btn-primary">+ Criar
                            Veículos</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    @foreach ((new Modules\Veiculo\Entities\Veiculo())->getFillable() as $fillable)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ $fillable }}</th>
                                    @endforeach
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($veiculos as $veiculo)
                                    <tr>
                                        @foreach ((new Modules\Veiculo\Entities\Veiculo())->getFillable() as $fillable)
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        @if ($fillable == 'status')
                                                            <span
                                                                class="badge badge-sm bg-gradient-{{ $veiculo->status == 1 ? 'success' : 'danger' }}">{{ $veiculo->status == 1 ? 'Ativo' : 'Inativo' }}</span>
                                                        @elseif ($fillable == 'category_id')
                                                            <h6 class="mb-0 text-sm">{{ $veiculo->category->name }}
                                                            </h6>
                                                        @else
                                                            <h6 class="mb-0 text-sm">{{ $veiculo->$fillable }}</h6>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        @endforeach
                                        <td class="align-middle">
                                            <a href="{{ route('Admin.Veiculo.edit', $veiculo) }}"
                                                class="text-secondary font-weight-bold text-xs p-2" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                {{-- Edit --}}<i class="fas fa-edit text-info"></i>
                                            </a>
                                            <a href="{{ route('Admin.Veiculo.delete', $veiculo) }}"
                                                class="text-secondary font-weight-bold text-xs p-2 text-red"
                                                data-toggle="tooltip" data-original-title="Delete user">
                                                {{-- Delete --}}<i class="fas fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
