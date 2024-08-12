<?php
$session = session();
$nombre = $session->get('nombre');
$perfil = $session->get('perfil_id');

// Determina la imagen según el perfil
$imagen_perfil = ($perfil == 1) ? 'admin.png' : (($perfil == 2) ? 'cliente.png' : '');
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="navbar-header d-flex align-items-center">
            <a class="navbar-brand me-auto barra" href="<?php echo base_url('principal'); ?>">
                <!-- Logo de la empresa -->
                <img src="<?php echo base_url('assets/img/logonav.png'); ?>" alt="logo" width="75" height="30" class="img-fluid"/>
            </a>

            <?php if ($perfil): // Si el usuario está registrado ?>
                <div class="d-flex align-items-center ms-3">
                    <img src="<?php echo base_url('assets/img/' . $imagen_perfil); ?>" alt="Perfil" width="30" height="30" class="img-fluid rounded-circle me-2">
                    <!-- Aplica la clase 'navbar-brand' para darle estilo similar a los enlaces -->
                    <span class="navbar-brand"><?php echo $nombre; ?> (<?php echo ($perfil == 1) ? 'Admin' : 'Cliente'; ?>)</span>
                </div>
            <?php endif; ?>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="navbar-brand" href="<?php echo base_url('principal'); ?>">Página principal</a>
                </li>
                <li class="nav-item">
                    <a class="navbar-brand" href="<?php echo base_url('acerca_de'); ?>">Acerca de</a>
                </li>

                <?php if ($perfil): // Si el usuario está registrado ?>
                    <li class="nav-item">
                        <a class="navbar-brand" href="<?php echo base_url('quienes_somos'); ?>">Quiénes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="<?php echo base_url('/logout'); ?>">Cerrar Sesión</a>
                    </li>
                <?php else: // Si el usuario no está registrado ?>
                    <li class="nav-item">
                        <a class="navbar-brand" href="<?php echo base_url('registro'); ?>">Registrarse</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="<?php echo base_url('login'); ?>">Ingresar</a>
                    </li>
                <?php endif; ?>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>
