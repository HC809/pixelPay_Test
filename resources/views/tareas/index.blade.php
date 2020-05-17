@extends('shared.layout')
@section('titulo', 'Lista Tareas')

@section('content')

<div class="row justify-content-center mb-3">
    <div class="col-sm-4">
        <a href="{{ route('tareas.create') }}" class="btn btn-block btn-success">Nueva Tarea</a>
    </div>
</div>

@if(count($tareas) <= 0) <p class="lead text-center">No hay tareas asignadas. Crea tu primera tarea.</p>
    @else
    @foreach ($tareas as $tarea)
    <div class="row">
        <div class="col-sm-12">
            <h3>
                {{ $tarea->nombre}}
                <small>{{ $tarea->created_at }}</small>
            </h3>
            <hr>
            <p>{{ $tarea->descripcion}}</p>
            <h6>Fecha de vencimiento: <i> <small>{{ $tarea->fecha_vencimiento }}</small></i></h6>

            {!! Form::open(['route' => ['tareas.destroy', $tarea->id], 'method' => 'DELETE']) !!}
            <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-sm btn-primary">Editar</a>
            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            {!! Form::close() !!}
        </div>
    </div>
    <hr>
    @endforeach
    @endif



    <div class="row justify-content-center">
        <div class="col-sm-6 text-center">
            {{ $tareas->links() }}
        </div>
    </div>


    @endsection