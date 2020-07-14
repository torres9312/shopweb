<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div class="profile">
            @if(Auth::user()->imagen == '')
            <img class="app-sidebar_profile" src="{{asset(Auth::user()->genero == 'male' ? 'backend/img/male.png' : 'backend/img/female.png')}}" style="width:150px;height:150px" alt="">
            @else
            <img class="app-sidebar_profile" src="{{asset('backend/img/users/'.Auth::user()->imagen)}}" style="width:150px;height:150px" alt="">
            @endif
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
                <span class="app-menu__label">Users</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Admin Users</a>
                </li>
                <li>
                    <a class="treeview-item" href="#" target="_blank" rel="noopener noreferrer"><i class="icon fa fa-circle-o"></i> Roles</a>
                </li>
                <li>
                    <a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i> Permissions</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{route('productos.index')}}"><i class="app-menu__icon fa fa-shopping-bag"></i>
                <span class="app-menu__label">Productos</span>
            </a>
        </li>
    </ul>
</aside>