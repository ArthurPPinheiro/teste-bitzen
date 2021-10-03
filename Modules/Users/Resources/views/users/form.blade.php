@extends('layouts.app')

@section('content')

@if ($type == 'create')
    <form action="{{ route('Admin.Users.store') }}" method="POST" id="users">
@else
    <form action="{{ route('Admin.Users.update', ['user' => $user]) }}" method="POST" id="users">
@endif
    @csrf
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-10 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ $title }} </h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#!" class="btn btn-sm btn-primary">Usuário</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body container">

                        {!! form($form) !!}
                        <div class="row">
                            <span class="col-12"><strong>Roles</strong></span>
                            @foreach ($roles as $role)
                                <div class="p-3">
                                    <div class="form-group col-12">
                                        <input type="checkbox" name="permissions[{{ Str::slug($role->name) }}]" id="{{ Str::slug($role->name) }}" {{ isset($user) && $user->hasRole($role->id) ? 'checked' : '' }} value="{{ $role->name }}">
                                        <label for="{{ Str::slug($role->name) }}" class="control-label">{{ $role->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-4">{{ $type == 'create' ? 'Criar' : 'Editar'}} Usuário</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
