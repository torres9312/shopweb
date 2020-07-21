@extends('frontend.app')
@section('content')

        <!-- SLIDER -->
                    <section class="demo_wrapper" style="padding-top:98px">
                    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="{{asset('frontend/images/image-1.jpg')}}" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                            <img src="{{asset('frontend/images/image-2.jpg')}}" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                            <img src="{{asset('frontend/images/image-4.jpg')}}" class="d-block w-100" alt="">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                        </div>
                    </section>      
    <!-- ENDSLIDER -->

    <!-- CATEGORY -->
    <section>
        <div class="container category-section">
        <div class="title-section">
            <h1>Categorias</h1>
        </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="box-category box1">
                        <img src="{{asset('frontend/images/materials.png')}}" alt="">
                        <div class="info-category">
                            <h3>Materiales</h3>
                            <button class="button-active">Ver catalogo</button>
                        </div>
                    </div>    
                </div>
                <div class="col-lg-4">
                    <div class="box-category box2">
                        <img src="{{asset('frontend/images/tools.png')}}" alt="">
                        <div class="info-category">      
                            <h3>Herramientas</h3>
                            <button class="button-active">Ver catalogo</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box-category box3">
                        <img src="{{asset('frontend/images/article.png')}}" alt="">
                        <div class="info-category">
                            <h3>Para el Hogar</h3>
                            <button class="button-active">Ver catalogo</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ENDCATEGORY -->


    <div class="container">
        <div class="title-section">
            <h1>Nuestros Productos</h1>
        </div>
        <div class="catalogo">
            <div class="row">
            @foreach($productos as $item)
                <div class="col-md-3 catalogo-item">
                        <div class="card card-item" >
                                <img src="{{asset('backend/img-products/'.$item->imagen)}}" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{$item->nombre}}</h5>
                                    <div style="height:45px">
                                    <p class="card-text">{{substr($item->descripcion, 0, 36)}}</p>
                                    </div>
                                    <p class="card-text" style="font-size: 20px"><strong>$ {{$item->precio}}</strong></p>
                                    <div style="text-align:center">
                                        <div class="input-group input-count mb-3">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-sumary" type="button" onclick="decrement({{$item->id}})" id="button-addon2"><strong>-</strong></button>
                                            </div>
                                            <input type="number" id="inputcount{{$item->id}}" name="cantidad" min="1" step="1" class="form-control" style="font-size:16px; height:40px; text-align:center" placeholder="Cantidad" aria-label="Cantidad" aria-describedby="button-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-sumary" type="button" onclick="increment({{$item->id}})" id="button-addon2"><strong>+</strong></button>
                                            </div>
                                        </div>
                                    <a href="#" class="btn btn-primary btn-block">Agregar al carrito</a>
                                    </div>  
                                </div>
                        </div>
                </div>  
            @endforeach              
            </div>
        </div>
    </div>
    @include('frontend.components.footer')
@endsection

