<style>
    body{
        background-image: url("/drd3d/public/img/01_welcome_clean.jpg");
        background-size: cover;
    }
    .welcome-area{
        padding: 200px 0 0 0;
    }
</style>

<h1 class="titulo_w">
    Recopilador de Encuestas<br> de Calidad en el Servicio
</h1>


<div class="welcome-area v4" id="home">
    <div class="container">
        <div class="main_area">
            <div class="row">
                <div class="col-12">
                    <div class="welcome-text">
                        <h1>¿Comó desea ayudarnos? </h1>
                        <p>La información que usted nos proporciona nos <br>ayuda a mejorar nuestro servicio.</p>
                    </div>

                    <div class="app-btns v4">
                        <a href="<?=_setUrl('index/encuesta');?>" class="app-btn align-self-center">
                                <span class="app-btn-icon">
                                    <i class="fa fa-check-double"></i>
                                </span>
                            <span class="app-btn-text">
                                    <small>Desea hacer un <strong>Evaluación</strong></small>
                                </span>
                        </a>
                        <a href="<?=_setUrl('index/comentario');?>" class="app-btn active align-self-center">
                                <span class="app-btn-icon">
                                    <i class="fa fa-pencil"></i>
                                </span>
                            <span class="app-btn-text">
                                    <small>Desea dejar un  <strong>Comentario</strong></small>
                                </span>
                        </a>
                    </div>
                </div>
            </div>
            <div onclick="borrar_f()" class="btn btn-danger btn-circle btn-lg salir_">
                <i class="fa fa-times"></i>
            </div>
        </div>
    </div>
</div>
<!--<div class="welcome_right v5_2">
    <img src="<?/*=URL_ASSETS*/?>assets/img/iphone-white.png" alt="">
</div>-->
<!--<div class="welcome_right v5_3">
    <img src="<?/*=URL_ASSETS*/?>assets/img/iphone-white2.png" alt="">
</div>-->
<div class="effect_1">
    <img src="<?=URL_ASSETS?>assets/img/v3_polygon_1.png" alt="">
</div>
<div class="effect_2">
    <img src="<?=URL_ASSETS?>assets/img/v3_circle_1.png" alt="">
</div>
<div class="effect_3">
    <img src="<?=URL_ASSETS?>assets/img/v3_polygon_1.png" alt="">
</div>
<div class="effect_4">
    <img src="<?=URL_ASSETS?>assets/img/v3_circle_1.png" alt="">
</div>
<div class="effect_5">
    <img src="<?=URL_ASSETS?>assets/img/v3_circle_1.png" alt="">
</div>




<div class="welcome_right" id="section1">


    <div class="cross">
        <img src="<?=URL_ASSETS?>assets/img/cross-_1.png" alt="">
    </div>
    <div class="cross cross-2">
        <img src="<?=URL_ASSETS?>assets/img/cross-_1.png" alt="">
    </div>
    <div class="cross cross-3">
        <img src="<?=URL_ASSETS?>assets/img/cross-_1.png" alt="">
    </div>
    <div class="cross cross-4">
        <img src="<?=URL_ASSETS?>assets/img/cross-_1.png" alt="">
    </div>
    <div class="circle">
        <img src="<?=URL_ASSETS?>assets/img/circle-i.png" alt="">
    </div>
    <div class="circle circle-2">
        <img src="<?=URL_ASSETS?>assets/img/circle-i.png" alt="">
    </div>


    <div class="share">
        <img src="<?=URL_ASSETS?>assets/img/share_i.png" alt="">
    </div>
</div>

<script>
    function borrar_f() {
        window.location.href = "<?=_setUrl('index/borrar')?>";
    }
</script>
