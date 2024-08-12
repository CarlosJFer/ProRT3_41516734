<div class="container mt-0 mb-0">
    <div class="row d-flex justify-content-center">
        <div class="card col-lg-6" style="width: 50%;">
            <div class="card-header">
                <h4 class="text-center">Registrarse</h4>
            </div>
            <div class="card-body">
                <?php $validation = \Config\Services::validation(); ?>
                <form id="registrationForm" method="post" action="<?php echo base_url('/enviar-form') ?>">
                    <?= csrf_field(); ?>

                    <?php if (!empty(session()->getFlashdata('fail'))): ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                    <?php endif ?>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input name="nombre" type="text" class="form-control" placeholder="Nombre">
                        <!-- Aviso de error -->
                        <?php if ($validation->getError('nombre')): ?>
                            <div class="alert alert-danger mt-2">
                                <?= $validation->getError('nombre'); ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input name="apellido" type="text" class="form-control" placeholder="Apellido">
                        <!-- Aviso de error -->
                        <?php if ($validation->getError('apellido')): ?>
                            <div class="alert alert-danger mt-2">
                                <?= $validation->getError('apellido'); ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input name="email" type="email" class="form-control" placeholder="correo@dominio.com">
                        <!-- Aviso de error -->
                        <?php if ($validation->getError('email')): ?>
                            <div class="alert alert-danger mt-2">
                                <?= $validation->getError('email'); ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input name="usuario" type="text" class="form-control" placeholder="Usuario">
                        <!-- Aviso de error -->
                        <?php if ($validation->getError('usuario')): ?>
                            <div class="alert alert-danger mt-2">
                                <?= $validation->getError('usuario'); ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <div class="mb-3">
                        <label for="pass" class="form-label">Contraseña</label>
                        <input name="pass" id="password" type="password" class="form-control" placeholder="Contraseña">
                        <!-- Aviso de error -->
                        <?php if ($validation->getError('pass')): ?>
                            <div class="alert alert-danger mt-2">
                                <?= $validation->getError('pass'); ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <!-- Contenedor para el botón de mostrar/ocultar -->
                    <div class="mb-3">
                        <button type="button" id="togglePassword" class="btn btn-outline-secondary btn-sm w-100">Mostrar</button>
                    </div>

                    <!-- Checkbox de Términos y Condiciones -->
                    <div class="mb-3">
                        <input type="checkbox" id="termsConditions" name="termsConditions">
                        <label for="termsConditions" class="form-check-label ms-2">Acepto los <a href="#termsModal" data-bs-toggle="modal">Términos y Condiciones</a></label>
                        <div id="termsError" class="alert alert-danger mt-2" style="display: none;">Debes aceptar los términos y condiciones para registrarte.</div>
                    </div>

                    <div class="text-center">
                        <input type="submit" value="Guardar" class="btn btn-success">
                        <input type="reset" value="Cancelar" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Términos y Condiciones -->
<div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Términos y Condiciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenido de los términos y condiciones -->
                <p>texto de los términos y condiciones...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordField = document.getElementById('password');
        const toggleButton = document.getElementById('togglePassword');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleButton.textContent = 'Ocultar';
        } else {
            passwordField.type = 'password';
            toggleButton.textContent = 'Mostrar';
        }
    });

    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        const termsCheckbox = document.getElementById('termsConditions');
        const termsError = document.getElementById('termsError');

        if (!termsCheckbox.checked) {
            event.preventDefault(); // Evita el envío del formulario
            termsError.style.display = 'block'; // Muestra el mensaje de error
        } else {
            termsError.style.display = 'none'; // Oculta el mensaje de error
        }
    });
</script>


