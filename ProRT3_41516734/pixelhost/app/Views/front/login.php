<div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="card" style="width: 50%;">
        <div class="card-header text-center">
            <h2>Iniciar Sesión</h2>
        </div>

        <!-- Mensaje de éxito -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Mensaje de error -->
        <?php if (session()->getFlashdata('msg')): ?>
            <div class="alert alert-warning">
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif; ?>

        <!-- Inicio del formulario de login -->
        <form method="post" action="<?= base_url('/enviarlogin') ?>">
            <div class="card-body">
                <div class="mb-2">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Correo electrónico" required>
                </div>

                <div class="mb-3">
                    <label for="pass" class="form-label">Contraseña</label>
                    <input name="pass" type="password" class="form-control" id="pass" placeholder="Contraseña" required>
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="showPassword">
                        <label class="form-check-label" for="showPassword">Mostrar contraseña</label>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <input type="submit" value="Ingresar" class="btn btn-success">
                    <a href="<?= base_url('login'); ?>" class="btn btn-danger">Cancelar</a>
                </div>
                <div class="mt-3 text-center">
                    <span>¿Aún no te registraste? <a href="<?= base_url('/registro'); ?>">Registrarse aquí</a></span>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('showPassword').addEventListener('change', function() {
        var passwordField = document.getElementById('pass');
        if (this.checked) {
            passwordField.type = 'text';
        } else {
            passwordField.type = 'password';
        }
    });
</script>

