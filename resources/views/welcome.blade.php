<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <x-commonHeader>
    </x-commonHeader>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Guerrilla&display=swap" rel="stylesheet">
</head>

<body>

    <div class="">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <h1><a class="text-decoration-none text-white" href="/"><i class="bi bi-gpu-card"></i> GPX</a></h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item" style="margin-left:25px">
                            <a class="nav-link active" href="#section1">Membresias</a>
                        </li>
                </div>
            </div>
        </nav>

        <main style="font-family: Protest Guerrilla sans-serif;">
            <div style="margin-top:72px">
                <div class="text-center" style=" width: 100%; height: 160px; background-image: url('https://i.etsystatic.com/34466454/r/il/8e83e4/3765942466/il_fullxfull.3765942466_f90y.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                    <p class="display-3 fw-normal text-white"> GamerProXela</p>
                </div>
            </div>
            <!-- Carousel -->
            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="5"></button>
                </div>

                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://scontent.fgua8-1.fna.fbcdn.net/v/t39.30808-6/460323716_18461969908044770_5189765665075892378_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=127cfc&_nc_ohc=Bz72ljPg-h0Q7kNvgE8axVH&_nc_ht=scontent.fgua8-1.fna&_nc_gid=AgeVf7G1mRRiDsRR3V-Rdpy&oh=00_AYCmq5e-bzANgbDe1olgPLx4ag0EPtJZ5Xgmfk_P6-ggYQ&oe=66F20BEB" alt="New York" class="d-block" style="width:100%; height:710px">
                    </div>
                    <div class="carousel-item">
                        <img src="https://scontent.fgua8-1.fna.fbcdn.net/v/t39.30808-6/460660181_18461969917044770_8485664799331576654_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=127cfc&_nc_ohc=2ApI54L-gewQ7kNvgGpMqut&_nc_ht=scontent.fgua8-1.fna&_nc_gid=A_gv-s771lHzrA4M_KnhRzC&oh=00_AYBoyPysFAav4t9eNXDKrgEne2xNiUJXbJgWYRHBLspy2Q&oe=66F214D2" alt="New York" class="d-block" style="width:100%; height:710px">
                    </div>
                    <div class="carousel-item">
                        <img src="https://scontent.fgua8-1.fna.fbcdn.net/v/t39.30808-6/460264187_18461969896044770_4185337305173228701_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=127cfc&_nc_ohc=UpBFCUgZGEEQ7kNvgEDryxK&_nc_ht=scontent.fgua8-1.fna&_nc_gid=Ayrz1CN4M_Ts-Jolw9qbje1&oh=00_AYC207Vew3LK3Kc1w6oCr_c6DF1fYpbbTaaJXESQlIvwyg&oe=66F2314E" alt="New York" class="d-block" style="width:100%; height:710px">
                    </div>
                    <div class="carousel-item">
                        <img src="https://intech.com.gt/sU/files/banner/66e867865fc78.jpg" alt="Los Angeles" class="d-block" style="width:100%; height:710px">
                    </div>
                    <div class="carousel-item">
                        <img src="https://intech.com.gt/sU/files/banner/6688915dc63f7.jpg" alt="Chicago" class="d-block" style="width:100%; height:710px">
                    </div>
                    <div class="carousel-item">
                        <img src="https://scontent.fgua8-1.fna.fbcdn.net/v/t31.18172-8/19095602_1476287595768099_3088006170418166250_o.png?_nc_cat=105&ccb=1-7&_nc_sid=b895b5&_nc_ohc=b2yyxFAt77cQ7kNvgG-tqT9&_nc_ht=scontent.fgua8-1.fna&_nc_gid=Aj9sgymeYSRsToGMbkIV1NV&oh=00_AYD4Y2i-KVZ5M7WneBGxr_WjPuHLrkaMmfatMuBVKwIx2w&oe=6713CEAF" alt="New York" class="d-block" style="width:100%; height:710px">
                    </div>
                </div>

                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>

            {{-- informative badge --}}
            <div id="section1" class="container-fluid mt-5 text-center">
                <h3>Carousel Example</h3>
                <p>The following example shows how to create a basic carousel with indicators and controls.</p>
            </div>


            {{-- members  --}}
            <div style="margin-bottom:150px">
                <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                    <h1 class="display-4">Pricing</h1>
                    <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
                </div>

                <div class="container">
                    <div class="card-deck row mb-3 text-center">
                        <div class=" col-4 ">
                            <div class="card mb-4 box-shadow">
                                <div class="card-header">
                                    <h4 class="my-0 display-2">Comun</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title h1 ">$0 <small class="text-muted">/ mo</small></h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>10 users included</li>
                                        <li>2 GB of storage</li>
                                        <li>Email support</li>
                                        <li>Help center access</li>
                                    </ul>
                                    <a type="button" class="btn btn-lg btn-block btn-outline-primary" href="/login">Sign up for free</a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-4 ">
                            <div class="card mb-4box-shadow">
                                <div class="card-header">
                                    <h4 class="my-0 display-2">Oro</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title h1 ">$15 <small class="text-muted">/ mo</small></h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>20 users included</li>
                                        <li>10 GB of storage</li>
                                        <li>Priority email support</li>
                                        <li>Help center access</li>
                                    </ul>
                                    <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
                                </div>
                            </div>
                        </div>

                        <div class=" col-4 ">
                            <div class="card mb-4 box-shadow">
                                <div class="card-header">
                                    <h4 class="my-0 display-2">Platino</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title h1 ">$29 <small class="text-muted">/ mo</small></h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>30 users included</li>
                                        <li>15 GB of storage</li>
                                        <li>Phone and email support</li>
                                        <li>Help center access</li>
                                    </ul>
                                    <button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{-- end members --}}
        </main>
        <x-commonFooter />
    </div>

</body>
</html>
