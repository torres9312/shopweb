<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div class="profile">
            <img class="app-sidebar_profile" src="{{asset('backend/img/users/'.Auth::user()->imagen)}}" style="width:150px;height:150px" alt="">
            <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
            <p class="app-sidebar__user-designation">Administrador</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="{{route('dashboard.index')}}"><i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label">Usuarios</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{route('users.index')}}"><i class="icon fa fa-circle-o"></i> Administrar</a>
                </li>
                <li>
                    <a class="treeview-item" href="#" ><i class="icon fa fa-circle-o"></i> Permisos</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Ajustes</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{route('productos.index')}}"><i class="app-menu__icon fa fa-shopping-bag"></i>
                <span class="app-menu__label">Productos</span>
            </a>
        </li>
    </ul>
</aside>