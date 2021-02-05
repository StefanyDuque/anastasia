<!-- Id Pedido Field -->
<div class="form-group">
    {!! Form::label('id_pedido', 'Id Pedido:') !!}
    <p>{{ $pedido->id_pedido }}</p>
</div>

<!-- Fecha Field -->
<div class="form-group">
    {!! Form::label('fecha', 'Fecha:') !!}
    <p>{{ $pedido->fecha }}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{{ $pedido->direccion }}</p>
</div>

<!-- Fecha Envio Field -->
<div class="form-group">
    {!! Form::label('fecha_envio', 'Fecha Envio:') !!}
    <p>{{ $pedido->fecha_envio }}</p>
</div>

<!-- Comprador Field -->
<div class="form-group">
    {!! Form::label('comprador', 'Comprador:') !!}
    <p>{{ $pedido->comprador }}</p>
</div>

<!-- Estatus Field -->
<div class="form-group">
    {!! Form::label('estatus', 'Estatus:') !!}
    <p>{{ $pedido->estatus }}</p>
</div>

<!-- Items Field -->
<div class="form-group">
    {!! Form::label('items', 'Items:') !!}
    <p>{{ $pedido->items }}</p>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $pedido->total }}</p>
</div>

