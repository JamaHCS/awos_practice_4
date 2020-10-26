@extends('layout')

@section('content')
<h4>Crear oferta</h4>
<a href="{{ route('index') }}" class="btn btn-danger ml-auto"><i class="fas fa-angle-double-left mr-1"></i> Regresar</a>

</div>
<form method="POST" action="{{ route('store') }}" class="mt-5">
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="product_id">Producto:</label>
      <select id="product_id" class="form-control" name="product_id" required>
        <option>Selecciona...</option>
        @foreach ($products as $product)
        <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="type_product">Tipo de producto:</label>
      <input type="text" name="type_product" id="type_product" class="form-control" disabled>
    </div>
    <div class="form-group col-md-2">
      <label for="price">Precio: </label>
      <input type="number" name="price" id="price" class="form-control" required>
    </div>
    <div class="form-group col-md-2">
      <label for="existence">Existencia</label>
      <input type="number" name="existence" id="existence" class="form-control" required>
    </div>
    <div class="form-group d-flex col-md-2">
      <div class="form-check my-auto mx-md-auto">
        <input class="form-check-input" type="checkbox" value="1" id="vigence" name="vigence">
        <label class="form-check-label" for="vigence">
          Vigente
        </label>
      </div>
    </div>
  </div>
  @csrf
  <button type="submit" class="btn btn-primary">Agregar oferta</button>
</form>
<div class="row">
  @endsection
