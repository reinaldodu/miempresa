<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //filtro buscar empleado con paginacion
        $departamentos = Departamento::all();
        $empleados = Empleado::paginate(10);
        if (request()->has('buscar')) {
            $empleados = Empleado::where('nombres', 'like', '%' . request('buscar') . '%')
                ->paginate(10);
        } 
        if (request()->has('departamento_id')) {
            $empleados = Empleado::where('departamento_id', request('departamento_id'))->paginate(10);
        } 
        return view('empleados.index', compact('empleados', 'departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamento::all();
        return view('empleados.create', compact('departamentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->nombres,
            'email' => $request->email,
            'password' => bcrypt($request->documento),
        ]);
        //obtener el id del usuario creado
        $user = User::latest('id')->first();
        Empleado::create([            
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'documento' => $request->documento,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'departamento_id' => $request->departamento_id,
            'user_id' => $user->id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        $departamentos = Departamento::all();
        return view('empleados.edit', compact('empleado', 'departamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $empleado->update($request->all());
        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index');
    }
}
