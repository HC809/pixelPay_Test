@extends('shared.layout')
@section('titulo', 'Nueva Tarea')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <h2>Editar Tarea</h2>

        {!! Form::model($tarea, ['route' => ['tareas.update', $tarea->id], 'method' => 'PATCH']) !!}
        {!! Form::Label('estado_id', 'Estado:') !!}
        {!! Form::select('estado_id', $estados, null, ['class' => 'form-control']) !!}
        @component('components.tareaForm')
        @endcomponent
        {!! Form::close() !!}
    </div>
</div>

@endsection