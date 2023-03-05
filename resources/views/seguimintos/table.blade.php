<div class="table-responsive">
    <table class="table" id="seguimintos-table">
        <thead>
        <tr>
            <th>Descripcion</th>
        <th>Fecha</th>
            <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($seguimintos as $seguiminto)
            <tr>
                <td>{{ $seguiminto->descripcion }}</td>
            <td>{{ $seguiminto->fecha }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['seguimintos.destroy', $seguiminto->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('seguimintos.show', [$seguiminto->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('seguimintos.edit', [$seguiminto->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
