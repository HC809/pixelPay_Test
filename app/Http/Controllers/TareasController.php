<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Tarea::orderBy('fecha_vencimiento', 'asc')->paginate(3);

        return view('tareas.index')->with('tareas', $tareas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validar los datos (intente hacer la validacion en una clase aparte pero tuve algunos errors)
         $validatedData = $request->validate([
             'nombre' => 'required|string|max:255|min:3',
             'descripcion' => 'required|string|max:10000|min:10',
             'fecha_vencimiento' => 'required|date',
         ]);
 
         //crear nueva tarea
         $tarea = new Tarea;
         
         //asignar los datos de la peticion a la nueva tarea
         $tarea->nombre = $request->nombre;
         $tarea->descripcion = $request->descripcion;
         $tarea->estado_id = 1;
         $tarea->fecha_vencimiento = $request->fecha_vencimiento;
 
         //guardar la tarea
         $tarea->save();
 
         //mensaje de sesion exitoso
         Session::flash('success', 'La tarea se creo exitosamente.');
 
         //retornar a index view
         return redirect()->route('tareas.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
