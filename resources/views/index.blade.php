@extends('layout')

@section('content')
<h4>Promociones</h4>
<a href="{{ route('create') }}" class="btn btn-primary ml-auto">Agregar promoción</a>
<table class="table mt-4">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Tipo</th>
      <th scope="col">Precio</th>
      <th scope="col">Existencia</th>
      <th scope="col">Vigencia</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($offers as $offer)
    <tr>
      <th scope="row">{{ $offer->id }}</th>
      <td>{{ $offer->product()->get()[0]->name }}</td>
      <td>{{ $offer->product()->get()[0]->typeProduct()->get()[0]->description }}</td>
      <td>{{ $offer->price }}</td>
      <td>{{ $offer->existence }}</td>
      @if($offer->vigence == 1)
      <td><i class="fas fa-check"></i></td>
      @else
      <td><i class="fas fa-times"></i></td>
      @endif
      <td> <a class="btn btn-warning" href="{{ route('edit', $offer->id) }}">Editar</a> </td>
      <td>
        <form action="{{ route('destroy', $offer) }}" method="POST">
          @method('DELETE')
          @csrf
          <button class="btn btn-danger" type="submit">Eliminar</button>
        </form>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>

@endsection
