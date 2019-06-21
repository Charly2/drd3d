<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 text-center">Lista de sucursales</h1>

</div>



<div class="row">

    <?foreach($data as $pre){?>
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="<?=_setUrl('app/index/suc/').$pre['id_Sucursal']?>">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=$pre['nombre']?></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$pre['tot']?> Evaluaciones</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>
    <?}?>



</div>


<script>
    $(document).ready(function() {

    });



</script>