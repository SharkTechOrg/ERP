@extends('layouts.app')

@section('content')
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table" style="max-width: 1000px; margin: 0 auto;">
        <thead class="table-light">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Alta Contrato</th>
                <th>Salario</th>
                <th>Activo</th>
                <th>Especialidad</th>
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
                <td>{{ $empleado->salario }}</td>
                <td>{{ $empleado->activo ? 'Sí' : 'No' }}</td>
                <td>
                    @if ($empleado->departamento)
                    {{ $empleado->departamento->descripcion }}
                @else
                    Sin departamento
                @endif
                </td>
                <td>
                    <a href="{{ route('empleados.show', $empleado->id_empleado) }}" class="btn btn-success mb-2">Ver</a>
                    <a href="{{ route('empleados.edit', $empleado->id_empleado) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('empleados.destroy', $empleado->id_empleado) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
      </table>