@extends('layouts.app')

@section('content')
<script type="text/javascript">
    $(document).ready(function () {
    $('#expediente-consulta').DataTable({
          "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },

        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    var column = this;
                    var select = $('<select><option value="">Selecione una opcion</option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
 
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
 
                    column
                        .data()
                        .unique()
                        .sort()
                        .each(function (d, j) {
                            select.append('<option value="' + d + '">' + d + '</option>');
                        });

                });
        },
        "dom": "Bftrip",
            
            "buttons": [
            'copy', 'excel', 'pdf'
        ]
    });
});
  </script>


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Consultas expedientes</h1>
                </div>
                <div class="col-sm-6">
                   
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
               <div class="table-responsive" style="padding:15px;">
    <table class="table" id="expediente-consulta" >
        <thead>
        <tr>
            <th>Numero</th>
        <th>Año</th>
        <th>Caratula</th>
        <th>Circunscripcion</th>
        <th>Juzgado</th>
        <th>Clientes</th>
        <th>Ci</th>
        <th>Ciudad</th>
        <th>Fuero</th>
         <th>Estado</th>
        </tr>
        </thead>
        <tbody>
        @foreach($consulta_expediente as $expediente)
            <tr>
            <td>{{ $expediente->numero }}</td>
            <td>{{ $expediente->anho }}</td>
            <td>{{ $expediente->caratula }}</td>
            <td>{{ $expediente->circunscripcion->nombrecir ?? 'Circunscripcion no asignado'}}</td>
            <td>{{ $expediente->juzgado->nombrejuz ?? 'Juzgado no asignado'}}</td>
           <td> @foreach($expediente->clientes as $e)
            {{ $e->nombre}}
            @endforeach </td>
               <td> @foreach($expediente->clientes as $e)
            {{ $e->ci}}-
            @endforeach </td>
               <td> @foreach($expediente->clientes as $e)
            {{ $e->ciudad}}-
            @endforeach </td>
            <td>{{ $expediente->fuero->nombre_fuero ?? 'Fuero no asignado'}}</td>
            <td>@switch(true)
            @case($expediente->estado == 'Activo')
            <span class="badge badge-primary"> {{ $expediente->estado }} </span>
            @break
            @case($expediente->estado == 'Paralizado')
            <span class="badge badge-warning"> {{ $expediente->estado }} </span>
            @break
            @case($expediente->estado == 'Finalizado' )
            <span class="badge badge-danger"> {{ $expediente->estado }} </span>
            @break
            @endswitch</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Numero</th>
                <th>Año</th>
                <th>Caratula</th>
                <th>Circunscripcion</th>
                <th>Juzgado</th>
                <th>Clientes</th>
                <th>Ci</th>
                <th>Ciudad</th>
                <th>Fuero</th>
                 <th>Estado</th>
            </tr>
        </tfoot>
    </table>
</div>


                <div class="card-footer clearfix">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

