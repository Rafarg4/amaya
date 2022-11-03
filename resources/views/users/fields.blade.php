<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Usuario:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control','required']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
   {{ Form::password('password', ['class' => 'form-control dd','id'=>'password','v-model'=>'password','required']) }}
</div>