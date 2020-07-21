@extends('admin.app')
@section('title') Usuarios @endsection
@section('content')

<script>
 
    var loadFile = function(event) {
        var output = document.getElementById('preview-img');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
        URL.revokeObjectURL(output.src) 
        }
    };
</script>

<div class="app-title">
        <div>
            <h1><i class="fa fa-user-plus"></i> Editar usuario</h1>
        </div>
        <div>
            <button class="btn btn-input" type="submit" form="userForm">Guardar</button>
        </div>
</div>


@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<form action="{{route('users.update',[$user->id])}}" id="userForm" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<section>
    <div class="container">
       <div class="">
       <div class="row">
            <div class="col-lg-6">
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="title-input">Nombre:</label>
                            <input type="text" class="form-control" value="{{$user->name}}" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="title-input">Apellidos:</label>
                            <input type="text" class="form-control" value="{{$user->apellidos}}"  id="lastname" name="lastname">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="title-input">email:</label>
                            <input type="email" class="form-control" value="{{$user->email}}"  id="email" name="email" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group">
                            <label class="title-input">Genero:</label>
                                    <select class="custom-select select-input" style="font-size:18px; font-family: 'ManropeRegular';" id="genero" name="genero">
                                        <option selected disabled value="Seleccionar">Seleccionar</option>
                                        <option value="Hombre" {{$user->genero == 'Hombre' ? 'selected' : ''}}>Hombre</option>
                                        <option value="Mujer" {{$user->genero == 'Mujer' ? 'selected' : ''}}>Mujer</option>
                                    </select>
                        </div>
                                    

                                @error('genero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>
                    <div class="col-md-6">
                                    
                                    <div class="form-group">
                                            <label class="title-input">Contraseña:</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                             <label class="title-input">Repite contraseña:</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6 ">
                    <div class="col-md-12">
                        <div class="row justify-content-md-center">
                            <div class="col img-profile">
                                    <div class="form-group input-file">
                                        <label class="title-input">Imagen:</label>
                                        <img id="preview-img" class="img" src="{{asset('backend/img/users/'.$user->imagen)}}">
                                        <label class="fileContainer" style="text-align:center; color:#fff!important;">
                                            Cargar <i class="fa fa-upload" style="padding-left:5px; color:#fff;"></i>
                                            <input type="file" id="imagen" onchange="loadFile(event)" value="{{$user->imagen}}" name="imagen"/>
                                        </label>
                                    </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

       </div>
    </div>
</section>
</form>


@endsection