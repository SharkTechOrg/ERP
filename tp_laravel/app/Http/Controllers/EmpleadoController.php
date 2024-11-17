<?php

namespace App\Http\Controllers;
use App\Models\Empleado;
use App\Models\Departamento;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{

    
    public function inicio()
{
    return view('empleados.inicio');
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamento::all(); // Obtener los departamentos
        return view('empleados.create', compact('departamentos')); // Pasar los departamentos a la vista
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:empleados,email',
            'alta_contrato' => 'required|date',
            'salario' => 'required|numeric|min:0',
            'activo' => 'required|boolean',
            'id_departamento' => 'required|exists:departamentos,id_departamento',
        ]);
    
        Empleado::create($validatedData);
    
        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_empleado)
    {
        $empleado = Empleado::findOrFail($id_empleado);
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
