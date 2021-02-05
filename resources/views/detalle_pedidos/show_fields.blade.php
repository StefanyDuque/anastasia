<!-- Id Detalle Pedido Field -->
<div class="form-group">
    {!! Form::label('id_detalle_pedido', 'Id Detalle Pedido:') !!}
    <p>{{ $detallePedido->id_detalle_pedido }}</p>
</div>

<!-- Id Pedido Field -->
<div class="form-group">
    {!! Form::label('id_pedido', 'Id Pedido:') !!}
    <p>{{ $detallePedido->id_pedido }}</p>
</div>

<!-- Codigo Producto Field -->
<div class="form-group">
    {!! Form::label('codigo_producto', 'Codigo Producto:') !!}
    <p>{{ $detallePedido->codigo_producto }}</p>
</div>

<!-- Cantidad Field -->
<div class="form-group">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    <p>{{ $detallePedido->cantidad }}</p>
</div>

<!-- Fecha Field -->
<div class="form-group">
    {!! Form::label('fecha', 'Fecha:') !!}
    <p>{{ $detallePedido->fecha }}</p>
</div>

<!-- Vendedor Field -->
<div class="form-group">
    {!! Form::label('vendedor', 'Vendedor:') !!}
    <p>{{ $detallePedido->vendedor }}</p>
</div>

<!-- Descuento Field -->
<div class="form-group">
    {!! Form::label('descuento', 'Descuento:') !!}
    <p>{{ $detallePedido->descuento }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $detallePedido->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $detallePedido->updated_at }}</p>
</div>

