<div class="form-group col-sm-12">
    {!! Form::label('Nro Expediente', 'Nro  de expediente:') !!}
    {!! Form::text('id_expediente',  $expediente->numero,['class' => 'form-control','disabled']) !!}
</div>
<!-- Descripcion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control','required']) !!}
</div>
<div class="col-sm-12">
    {!! Form::hidden('id_expediente',  $expediente->id, ['class' => 'form-control','id'=>'id_expediente']) !!}
</div>