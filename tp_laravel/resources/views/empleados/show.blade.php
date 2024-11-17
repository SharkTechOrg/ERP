@extends('layouts.app')

@section('content')
    <h2>Detalles del Empleado</h2>

    <p><strong>Nombre:</strong> {{ $empleado->nombre }} {{ $empleado->apellido }}</p>
    <p><strong>Email:</strong> {{ $empleado->email }}</p>
    
    <p><strong>Fecha de Contratación:</strong> 
        {{ \Carbon\Carbon::parse($empleado->alta_contrato)->format('d/m/Y') }}
    </p>

    <p><strong>Salario:</strong> ${{ number_format($empleado->salario, 2) }}</p>
    
    <p><strong>Estado:</strong> {{ $empleado->activo ? 'Activo' : 'Inactivo' }}</p>

    <p><strong>Departamento:</strong> {{ $empleado->departamento->descripcion }}</p>

    <!-- Contenedor con Flexbox para los botones -->
    <div class="d-flex align-items-center">
        <a href="{{ route('empleados.edit', $empleado->id_empleado) }}" class="btn btn-warning me-2">Editar</a>
        
        <form action="{{ route('empleados.destroy', $empleado->id_empleado) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger me-2">Eliminar</button>
        </form>

        <a href="{{ route('empleados.index') }}" class="btn btn-primary">Volver al Listado</a>
    </div>

@endsection
