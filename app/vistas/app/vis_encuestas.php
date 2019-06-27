<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">Lista de encuestas</h1>
    <form method="get" action="<?=_setUrl('app/index/export/').$id_s.'/'.$mes.'/'.$ano?>" align="center">
        <button type="submit" href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Exportar CSV</button>
    </form>
</div>

<!-- Page Heading -->



<!-- DataTales Example -->
<div class="card shadow mb-4">

    <div class="card-body">
        <div class="row">
            <div class="col-md-12 _jus">
                <div class="">
                    <div class="small mb-1">Mes:</div>
                    <select name="" id="mes">
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </div>
                <div class="">
                    <div class="small mb-1">Año:</div>
                    <select name="" id="ano">
                        <?for($i=2019;$i<2030;$i++){?>
                            <option value="<?=$i?>"><?=$i?></option>
                        <?}?>
                    </select>
                </div>
                <div class="">
                    <div class="small mb-1">&nbsp;</div>
                    <button  class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm sssddds"><i class="fas fa-check fa-sm text-white-50"></i> Buscar</button>
                </div>
            </div>
        </div>
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


        $('.sssddds').click(function (e) {

            var mes = $('#mes').val();
            var ano = $('#ano').val();

            window.location.href = '/drd3d/app/index/suc/<?=$id_s?>/'+mes+"/"+ano
        });


    });




</script>