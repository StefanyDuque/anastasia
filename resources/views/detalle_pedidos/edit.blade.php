@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detalle Pedido
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($detallePedido, ['route' => ['detallePedidos.update', $detallePedido->id], 'method' => 'patch']) !!}

                        @include('detalle_pedidos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection