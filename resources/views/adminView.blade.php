<!DOCTYPE html>
<head>
    <x-commonHeader>
        <x-slot name="tittle">
            Administrative - GamerProXela
        </x-slot>
    </x-commonHeader>
</head>

<body class="body-admin">

    <x-common-nav-bar />


    <div style="margin-top:100px">

        <div class="d-flex justify-items-end m-3">
            <div class="col-3">
                <div class="fixadmin-div-right">
                    <div class="card">
                        <div class="card-header">
                            <div class=" d-flex justify-content-between">
                                <h3>Tiendas</h3>
                                <a type="button" class="btn btn-outline-dark" style="width:100px" href="/admin/show-stores" id="showStores">Mostrar</a>
                            </div>
                        </div>
                        <div class="list-group">
                            <a href class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#newStore">Agregar Tienda</a>
                            <a href class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#editStore">Editar Tienda</a>
                        </div>
                        <div class="card-header">
                            <div class=" d-flex justify-content-between">
                                <h3>Asociados</h3>
                                <a type="button" class="btn btn-outline-dark" style="width:100px" href="/admin/show-customers" id="showMembers">Mostrar</a>
                            </div>
                        </div>
                        <div class="list-group">
                            <a href class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#updateMembership">Actualizar Membresias</a>
                            <a href class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#newMembership">Nueva Membresia</a>
                        </div>
                        <div class="card-header">
                            <div class=" d-flex justify-content-between">
                                <h2>Empleados</h2>
                                <a type="button" class="btn btn-outline-dark" style="width:100px" href="/admin/show-employers" id="showEmployees">Mostrar</a>
                            </div>
                        </div>
                        <!-- Hover added -->
                        <div class="list-group">
                            <a href class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#newEmployeer">Agregar nuevo Empleado</a>
                            <a href class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#disableEmployee">Deshabilitar Empleado</a>
                            <a href class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#editEmployee">Editar Empleado</a>
                        </div>
                        <div class="card-header">
                            <div class=" d-flex justify-content-between">
                                <h3>Productos</h3>
                                <a type="button" class="btn btn-outline-dark" style="width:100px" href="/admin/show-products" id="showProducts">Mostrar</a>
                            </div>
                        </div>
                        <div class="card-header">
                            <div class=" d-flex justify-content-between">
                                <h2>Reportes</h2>
                            </div>
                        </div>
                        <!-- Hover added -->
                        <div class="list-group">
                            <a href class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#top10Sales">10 ventas mas grandes</a>
                            <a href class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#topStores">Mejores sucursales</a>
                            <a href class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#topProducts">Articulos mas vendidos</a>
                            <a href class="list-group-item list-group-item-action" data-bs-toggle="modal" data-bs-target="#topCustomers">Mejores clientes</a>
                        </div>
                    </div><br>
                </div>

            </div>
            <div class="col-6">
                <div class="mx-3 mb-3">
                    <form action="{{ route('admin.search') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="{{ $type }}">
                        <div class="d-flex justify-content-between">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar">
                                <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h2>{{$type}}</h2>
                    </div>

                    <div class="table-responsive" style="height: 700px; overflow-y: scroll;">
                        @foreach($list as $l)
                        <div class="card m-1">
                            <div class="card-header d-flex justify-content-between">
                                ID: #{{$l->uid}}
                                <a class="btn btn-outline-dark" type="button" {{--href="/amdin/show?id={{$l->uid}}"--}}><i class="bi bi-search"> </i></a>
                            </div>
                            <div class="card-body">
                                Nombre: {{$l->name}}

                                @if($l instanceof \App\Models\Store)
                                <br>Ubicacion: {{$l->address}}
                                <br>Telefono: {{$l->phone}}
                                @elseif($l instanceof \App\Models\Product)
                                <br>Descripcion: {{$l->description}}
                                <div class="d-flex justify-content-between">
                                    <p>Precio: Q.{{$l->public_price}}</p>
                                    <p class="mx-5">Stock: {{$l->quantity}}</p>
                                </div>
                                @elseif($l instanceof \App\Models\Customer)
                                <br>DPI: {{$l->dpi}}
                                <br>NIT: {{$l->nit}}
                                <br>Direccion: {{$l->address}}
                                <br>Membresia: {{$l->card}}
                                @elseif($l instanceof \App\Models\Employee)
                                <br>DPI: {{$l->user_dpi}}
                                <br>Tienda: {{$l->store->name}}
                                <br>Nacimiento: {{$l->birthday}}
                                @else
                                <p>else name</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>

    </div>

    <x-administrative-modals />

</body>
</html>
