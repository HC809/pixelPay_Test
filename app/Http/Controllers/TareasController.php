<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Estado;
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
        $tareas = Tarea::orderBy('id', 'asc')->paginate(3);

        return view('tareas.index')->with('tareas', $tareas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::pluck('nombre', 'id');

        return view('tareas.create', compact('estados'));
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
         $tarea->estado_id = $request->estado_id;
         $tarea->fecha_vencimiento = $request->fecha_vencimiento;
 
         //guardar la tarea
         $tarea->save();
 
         //mensaje de sesion exitoso
         Session::flash('success', 'La tarea se creo exitosamente.');
 
         //retornar a index view
         return redirect()->route('tareas.index');
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
        $estados = Estado::pluck('nombre', 'id');

        $tarea = Tarea::find($id);
        $tarea->fechaVencimientoFormato = false;

        return view('tareas.edit', compact('id', 'estados'))->with('tarea', $tarea);;
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
                //validar los datos
                $validatedData = $request->validate([
                    'nombre' => 'required|string|max:255|min:3',
                    'descripcion' => 'required|string|max:10000|min:10',
                    'estado_id' => 'required',
                    'fecha_vencimiento' => 'required|date',
                ]);
        
                //buscar la tarea
                $tarea = Tarea::find($id);
                
                //asignar los datos de la peticion a la tarea
                $tarea->nombre = $request->nombre;
                $tarea->descripcion = $request->descripcion;
                $tarea->fecha_vencimiento = $request->fecha_vencimiento;
                $tarea->estado_id = $request->estado_id;
        
                //guardar la tarea
                $tarea->save();
        
                //mensaje de sesion exitoso
                Session::flash('success', 'La tarea se guardo exitosamente.');
        
                //retornar a index view
                return redirect()->route('tareas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea = Tarea::find($id);

        $tarea->delete();

          //mensaje de sesion exitoso
          Session::flash('success', 'La tarea se elimino exitosamente.');

           //retornar a index view
          return redirect()->route('tareas.index');
    }
}
