<!DOCTYPE html>
<head>
    <x-commonHeader>
        <x-slot name="tittle">
            Login - GamerProXela
        </x-slot>
    </x-commonHeader>
</head>

<body>

    <x-logInNav />

    <div>
        <div class="d-flex justify-content-center" style="margin-top:100px">
            <div class="card" style="height:500px; width:400px">
                <div class="card-header bg-secondary h1 text-white">Login</div>
                <div class="card-body">

                        <div class="justify-center">
                            <form action="{{route('login.store')}}" method="POST">
                                @csrf
                                <div class="input-group py-4">
                                    <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                    @error('username') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="input-group py-4">
                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                        </div>
                </div>
                <a class="m-3" href="/forget">Olvidaste la contraseña?...</a>
                <div class="card-footer bg-white">
                    <div class="d-flex flex-row-reverse">
                        <div class="p-2">
                            <a href="/" class="btn btn-lg btn-outline-danger"><i class="bi bi-backspace-fill"></i> Cancelar</a>
                            <button type="submit" class="btn btn-lg btn-outline-success"><i class="bi bi-arrow-right-square-fill"></i> Ingresar</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>

    <div class="fixed-bottom">
        <x-commonFooter />
    </div>

</body>

</html>
