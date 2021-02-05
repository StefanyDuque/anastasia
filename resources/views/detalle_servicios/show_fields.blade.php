<!-- Id Detalle Servicio Field -->
<div class="form-group">
    {!! Form::label('id_detalle_servicio', 'Id Detalle Servicio:') !!}
    <p>{{ $detalleServicio->id_detalle_servicio }}</p>
</div>

<!-- Id Servicio Field -->
<div class="form-group">
    {!! Form::label('id_servicio', 'Id Servicio:') !!}
    <p>{{ $detalleServicio->id_servicio }}</p>
</div>

<!-- Inicio Field -->
<div class="form-group">
    {!! Form::label('inicio', 'Inicio:') !!}
    <p>{{ $detalleServicio->inicio }}</p>
</div>

<!-- Fin Field -->
<div class="form-group">
    {!! Form::label('fin', 'Fin:') !!}
    <p>{{ $detalleServicio->fin }}</p>
</div>

<!-- Asesor Field -->
<div class="form-group">
    {!! Form::label('asesor', 'Asesor:') !!}
    <p>{{ $detalleServicio->asesor }}</p>
</div>

<!-- Cliente Field -->
<div class="form-group">
    {!! Form::label('cliente', 'Cliente:') !!}
    <p>{{ $detalleServicio->cliente }}</p>
</div>

<!-- Estatus Field -->
<div class="form-group">
    {!! Form::label('estatus', 'Estatus:') !!}
    <p>{{ $detalleServicio->estatus }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $detalleServicio->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $detalleServicio->updated_at }}</p>
</div>

