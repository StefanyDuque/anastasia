@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detalle Servicio
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('detalle_servicios.show_fields')
                    <a href="{{ route('detalleServicios.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
