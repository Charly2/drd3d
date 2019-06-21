<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">Lista de encuestas</h1>
    <form method="get" action="<?=_setUrl('app/index/export/').$id_s?>" align="center">
        <button type="submit" href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Exportar CSV</button>
    </form>
</div>

<!-- Page Heading -->



<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?foreach($data as $pre){?>
                    <tr>
                        <td><?=$pre['id_Encuesta']?></td>
                        <td><?=$pre['nombre_contacto']?></td>
                        <td><?=$pre['telefono_contacto']?></td>
                        <td><?=$pre['fecha']?></td>
                        <td><?=$pre['hora']?></td>
                        <td>
                            <a href="<?=_setUrl('app/index/encuesta_det/').$pre['id_Encuesta']?>" class="btn btn-success btn-icon-split">
                                <span class="text">Ver</span>
                            </a>
                        </td>
                    </tr>
                <?}?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?=URL_ASSETS?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?=URL_ASSETS?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>