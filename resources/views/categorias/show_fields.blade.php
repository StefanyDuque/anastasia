<!-- Id Categoria Field -->
<div class="form-group">
    {!! Form::label('id_categoria', 'Id Categoria:') !!}
    <p>{{ $categoria->id_categoria }}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $categoria->slug }}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $categoria->nombre }}</p>
</div>

<!-- Categoria Padre Field -->
<div class="form-group">
    {!! Form::label('categoria_padre', 'Categoria Padre:') !!}
    <p>{{ $categoria->categoria_padre }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $categoria->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $categoria->updated_at }}</p>
</div>

