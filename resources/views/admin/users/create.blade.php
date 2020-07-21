@extends('admin.app')
@section('title') Usuarios @endsection
@section('content')

<script>
 
    var loadFile = function(event) {
        var output = document.getElementById('preview-img');
        output.src = URL.createObjectURL(event.target.files[0]);
        console.log(event.target.files[0].name);
        output.onload = function() {
        URL.revokeObjectURL(output.src) 
        }
    };
</script>

<div class="app-title">
        <div>
            <h1><i class="fa fa-user-plus"></i> Registrar usuario</h1>
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

<form action="{{route('users.store')}}" id="userForm" method="POST" enctype="multipart/form-data">
@csrf
<section>
    <div class="container">
       <div class="">
       <div class="row">
            <div class="col-lg-6">
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="title-input">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="title-input">Apellidos:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="title-input">email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                    <div class="form-group">
                            <label class="title-input">Genero:</label>
                                    <select class="custom-select select-input" style="font-size:18px; font-family: 'ManropeRegular';" id="genero" name="genero">
                                        <option selected disabled value="Seleccionar">Seleccionar</option>
                                        <option value="Hombre">Hombre</option>
                                        <option value="Mujer">Mujer</option>
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
                                            <label class="title-input">Password:</label>
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
                             <label class="title-input">Repite Password:</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-6">
                    <div class="col-md-8">
                        <div class="row justify-content-md-center">
                            <div class="col-md">
                                    <div class="form-group input-file">
                                        <label class="title-input">Imagen:</label>
                                        <img id="preview-img" class="img">
                                        <label class="fileContainer" style="text-align:center; color:#fff!important;">
                                            Cargar <i class="fa fa-upload" style="padding-left:5px; color:#fff;"></i>
                                            <input type="file" id="imagen" onchange="loadFile(event)" name="imagen"/>
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