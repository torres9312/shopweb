@extends('admin.app')
@section('title') Productos @endsection
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
            <h1><i class="fa fa-shopping-bag"></i> Nuevo Producto</h1>
        </div>
        <div>
            <button class="btn btn-input" type="submit" form="productForm">Guardar</button>
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

<form action="{{route('productos.store')}}" id="productForm" method="POST" enctype="multipart/form-data">
@csrf
        <div class="container">
                <div class="row">
                    <div class="col-md-9">
                            <div class="row justify-content-md-center">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="title-input">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="title-input">Marca:</label>
                                    <input type="text" class="form-control" id="marca" name="marca">
                                </div>
                            </div> 
                        </div>

                        <div class="row justify-content-md-center">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="title-input">Precio:</label>
                                        <label class="form-control price"><strong>$</strong><input type="number" class="input-number price-input" min="1.00" step="0.01" name="precio" id="precio"></label>  
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="title-input">En stock:</label>
                                        <input type="number" class="form-control input-number" name="stock" id="stock">
                                    </div>
                                </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                    <label class="title-input">Estatus:</label>
                                    <select class="custom-select select-input" id="estatus" name="estatus">
                                        <option selected disabled value="Seleccionar">Seleccionar</option>
                                        <option value="Activado">Activado</option>
                                        <option value="Desactivado">Desactivado</option>
                                    </select>
                                </div>         
                            </div> 
                        </div>

                        <div class="row justify-content-md-center">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="title-input">Medida:</label>
                                    <input type="number" class="form-control input-number" id="medida" name="medida">
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="title-input">Unidad de medida:</label>
                                    <select class="custom-select select-input" id="unidadmedida" name="unidadmedida">
                                        <option selected disabled value="Seleccionar">Seleccionar</option>
                                        <option value="gramos">gramos</option>
                                        <option value="pulgadas">pulgadas</option>
                                        <option value="kilogramos">kg</option>
                                        <option value="centimetros">cm</option>
                                        <option value="pieza">pieza</option> 
                                        <option value="toneladas">toneladas</option> 
                                        <option value="metros">m</option> 
                                    </select>
                                </div>
                            </div> 
                            <div class="col-md-4">

                            </div> 
                        </div>

                        <div class="row justify-content-md-center">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="title-input">Descripcion:</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
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
</form>





@endsection