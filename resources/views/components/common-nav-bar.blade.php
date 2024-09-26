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
            <div class="p-2 dropdown">
                <button type="button" class="btn btn-lg btn-outline-primary dropdown-toggle text-white" data-bs-toggle="dropdown">
                    <i class="bi bi-person"></i>
                    @if (session()->has('user'))
                    {{ session()->get('user')->username }}
                    @endif
                </button>
                <ul class="dropdown-menu dropdown-menu-end position-absolute">
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
