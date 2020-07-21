<nav>
        <div class="head-navbar">
            <div class="container">
                <div class="row pt-3 pb-2">
                    <div class="col-3"><img style="width:200px;height:90%;"src="{{asset('frontend/images/logo-tool.png')}}" alt=""></div>
                    <div class="col-6 align-content">
                        <div class="input-group mb-3">
                            <input type="search" class="form-control" id="search" value="" placeholder="Buscar" aria-label="Buscar" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary btn-browse" type="button" onclick="" id="button-addon2"><i class="fa fa-search" style="font-size:20px"></i></button>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-3 nav-cart">
                        <div class="row">
                                @guest
                                            <a class="nav-link"  href="{{ route('login') }}">{{ __('Login') }}</a>
                                @if (Route::has('register'))
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                                @else
                                <div class="dropdown">
                                            <a  class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>
                                            <div class="dropdown-menu btn-sesion" aria-labelledby="dropdownMenuButton">
                                            @if (Auth::user()->admin == 'true')
                                                <a class="dropdown-item" class="dropdown-menu drop-box" aria-labelledby="dropdownMenuButton" href="{{ route('dashboard.index') }}"> <i class="fa fa-cog"></i>Panel Admin</a>
                                            @endif  
                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                                                </a>
                                            </div>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                @endguest
                            
                            <a href="#" class="nav-item-head"><i style="font-size:20px" class="fa fa-shopping-cart"></i><a style="font-size: 12px; color:#fff" class="badge badge-dark">0</a></a>
                        </div>
                    </div> 
                </div>
            </div>  
        </div>

                <div class="navbar-menu">
                    <div class="container">
                            <div class="dropdown">
                                <button class="btn-drop dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Categorias
                                </button>
                                <div class="dropdown-menu category-items" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Cementos</a>
                                    <a class="dropdown-item" href="#">Herramientas</a>
                                    <a class="dropdown-item" href="#">Material</a>
                                </div>
                            </div>
                    </div>
                </div>
    </nav>

