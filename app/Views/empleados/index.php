<?= $this->extend('plantilla'); ?>

<?= $this->section('contenido'); ?>

    <h3 class="my-3" id="titulo">Empleados</h3>

    <a href="<?= base_url('empleados/new'); ?>" class="btn btn-primary mb-3">Agregar</a>

    <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">Clave</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
                <th scope="col">ID Departamento</th>
                <th scope="col">Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $empleado) : ?>
                <tr>
                    <td><?= $empleado['clave']; ?></td>
                    <td><?= $empleado['nombre']; ?></td>
                    <td><?= $empleado['telefono']; ?></td>
                    <td><?= $empleado['email']; ?></td>
                    <td><?= $empleado['departamento']; ?></td>
                    <td>
                        <a href="<?= base_url('empleados/' . $empleado['id'] . '/edit'); ?>" class="btn btn-warning btn-sm me-2">Editar</a>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-bs-url="<?= base_url('empleados/' . $empleado['id']); ?>">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminaModalLabel">Aviso</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar este registro?</p>
                </div>
                <div class="modal-footer">
                    <form id="form-elimina" action="" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

    <script>
        const eliminaModal = document.getElementById('eliminaModal');
        if (eliminaModal) {
            eliminaModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                const url = button.getAttribute('data-bs-url');
                const form = eliminaModal.querySelector('#form-elimina');
                form.setAttribute('action', url);
            });
        }
    </script>

<?= $this->endSection(); ?>
