<!-- Id Pedido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_pedido', 'Id Pedido:') !!}
    {!! Form::number('id_pedido', null, ['class' => 'form-control']) !!}
</div>

<!-- Codigo Producto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo_producto', 'Codigo Producto:') !!}
    {!! Form::number('codigo_producto', null, ['class' => 'form-control']) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::number('cantidad', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::text('fecha', null, ['class' => 'form-control','id'=>'fecha']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Vendedor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vendedor', 'Vendedor:') !!}
    {!! Form::number('vendedor', null, ['class' => 'form-control']) !!}
</div>

<!-- Descuento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descuento', 'Descuento:') !!}
    {!! Form::number('descuento', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('detallePedidos.index') }}" class="btn btn-default">Cancel</a>
</div>
