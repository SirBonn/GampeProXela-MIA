<!DOCTYPE html>
<head>
    <x-commonHeader>
        <x-slot name="tittle">
            Asociarse - GamerProXela
        </x-slot>
    </x-commonHeader>
    <head>

    <body>

        <x-logInNav />

        <div>
            <div class="row" style="margin-top:100px">
                <div class="col-3">
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header bg-secondary h1 text-white">Nuevo Asociado</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1">
                                </div>
                                <div class="col-10">
                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif

                                    @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    <form action="{{route('users.store')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col py-4">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="bi bi-person-vcard-fill"></i></span>
                                                    <input type="number" class="number-decoration-none form-control" placeholder="DPI" name="DPI">
                                                </div>
                                                @error('DPI') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                            <div class="col py-4">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="bi bi-card-heading"></i></span>
                                                    <input type="number" class="form-control" placeholder="NIT" name="nit">
                                                </div>
                                                @error('nit') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>
                                        <div class="py-4">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-house-door-fill"></i></span>
                                                <input type="text" class="form-control" placeholder="direccion" name="address">
                                            </div>
                                            @error('address') <p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                        <div class="py-4">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-pencil-fill"></i></span>
                                                <input type="text" class="form-control" placeholder="Nombre" name="names">
                                            </div>
                                            @error('names') <p class="text-danger">{{ $message }}</p> @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col py-4">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                                </div>
                                                @error('username') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                            <div class="col py-4">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                                </div>
                                                @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                                            </div>
                                        </div>
                                        <div class="input-group mt-3">
                                            <a class="" href="/#">Olvidaste la contraseña?...</a>
                                        </div>
                                </div>
                                <div class="col-1">
                                </div>
                            </div>
                        </div>
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
                <div class="col-3">
                </div>
            </div>
        </div>

        <div class="fixed-bottom">
            <x-commonFooter />
        </div>

    </body>

    </html>
