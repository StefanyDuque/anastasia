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

<!-- Direccion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::textarea('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Envio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_envio', 'Fecha Envio:') !!}
    {!! Form::text('fecha_envio', null, ['class' => 'form-control','id'=>'fecha_envio']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fecha_envio').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Comprador Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comprador', 'Comprador:') !!}
    {!! Form::number('comprador', null, ['class' => 'form-control']) !!}
</div>

<!-- Estatus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatus', 'Estatus:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('estatus', 0) !!}
        {!! Form::checkbox('estatus', '1', null) !!}
    </label>
</div>


<!-- Items Field -->
<div class="form-group col-sm-6">
    {!! Form::label('items', 'Items:') !!}
    {!! Form::number('items', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('pedidos.index') }}" class="btn btn-default">Cancel</a>
</div>
