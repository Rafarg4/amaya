<div class="table-responsive">
      <table class="table" id="myTable2">
        <thead>
        <tr>
            <th>Descripcion</th>
        <th>Fecha</th>
            <th >Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($seguimientos as $seguiminto)
            <tr>
                <td>{{ $seguiminto->descripcion }}</td>
            <td>{{ $seguiminto->fecha }}</td>
                <td width="120">
                  {!! Form::open(['route' => ['seguimintos.destroy',['seguiminto'=>$seguiminto->id,'id_expediente'=>$seguiminto->id_expediente]], 'method' => 'delete']) !!}
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
