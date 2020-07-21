@extends('admin.app')
@section('title') Productos @endsection
@section('content')


<div class="app-title">
        <div>
            <h1><i class="fa fa-shopping-bag"></i> Productos</h1>
        </div>
        <div>
        <a href="{{route('productos.create')}}"><button class="btn btn-primary" type="button">Nuevo</button></a>
            
        </div>
</div>

{{-- comentario--}}


@empty($productos)
      <div class="vacio-layout">
              <h2>No hay datos para mostrar.</h2>
              <i class="fa fa-inbox"></i>
          </div>
        @else
  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Imagen</th>
          <th scope="col">Nombre</th>
          <th scope="col" style="width:80px">Precio</th>
          <th scope="col">Medida</th>
          <th scope="col" style="width:100px">U. Medida</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Marca</th>
          <th scope="col">Estatus</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
        @foreach($productos as $item)
      <tbody>
        <tr>
          <td><img style="width:100px;height:100px;" src="{{asset('backend/img-products/'.$item->imagen)}}"></td>
          <td>{{$item->nombre}}</td>
          <td><p>$ {{$item->precio}}</p></td>
          <td>{{$item->medida}}</td>
          <td>{{$item->unidad_medida}}</td>
          <td>{{$item->descripcion}}</td>
          <td>{{$item->marca}}</td>
          <td>{{$item->estatus}}</td>
            <td><div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" style="color:#fff;background-color:#212529;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cog"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{route('productos.edit',$item->id)}}">Editar</a>
                  <a class="dropdown-item" class="delete" id="{{$item->id}}" onclick='showAlert(this.id)' href="#">Eliminar</a> 
                  <form action="{{route('productos.destroy',$item->id)}}" style="display:none"  method="POST">
                  @csrf
                  @method('DELETE')
                  <button type ="submit" id="btn{{$item->id}}"  ></button>
                  </form> 
                </div>
              </div>
            </td>
        </tr>
      </tbody>
      @endforeach  
  </table>
  @endempty


@endsection