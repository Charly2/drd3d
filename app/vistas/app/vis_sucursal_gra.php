<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 text-center">Gráficas Generales</h1>
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
</div>



<div class="row">

    <?foreach($data as $pre){if($pre['tipo_Pregunta']!="6"){?>
    <div class="col-md-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?=$pre['texto']?></h6>
            </div>
            <div class="card-body">
                <div class="chart-bar">
                    <canvas id="myPieChart<?=$pre['id_Pregunta']?>"></canvas>
                </div>
            </div>
        </div>
    </div>
    <?}}?>



</div>



<script>
    window.chartColors = {
        red: 'rgb(255, 99, 132)',
        green: 'rgb(75, 192, 192)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(201, 203, 207)'
    };
    var options= {
        maintainAspectRatio: false,
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
        },
        legend: {
            display: true
        },
        cutoutPercentage: 80,
    };


    $(document).ready(function() {

        <?foreach($data as $pre){if($pre['tipo_Pregunta']!="6"){?>

        data<?=$pre['id_Pregunta']?> = {
            datasets: [{
                data: [<?$a = ""; foreach ($pre['data'] as $p) {$a.=$p[1].",";}echo $a; ?>],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                ]
            }
            ],
                        // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                <?  //print_r( "'".implode( "','",explode(',',$pre['opciones_Respuesta']))."'")?>
                <?$a = ""; foreach ($pre['data'] as $p) {$a.="'".$p['label']."',";}echo $a; ?>
            ]
        };
        var ctx<?=$pre['id_Pregunta']?> = document.getElementById("myPieChart<?=$pre['id_Pregunta']?>");
        var myDoughnutChart = new Chart(ctx<?=$pre['id_Pregunta']?>, {
            type: 'doughnut',
            data: data<?=$pre['id_Pregunta']?>,
            options: options
        });

        <?}}?>


    });

    $('.sssddds').click(function (e) {

        var mes = $('#mes').val();
        var ano = $('#ano').val();

        window.location.href = '/drd3d/app/index/gra/<?=$id_s?>/'+mes+"/"+ano
    });

</script>