  <div class="table-responsive" style="padding:15px;">
    <table class="table" id="myTable">
        <thead>
        <tr>
            <th>Nombre Fuero</th>
        <th>Descripcion Fuero</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fueros as $fuero)
            <tr>
                <td>{{ $fuero->nombre_fuero }}</td>
            <td>{{ $fuero->descripcion_fuero }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['fueros.destroy', $fuero->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('fueros.show', [$fuero->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('fueros.edit', [$fuero->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
