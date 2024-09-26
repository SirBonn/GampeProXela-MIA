@props(['address' => 'seleccione una tienda'])
<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <!-- Logo and Navbar Toggler -->
        <div class="d-flex align-items-center p-2">
            <h1 class="m-0">
                <a class="text-decoration-none text-white" href="/">
                    <i class="bi bi-gpu-card"></i> GPX
                </a>
            </h1>
        </div>

        <!-- Flex items -->
        <div class="d-flex">
            <div class="p-2">
                <form action="{{route('products.byStoreView')}}" method="GET">
                    <div class="input-group mt-1">
                        <select name="store_id" id="store_id" class="form-select" style="width:350px">
                            <option value="0" selected>Todas las tiendas</option>
                            @foreach($stores as $s)
                            <option value="{{$s->uid}}">{{$s->address}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-outline-success text-white" type="submit"><i class="bi bi-arrow-right"></i></button>
                    </div>
                </form>
            </div>
            <div class="p-2 dropdown">
                <button type="button" class="btn btn-lg btn-outline-primary dropdown-toggle text-white" data-bs-toggle="dropdown">
                    <i class="bi bi-person"></i>
                    @if (session()->has('user'))
                    {{ session()->get('user')->username }}
                    @endif
                </button>
                <ul class="dropdown-menu dropdown-menu-end position-absolute">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-window-plus"> </i>Adquirir membresia</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-clipboard"> </i>Ver mis compras</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-person-gear"> </i>Ver Perfil</a></li>
                    <li><a class="dropdown-item" href="/logout"><i class="bi bi-arrow-bar-left"> </i>Cerrar sesion</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
