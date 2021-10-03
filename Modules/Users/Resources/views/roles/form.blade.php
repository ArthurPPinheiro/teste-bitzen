@extends('layouts.app')

@section('content')

@if ($type == 'create')
    <form action="{{ route('Admin.Roles.store') }}" method="POST" id="roles">
@else
    <form action="{{ route('Admin.Roles.update', ['role' => $role]) }}" method="POST" id="roles">
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
                                <a href="#!" class="btn btn-sm btn-primary">Permissões</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body container">
                        <div class="form-group col-12">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" name="name" id="name" class="form-group" value="{{ isset($role) && $role->name ? $role->name : '' }}">
                        </div>
                        @foreach (Module::getOrdered() as $modulo)
                            <span class="col-12"><strong>{{ $modulo->getName() }}</strong></span>
                            <div class="row p-3">
                                <div class="form-group col-3">
                                    <input type="checkbox" name="permissions[{{ Str::slug($modulo->getName()) }}.view]" id="{{ Str::slug($modulo->getName()) }}-view-permission" {{ isset($role) && $role->hasPermissionTo(Str::slug($modulo->getName()) . '.view') ? 'checked' : '' }} value="{{ Str::slug($modulo->getName()) }}.view">
                                    <label for="{{ Str::slug($modulo->getName()) }}-view-permission" class="control-label">View</label>
                                </div>
                                <div class="form-group col-3">
                                    <input type="checkbox" name="permissions[{{ Str::slug($modulo->getName()) }}.create]" id="{{ Str::slug($modulo->getName()) }}-create-permission" {{ isset($role) && $role->hasPermissionTo(Str::slug($modulo->getName()) . '.create') ? 'checked' : '' }} value="{{ Str::slug($modulo->getName()) }}.create">
                                    <label for="{{ Str::slug($modulo->getName()) }}-create-permission" class="control-label">Create</label>
                                </div>
                                <div class="form-group col-3">
                                    <input type="checkbox" name="permissions[{{ Str::slug($modulo->getName()) }}.update]" id="{{ Str::slug($modulo->getName()) }}-update-permission" {{ isset($role) && $role->hasPermissionTo(Str::slug($modulo->getName()) . '.update') ? 'checked' : '' }} value="{{ Str::slug($modulo->getName()) }}.update">
                                    <label for="{{ Str::slug($modulo->getName()) }}-update-permission" class="control-label">Edit</label>
                                </div>
                                <div class="form-group col-3">
                                    <input type="checkbox" name="permissions[{{ Str::slug($modulo->getName()) }}.delete]" id="{{ Str::slug($modulo->getName()) }}-delete-permission" {{ isset($role) && $role->hasPermissionTo(Str::slug($modulo->getName()) . '.delete') ? 'checked' : '' }} value="{{ Str::slug($modulo->getName()) }}.delete">
                                    <label for="{{ Str::slug($modulo->getName()) }}-delete-permission" class="control-label">Delete</label>
                                </div>
                            </div>
                        @endforeach
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-4">{{ $type == 'create' ? 'Criar' : 'Editar'}} Role</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
