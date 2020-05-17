{{ Form::label('nombre', 'Nombre', ['class' => 'control-label']) }}
{{ Form::text('nombre', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Ingrese el nombre de la tarea']) }}

{{ Form::label('descripcion', 'Descripción', ['class' => 'control-label']) }}
{{ Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripción de la tarea']) }}

{{ Form::label('fecha_vencimiento', 'Fecha de vencimiento', ['class' => 'control-label mt-3']) }}
{{ Form::date('fecha_vencimiento', null, ['class' => 'form-control']) }}

<div class="row justify-content-center mt-3">
    <div class="col-sm-4">
        <a href="{{ route('tareas.index') }}" class="btn btn-secondary btn-block">
            Regresar
        </a>
    </div>
    <div class="col-sm-4">
        <button class="btn btn-primary btn-block" type="submit">
            Guardar
        </button>
    </div>
</div>