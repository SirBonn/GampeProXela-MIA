{{-- storeModals --}}

<div class="modal fade" id="newStore" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Agregar Tienda
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    @csrf
                    <form action="{{route('stores.store')}}" method="POST" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="name" class="form-label">Store Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="invalid-feedback">Campo requerido.</div>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                            <div class="invalid-feedback">Campo requerido.</div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                            <div class="invalid-feedback">Campo requerido.</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Agregar Sucursal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editStore" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    editStore
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- membershipModals --}}

<div class="modal fade" id="updateMembership" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    updateMembership
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <select name="membership" id="membership" class="form-select" required>
                        <option value="" selected disabled>Membership</option>
                        @foreach ($memberships as $membership)
                        <option value="{{ $membership->uid }}">{{ $membership->name }}</option>
                        @endforeach
                    </select>
                    @csrf
                    <form action="{{--route('memberships.update')--}}" method="POST" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nuevo Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="invalid-feedback">Este campo es requerido.</div>

                        </div>

                        <div class="mb-3">
                            <label for="off_percent" class="form-label">Ganancia cada 200:</label>
                            <input type="number" class="form-control" id="off_percent" name="off_percent" min="0" max="100" required>
                            <div class="invalid-feedback">Este campo es requerido.</div>

                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar Membership</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="newMembership" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    newMembership
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
                <div class="container-fluid">
                    @csrf
                    <form action="{{--route('membership.store')--}}" method="POST" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label for="name" class="form-label">Membership Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="invalid-feedback">Este campo es requerido.</div>
                        </div>

                        <div class="mb-3">
                            <label for="off_percent" class="form-label">Discount Percentage</label>
                            <input type="number" class="form-control" id="off_percent" name="off_percent" min="0" max="100" required>
                            <div class="invalid-feedback">Este campo es requerido.</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Agregar Membership</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- employeeModals -->
<div class="modal fade" id="newEmployeer" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Agregar Empleado
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">{{-- -------------------------------------------------------------------- --}}

                    @csrf
                    <form action="{{--route('users.store')--}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="user_dpi" class="form-label">User DPI</label>
                            <input type="number" class="form-control" id="user_dpi" name="user_dpi" required>
                            <div class="invalid-feedback">User DPI is required.</div>
                        </div>

                        <div class="mb-3">
                            <label for="store_employe" class="form-label">Store ID</label>
                            <select name="role" id="role" class="form-select m-2" required>
                                <option value="" selected disabled>Store</option>
                                @foreach ($stores as $s)
                                <option value="{{ $s->uid }}">{{ $s->name}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Store ID is required.</div>
                        </div>
                        <div class="mb-3">
                            <select name="role" id="role" class="form-select m-2" required>
                                <option value="" selected disabled>Employer</option>
                                @foreach ($roles as $r)
                                <option value="{{ $r->uid }}">{{ $r->rolname}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">ROL is required.</div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="invalid-feedback">First name is required.</div>
                        </div>

                        <div class="mb-3">
                            <label for="forename" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="forename" name="forename" required>
                            <div class="invalid-feedback">Last name is required.</div>
                        </div>

                        <div class="mb-3">
                            <label for="no_cashr" class="form-label">Cash Register Number</label>
                            <input type="number" class="form-control" id="no_cashr" name="no_cashr" required>
                            <div class="invalid-feedback">Cash register number is required.</div>
                        </div>

                        <div class="mb-3">
                            <label for="birthday" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday" required>
                            <div class="invalid-feedback">Birthday is required.</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Agregar Empleado</button>
                    </form>

                    {{-- -------------------------------------------------------------------- --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="disableEmployee" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    disableEmployee
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    @csrf
                    <form action="{{--route('employeers.destroy')--}}" method="">
                        <div class="mb-3">
                            <label for="" class="form-label">Empleado:</label>
                            <select class="form-select form-select-lg" name="" id="">
                                @foreach ($employers as $employer)
                                <option value="{{ $employer->uid }}">{{ $employer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-danger">Deshabilitar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editEmployee" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    editEmployee
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">Add rows here</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- reports modals --}}


<div class="modal fade" id="top10Sales" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Mejores ventas
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="card m-1">
                        <table class="table table-striped-columns">
                            <thead>
                                <tr>
                                    <th>ID Venta</th>
                                    <th>Total</th>
                                    <th>Fecha de Venta</th>
                                    <th>Cliente</th>
                                    <th>NIT</th>
                                    <th>Tienda</th>
                                    <th>Dirección de Tienda</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topSales as $sale)
                                <tr>
                                    <td>{{ $sale->uid }}</td>
                                    <td>{{ $sale->total }}</td>
                                    <td>{{ $sale->sale_date }}</td>
                                    <td>{{ $sale->customer->nit }}</td>
                                    <td>{{ $sale->customer->name}}</td>
                                    <td>{{ $sale->store->name }}</td>
                                    <td>{{ $sale->store->address}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="topStores" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Mejores sucursales
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <table class="table table-striped-columns">
                        <thead>
                            <tr>
                                <th>ID Tienda</th>
                                <th>Tienda</th>
                                <th>Dirección de Tienda</th>
                                <th>Total Vendido</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topstores as $t)
                            <tr>
                                <td>{{ $t->store_uid }}</td>
                                <td>{{ $t->store->name }}</td>
                                <td>{{ $t->store->address }}</td>
                                <td>{{ $t->total_sales }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="topProducts" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Productos mas vendidos
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <table class="table table-striped-columns">
                        <thead>
                            <tr>
                                <th>ID Producto</th>
                                <th>Producto</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Total Vendido</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topProducts as $p)
                            <tr>
                                <td>{{ $p->uid }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->description }}</td>
                                <td>{{ $p->public_price }}</td>
                                <td>{{ $p->quantity }}</td>
                                <td>{{ $p->total_sold }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="topCustomers" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Mejores Clientes
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <table class="table table-striped-columns">
                        <thead>
                            <tr>
                                <th>ID Cliente</th>
                                <th>Cliente</th>
                                <th>DPI</th>
                                <th>NIT</th>
                                <th>Dirección</th>
                                <th>Total Comprado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topCustomers as $c)
                            <tr>
                                <td>{{ $c->uid }}</td>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->dpi }}</td>
                                <td>{{ $c->nit }}</td>
                                <td>{{ $c->address }}</td>
                                <td>{{ $c->total_spent }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
