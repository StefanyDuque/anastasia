<!-- Id Servicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_servicio', 'Id Servicio:') !!}
    {!! Form::number('id_servicio', null, ['class' => 'form-control']) !!}
</div>

<!-- Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inicio', 'Inicio:') !!}
    {!! Form::text('inicio', null, ['class' => 'form-control','id'=>'inicio']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#inicio').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fin', 'Fin:') !!}
    {!! Form::text('fin', null, ['class' => 'form-control','id'=>'fin']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#fin').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Asesor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asesor', 'Asesor:') !!}
    {!! Form::number('asesor', null, ['class' => 'form-control']) !!}
</div>

<!-- Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente', 'Cliente:') !!}
    {!! Form::number('cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Estatus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estatus', 'Estatus:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('estatus', 0) !!}
        {!! Form::checkbox('estatus', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('detalleServicios.index') }}" class="btn btn-default">Cancel</a>
</div>
