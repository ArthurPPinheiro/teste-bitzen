@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
					<div class="col-8">
                    	<h6>Lista de Abastecimentos</h6>
						<a href="{{ route('Admin.Abastecimento.create') }}" class="btn btn-sm btn-primary">+ Criar Abastecimento</a>
					</div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    @foreach ((new Modules\Abastecimento\Entities\Abastecimento())->getFillable() as $fillable)
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            {{ $fillable }}</th>
                                    @endforeach
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abastecimentos as $abastecimento)
                                    <tr>
                                        @foreach ((new Modules\Abastecimento\Entities\Abastecimento())->getFillable() as $fillable)
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        @if ($fillable == 'status')
                                                            <span
                                                                class="badge badge-sm bg-gradient-{{ $abastecimento->status == 1 ? 'success' : 'danger' }}">{{ $abastecimento->status == 1 ? 'Ativo' : 'Inativo' }}</span>
                                                        @elseif($fillable == 'veiculo_id')
                                                            <h6 class="mb-0 text-sm">{{ $abastecimento->veiculo->fabricante . ' - ' .  $abastecimento->veiculo->nome_veiculo }}</h6>
                                                        @elseif($fillable == 'motorista_id')
                                                            <h6 class="mb-0 text-sm">{{ $abastecimento->motorista->name }}</h6>
                                                        @elseif($fillable == 'data')
                                                            <h6 class="mb-0 text-sm">{{ Carbon\Carbon::createFromFormat('Y-m-d', $abastecimento->data)->format('d/m/Y') }}</h6>
                                                        @else
                                                            <h6 class="mb-0 text-sm">{{ $abastecimento->$fillable }}</h6>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        @endforeach
                                        <td class="align-middle">
                                            <a href="{{ route('Admin.Abastecimento.edit', $abastecimento) }}"
                                                class="text-secondary font-weight-bold text-xs p-2" data-toggle="tooltip"
                                                data-original-title="Edit user">
                                                {{-- Edit --}}<i class="fas fa-edit text-info"></i>
                                            </a>
                                            <a href="{{ route('Admin.Abastecimento.delete', $abastecimento) }}"
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
