

<style>
    .selection .select2-selection.select2-selection--multiple .select2-selection__rendered .select2-selection__choice {
    background-color: #007bff;
    color: white;
}
.selection .select2-selection.select2-selection--multiple .select2-selection__rendered .select2-selection__choice .select2-selection__choice__remove {
    
    color: white;
}
</style>

@extends('layouts.app')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Expediente</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'expedientes.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('expedientes.fields')
                </div>

            </div>

            <div class="card-footer">
                 {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('expedientes.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear juzgados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   
  <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

           <form>
            

            <div class="card-body">

                <div class="row">
                    @include('clientes.fields')
                </div>

            </div>

            <div class="card-footer">
              
               
            </div>

           

        </div>
    </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" id="prueba" data-dismiss="modal">Close</button>
          {!! Form::submit('Save', ['class' => 'btn btn-primary', 'id' => 'submit']) !!}
           </form>
      </div>
    </div>
  </div>
</div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    
    $(document).ready(function() {
    $('#cliente').select2({theme: 'classic'});

});
</script>
   <script type="text/javascript">
   
        $('#submit').click(function(){
            var nombre = $('#nombre').val();
            var apellido = $('#apellido').val();
            var ci = $('#ci').val();
            var fecha_nacimiento = $('#fecha_nacimiento').val();
            var nacionalidad = $('#nacionalidad').val();
            var distrito_origen = $('#distrito_origen').val();
            var domicilio_particular = $('#domicilio_particular').val();
            var numero_casa = $('#numero_casa').val();
            var barrio = $('#barrio').val();
            var ciudad = $('#ciudad').val();
            var numero_telefono = $('#numero_telefono').val();
            var email = $('#email').val();
            var rede_social = $('#rede_social').val();
            var nombre_apellido_coyuge = $('#nombre_apellido_coyuge').val();
            var ci_coyuge = $('#ci_coyuge').val();
            var empresa_otro = $('#empresa_otro').val();
            var direccion = $('#direccion').val();
            var numero_casa_laboral = $('#numero_casa_laboral').val();
            var telefono_fijo = $('#telefono_fijo').val();
            var telefono_laboral = $('#telefono_laboral').val();
            var email_laboral = $('#email_laboral').val(); 
         
            $.ajax({
               type:'POST',
               url:'/clientes/crear',
               data:{  "_token": "{{ csrf_token() }}", nombre: nombre, apellido: apellido, ci: ci, fecha_nacimiento: fecha_nacimiento, nacionalidad: nacionalidad, distrito_origen: distrito_origen, domicilio_particular: domicilio_particular, numero_casa: numero_casa, barrio: barrio, ciudad: ciudad, numero_telefono: numero_telefono, email: email, rede_social: rede_social, nombre_apellido_coyuge: nombre_apellido_coyuge, ci_coyuge: ci_coyuge, empresa_otro: empresa_otro, direccion: direccion, numero_casa_laboral: numero_casa_laboral, telefono_fijo: telefono_fijo, telefono_laboral: telefono_laboral, email_laboral: email_laboral},
               success:function(data) {
                  $('#exampleModal').modal('hide');
               }
            });


            
            var id = $('#juzgado :last').val();
            id++;
            $("#cliente").append($('<option></option>').attr("value", id).text(nombre));

             
            return false;
            });
   
   </script>

