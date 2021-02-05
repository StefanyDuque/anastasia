<div class="table-responsive">
    <table class="table" id="detallePedidos-table">
        <thead>
            <tr>
                
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($detallePedidos as $detallePedido)
            <tr>
                
                <td>
                    {!! Form::open(['route' => ['detallePedidos.destroy', $detallePedido->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('detallePedidos.show', [$detallePedido->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('detallePedidos.edit', [$detallePedido->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
