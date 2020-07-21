@extends('admin.app')
@section('title') Usuarios @endsection
@section('content')


<div class="app-title">
        <div>
            <h1><i class="fa fa-users"></i> Usuarios</h1>
        </div>
        <div>
        <a href="{{route('users.create')}}"><button class="btn btn-primary" type="button">Registrar</button></a>
            
        </div>
</div>

{{-- comentario--}}


@empty($users)
      <div class="vacio-layout">
              <h2>No hay datos para mostrar.</h2>
              <i class="fa fa-inbox"></i>
          </div>
        @else
  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Foto</th>  
          <th scope="col">Nombre</th>
          <th scope="col">Email</th>
          <th scope="col" style="width:80px">Registro</th>
          <th scope="col" style="width:80px">Modificacion</th>
          <th scope="col">Tipo</th>   
          <th scope="col">Acciones</th>   
        </tr>
      </thead>
        @foreach($users as $item)
      <tbody>
        <tr>
          <td><img style="width:80px;height:80px;" src="{{asset('backend/img/users/'.$item->imagen)}}"></td>
          <td>{{$item->name}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->created_at}}</td>
          <td>{{$item->updated_at}}</td>
          <td>
              @if($item->admin == 'true')
              <span class="badge badge-success">admin</span>
              @else
              <span class="badge badge-secondary">user</span>
              @endif
          </td>
            <td><div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" style="color:#fff;background-color:#212529;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-cog"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{route('users.edit',$item->id)}}">Editar</a>
                  <a class="dropdown-item" class="delete" id="{{$item->id}}" onclick='deleteUser(this.id)' href="#">Eliminar</a> 
                  <form action="{{route('users.destroy',$item->id)}}" style="display:none"  method="POST">
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