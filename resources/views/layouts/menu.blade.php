<li class="hide {{ Request::is('generator_builder') ? 'active' : '' }}">
    <a href="/generator_builder"><i class="fa fa-edit"></i><span>API Generator</span></a>
</li>



<li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
    <a href="{{ route('usuarios.index') }}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>

<li class="{{ Request::is('servicios*') ? 'active' : '' }}">
    <a href="{{ route('servicios.index') }}"><i class="fa fa-edit"></i><span>Servicios</span></a>
</li>

<li class="{{ Request::is('detalleServicios*') ? 'active' : '' }}">
    <a href="{{ route('detalleServicios.index') }}"><i class="fa fa-edit"></i><span>Detalle Servicios</span></a>
</li>

<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{{ route('categorias.index') }}"><i class="fa fa-edit"></i><span>Categorias</span></a>
</li>

<li class="{{ Request::is('productos*') ? 'active' : '' }}">
    <a href="{{ route('productos.index') }}"><i class="fa fa-edit"></i><span>Productos</span></a>
</li>

<li class="{{ Request::is('pedidos*') ? 'active' : '' }}">
    <a href="{{ route('pedidos.index') }}"><i class="fa fa-edit"></i><span>Pedidos</span></a>
</li>

<li class="{{ Request::is('detallePedidos*') ? 'active' : '' }}">
    <a href="{{ route('detallePedidos.index') }}"><i class="fa fa-edit"></i><span>Detalle Pedidos</span></a>
</li>

