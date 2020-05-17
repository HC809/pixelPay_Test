@extends('shared.layout')
@section('titulo', 'Nueva Tarea')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card bg-light">
            <div class="card-header">
                <h5 class="card-title">Nueva Tarea</h5>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'tareas.store', 'method' => 'POST']) !!}
                @component('components.tareaForm')
                @endcomponent
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection