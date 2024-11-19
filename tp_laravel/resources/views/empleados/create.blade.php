@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center mt-5">
    <div class="card p-4 shadow-lg" style="width: 850px;">
        <h4 class="text-center mb-4">Crear Nuevo Empleado</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('empleados.store') }}">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" value="{{ old('nombre') }}" required>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese el apellido" value="{{ old('apellido') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese el email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="alta_contrato">Fecha de alta</label>
                <input type="date" class="form-control" id="alta_contrato" name="alta_contrato" value="{{ old('alta_contrato') }}" required>
            </div>

            <div class="form-group">
                <label for="salario">Salario</label>
                <input type="number" step="0.01" class="form-control" id="salario" name="salario" placeholder="Ingrese el salario" value="{{ old('salario') }}" required>
            </div>

            <div class="form-group">
                <label for="activo">Estado</label>
                <select class="form-control" id="activo" name="activo">
                    <option value="1" {{ old('activo') == "1" ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ old('activo') == "0" ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="id_departamento">Departamento</label>
                <select class="form-control" id="id_departamento" name="id_departamento" required>
                    <option value="">Seleccione un departamento</option>
                    @foreach($departamentos as $departamento)
                        <option value="{{ $departamento->id_departamento }}" {{ old('id_departamento') == $departamento->id_departamento ? 'selected' : '' }}>
                            {{ $departamento->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block mt-3">Guardar</button>
        </form>
    </div>
</div>
@endsection
