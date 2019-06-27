<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 text-center">Gráficas Generales</h1>

</div>



<div class="row">

    <?foreach($data as $pre){?>
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
    <?}?>



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

        <?foreach($data as $pre){?>
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
                <?  print_r( "'".implode( "','",explode(',',$pre['opciones_Respuesta']))."'")?>
            ]
        };
        var ctx<?=$pre['id_Pregunta']?> = document.getElementById("myPieChart<?=$pre['id_Pregunta']?>");
        var myDoughnutChart = new Chart(ctx<?=$pre['id_Pregunta']?>, {
            type: 'doughnut',
            data: data<?=$pre['id_Pregunta']?>,
            options: options
        });

        <?}?>


    });



</script>