
<li class="nav-main-item">
    <div class="row">
        <div class="col-md-9">
            <a class="nav-main-link" href="{{route('vehiculo.index')}}">
                <i class="nav-main-link-icon fa fa-car"></i>
                {{--<i class="nav-main-link-icon si si-home"></i>--}}
                <span class="nav-main-link-name">{{--Tabla --}}Vehiculos</span>
            </a>
        </div>
        <div class="col-md-3 align-content-center">
            <a class="nav-main-link" href="{{route('vehiculo.create')}}">
                <span class="nav-main-link-name"><i class="fa fa-plus-circle"></i></span>
            </a>
        </div>
    </div>
</li>
<li class="nav-main-item">
    <div class="row">
        <div class="col-md-9">
            <a class="nav-main-link" href="{{route('estservvehi.index')}}">
                <i class="nav-main-link-icon si si-calculator"></i>
                <span class="nav-main-link-name">{{--Tabla --}}Estados Servicios Vehiculos</span>
            </a>
        </div>
        <div class="col-md-3 align-content-center">
            <a class="nav-main-link " href="{{route('estservvehi.create')}}">
                <span class="nav-main-link-name"><i class="fa fa-plus-circle"></i></span>
            </a>
        </div>
    </div>
</li>
{{--<li class="nav-main-item">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
        <i class="nav-main-link-icon si si-home"></i>
        <span class="nav-main-link-name">Informacion</span>
    </a>
    <ul class="nav-main-submenu">
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{route('vehiculo.index')}}">
                <span class="nav-main-link-name">Tabla Vehiculos</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{route('vehiculo.create')}}">
                <span class="nav-main-link-name">Form Registra nuevo Vehiculo</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-main-item">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
        <i class="nav-main-link-icon si si-calculator"></i>
        <span class="nav-main-link-name">Historial de Estados de Vehiculos</span>
    </a>
    <ul class="nav-main-submenu">
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{route('estservvehi.index')}}">
                <span class="nav-main-link-name">Tabla Estados Servicios Vehiculos</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="{{route('estservvehi.create')}}">
                <span class="nav-main-link-name">Form Registrar Cambio Estado</span>
            </a>
        </li>
    </ul>
</li>--}}
