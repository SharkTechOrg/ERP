@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h4 class="text-center mb-4">Listado de Empleados</h4>

    <div class="card p-4 shadow-lg">
        <!-- Contenedor con scroll horizontal para tablas grandes -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Alta Contrato</th>
                        <th>Salario</th>
                        <th>Activo</th>
                        <th>Departamento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->nombre }}</td>
                            <td>{{ $empleado->apellido }}</td>
                            <td>{{ $empleado->email }}</td>
                            <td>{{ $empleado->alta_contrato }}</td>
                            <td>${{ number_format($empleado->salario, 2, ',', '.') }}</td>
                            <td>{{ $empleado->activo ? 'Sí' : 'No' }}</td>
                            <td>
                                @if ($empleado->departamento)
                                    {{ $empleado->departamento->descripcion }}
                                @else
                                    Sin departamento
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('empleados.show', $empleado->id_empleado) }}" class="btn btn-success btn-sm mb-1">Ver</a>
                                <a href="{{ route('empleados.edit', $empleado->id_empleado) }}" class="btn btn-warning btn-sm mb-1">Editar</a>
                                <form action="{{ route('empleados.destroy', $empleado->id_empleado) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('empleados.create') }}" class="btn btn-primary">Crear Nuevo Empleado</a>
    </div>
</div>
@endsection
