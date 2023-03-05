<!-- Nombre Fuero Field -->
<div class="col-sm-12">
    {!! Form::label('nombre_fuero', 'Nombre Fuero:') !!}
    <p>{{ $fuero->nombre_fuero }}</p>
</div>

<!-- Descripcion Fuero Field -->
<div class="col-sm-12">
    {!! Form::label('descripcion_fuero', 'Descripcion Fuero:') !!}
    <p>{{ $fuero->descripcion_fuero }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Creado:') !!}
    <p>{{ $fuero->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Actualizado:') !!}
    <p>{{ $fuero->updated_at }}</p>
</div>

