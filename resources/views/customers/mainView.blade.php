<!DOCTYPE html>
<head>
    <x-commonHeader>
        <x-slot name="tittle">
            Cliente - GamerProXela
        </x-slot>
    </x-commonHeader>
</head>

<body>

    <x-customer-nav-bar : address='{{$store != null ? $store->address : "seleccione una tienda" }}' />

    <div class="container-fluid" style="margin-top:110px">
        <div class="row">
            <div class="py-2 col-8" style="margin-left:90px">
                <div>
                    <div class="py-2">
                        <div class="card">
                            <div class="card-header">
                                <form action="../../controller/postController.php" method="POST">
                                    <div class="d-flex justify-content-between">
                                        <h2>Buscar productos</h2>
                                        <button type="submit" class="btn btn-success"><i class="bi bi-search"> </i>Buscar</button>
                                    </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control container-fluid" rows="5" name="desc" placeholder="Que estas buscando?"></textarea>
                            </div>
                            <div class="mx-2">
                                <strong> {{$store != null ?  $store->name : ""}}</strong>
                            </div>
                            </form>
                        </div>

                        <h1> </h1>

                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex flex-wrap align-cs-center">
                                    @foreach($inventary as $p)
                                    <div class="card" style="width:284px; height:275px; margin:5px">
                                        <div class="card-header">
                                            <h5>{{$p->name}}</h5>
                                        </div>
                                        <div class=" card-body">
                                            <p>{{$p->description}}</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex justify-content-between">
                                                <h5>Q. {{$p->public_price}}</h5>
                                                <form action="{{ route('cart.add', $p->uid) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bi bi-cart4"></i> <small>Agregar al carro</small></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    @endforeach
                                </div>
                            </div>

                            <div class="card-footer bg-white">
                                <ul class="pagination d-flex flex-wrap justify-content-center">
                                    <?php
                            for ($i = 1; $i <= $numtabs; $i++) {
                                if ($i == $table) {
                                    echo '<li class="page-c active"><a class="page-link">' . $i . '</a></li>';
                                } else {

                                    echo '<li class="page-c"><a class="page-link"
                                        href=' . request()->fullUrlWithQuery(['page' => $i]) .'>'
                                         . $i .  ' </a></li>';
                                }
                            }
                            ?>

                                </ul>
                            </div>

                        </div>

                    </div>

                </div>


            </div>

            <div class="col-3">
                <div class="fixed-div-right">
                    <h1>Carrito</h1>
                    <div class="card" style="height:650px">
                        @if($cart && count($cart) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $c)
                                <tr>
                                    <td>{{ $c['name'] }}</td>
                                    <td>{{ $c['quantity'] }}</td>
                                    <td>${{ $c['price'] }}</td>
                                    <td>${{ $c['price'] * $c['quantity'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <p>No hay productos en el carrito.</p>
                        @endif
                    </div>
                    <div class="mt-2 mx-2 d-flex justify-content-between">
                        <h5>Total:</h5>
                        <button type="submit" class="btn btn-sm btn-outline-primary disabled"><i class="bi bi-cart4"></i> <small>Comprar</small></button>
                    </div>
                </div><br>
            </div>
        </div>
    </div>

</body>

</html>
