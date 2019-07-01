<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 text-center">Editar preguntas</h1>
    <button  href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm _newbtn"><i class="fas fa-plus fa-sm text-white-50"></i> Agregar pregunta</button>
</div>


<style>
    #accordion .card-header:hover{
        cursor: move;
    }
    .card-header{
        font-size: 1.2em;
    }
</style>

<div class="row">
    <!-- Area Chart -->
    <div class="col-md-6 col-lg-6">
        <h1 class="h3 mb-4 text-gray-800 text-center display_block ">Lista de preguntas</h1>
        <div id="accordion">
            <?foreach($data as $pre){?>
            <div class="card mb-4" data-orden="<?=$pre['orden']?>" data-id="<?=$pre['id_Pregunta']?>">
                <div class="card-header"><?=$pre['texto']?></div>
                <div class="card-body">
                    <!--<pre>
                        <?/* print_r($pre) */?>
                    </pre>-->
                    <div class="row">
                        <div class="col-md-6 text-center    ">
                            <button href="#" class="btn btn-info  btn-icon-split _editar"   data-pre="<?=$pre['id_Pregunta']?>" data-tipo="<?=$pre['tipo_Pregunta']?>">
                                <span class="icon text-white-50">
                                  <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Editar pregunta</span>
                            </button>
                        </div>
                        <div class="col-md-6 text-center    ">
                            <button href="#" class="btn btn-danger btn-icon-split _delete" data-pre="<?=$pre['id_Pregunta']?>" >
                                <span class="icon text-white-50">
                                  <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Borrar pregunta</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?}?>
        </div>

    </div>

    <!-- Pie Chart -->
    <div class="col-md-6 col-lg-6 _det" >
        <h1 class="h3 mb-4 text-gray-800 text-center display_block _txt ">Detalles de pregunta</h1>
        <div class="card mb-4 _det" style="display: none">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail">Texto de la pregunta</label>
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"  placeholder="Ingrese el texto de la pregunta">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Texto de la pregunta</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option value="1">Tipo 1</option>
                                <option value="2">Tipo 2</option>
                                <option value="3">Tipo 3</option>
                                <option value="4">Tipo 4</option>
                                <option value="5">Tipo 5</option>
                                <option value="6">Tipo 6</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h5 class="mb-0 text-center">Tipo 1</h5>
                        <img class="display_block img-fluid" src="<?=URL_ASSETS?>/img/t_1.jpg" alt="">
                    </div>
                    <div class="col-md-3">
                        <h5 class="mb-0 text-center">Tipo 2</h5>
                        <img class="display_block img-fluid" src="<?=URL_ASSETS?>/img/t_2.jpg" alt="">
                    </div>
                    <div class="col-md-3">
                        <h5 class="mb-0 text-center">Tipo 3</h5>
                        <img class="display_block img-fluid" src="<?=URL_ASSETS?>/img/t_3.jpg" alt="">
                    </div>
                    <div class="col-md-3">
                        <h5 class="mb-0 text-center">Tipo 4</h5>
                        <img class="display_block img-fluid" src="<?=URL_ASSETS?>/img/t_4.jpg" alt="">
                    </div>
                    <div class="col-md-3">
                        <h5 class="mb-0 text-center">Tipo 5</h5>
                        <h2>TEXTO</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 offset-md-4">
                        <h5 class="mb-0 text-center">Tipo 5</h5>
                        <img class="display_block img-fluid" src="<?=URL_ASSETS?>/img/t_5.jpg" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <button href="#" class="btn btn-success btn-block btn-icon-split _save">
                            <span class="text">Actualizar</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4 _new" style="display: none">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail">Texto de la pregunta</label>
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail_new"  placeholder="Ingrese el texto de la pregunta">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Texto de la pregunta</label>
                            <select class="form-control" id="exampleFormControlSelect1_new">
                                <option value="1">Tipo 1</option>
                                <option value="2">Tipo 2</option>
                                <option value="3">Tipo 3</option>
                                <option value="4">Tipo 4</option>
                                <option value="5">Tipo 5</option>
                                <option value="6">Tipo 6</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h5 class="mb-0 text-center">Tipo 1</h5>
                        <img class="display_block img-fluid" src="<?=URL_ASSETS?>/img/t_1.jpg" alt="">
                    </div>
                    <div class="col-md-3">
                        <h5 class="mb-0 text-center">Tipo 2</h5>
                        <img class="display_block img-fluid" src="<?=URL_ASSETS?>/img/t_2.jpg" alt="">
                    </div>
                    <div class="col-md-3">
                        <h5 class="mb-0 text-center">Tipo 3</h5>
                        <img class="display_block img-fluid" src="<?=URL_ASSETS?>/img/t_3.jpg" alt="">
                    </div>
                    <div class="col-md-3">
                        <h5 class="mb-0 text-center">Tipo 4</h5>
                        <img class="display_block img-fluid" src="<?=URL_ASSETS?>/img/t_4.jpg" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 offset-md-4">
                        <h5 class="mb-0 text-center">Tipo 5</h5>
                        <img class="display_block img-fluid" src="<?=URL_ASSETS?>/img/t_5.jpg" alt="">
                    </div>

                    <div class="col-md-3">
                        <h5 class="mb-0 text-center">Tipo 5</h5>
                        <h2>TEXTO</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <button href="#" class="btn btn-success btn-block btn-icon-split _save_new">
                            <span class="text">Crear</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?=URL_ASSETS?>js/jquery-ui.min.js"></script>
<script>
    $(document).ready(function() {
        $('#accordion').sortable({
            items: '.card',
            update: function( event, ui ) {

                updateOrder();
            }
        });

        function updateOrder(){



            $('#accordion .card').each(function (e,i) {
                $(this).data('orden',e+1)
            });

            var _dat = [];


            $('#accordion .card').each(function (e,i) {

                _dat.push({id:$(this).data('id'),orden:$(this).data('orden')});


            });


            $.post('<?=_setUrl('app/index/update_orden')?>',{_dat}).done(function (data) {
                console.log(data)

            });



        }

        $('._editar').click(function (e) {
            $('._editar.disabled').prop( "disabled", false );
            $('._editar.disabled').removeClass('disabled')
            var id = $(this).data('pre');
            var tipo = $(this).data('tipo');
            console.log( $(this).parents('.card-body').siblings('.card-header').html() );
            console.log(tipo);
            $(this).prop( "disabled", true );
            $(this).addClass( "disabled" );

            $('#exampleInputEmail').val($(this).parents('.card-body').siblings('.card-header').html());

            $('#exampleInputEmail').data('id',id);
            $('#exampleFormControlSelect1').data('id',id);

            $('#exampleFormControlSelect1').val(tipo);

            $('._det').fadeOut('easy',function () {
                $(this).fadeIn();
            });
            $('#accordion .card').css('opacity','.5');
            $(this).parents('.card').css('opacity','1');


        });


        $('._save').click(function (e) {
            $('._editar.disabled').prop( "disabled", false );
            $('._editar.disabled').removeClass('disabled');
            $('#accordion .card').css('opacity','1');
            $('._det').fadeOut('easy',function () {
            });
        });

        $('._save_new').click(function (e) {
            var txt = $('#exampleInputEmail_new').val();
            var tipo = $('#exampleFormControlSelect1_new').val();


            console.log(txt)
            console.log(tipo)

            var orende =$('#accordion .card:last').data('orden');


            $.post('<?=_setUrl('app/index/newpr')?>',{txt:txt , tipo:tipo,orden:orende}).done(function (data) {
                console.log(data)
                window.location.reload();
            });

        });


        $('._delete').click(function (e) {
            var _id = $(this).data('pre');
            $(this).parents('.card').remove();
            $.post('<?=_setUrl('app/index/update')?>',{id:_id , val:2,row:'estado_Pregunta' }).done(function (data) {
                console.log(data)

            });

        });


        $('#exampleInputEmail').change(function (e) {
            var _id = $(this).data('id');
            var _val = $(this).val();
            $('._editar.disabled').parents('.card').find('.card-header').html(_val);

            $.post('<?=_setUrl('app/index/update')?>',{id:_id , val:_val,row:'texto' }).done(function (data) {
                console.log(data)
            });
        });


        $('#exampleFormControlSelect1').change(function (e) {
            var _id = $(this).data('id');
            var _val = $(this).val();
            $('._editar.disabled').data('tipo',_val)

            $.post('<?=_setUrl('app/index/update')?>',{id:_id , val:_val,row:'tipo_Pregunta' }).done(function (data) {
                console.log(data)
            });
        });






        $('._newbtn').click(function (e) {
            $('._new').fadeIn();
            $('._txt').html('Ingresa tu pregunta');

        });




        $('#exampleInputEmail').keypress(updView);
        $('#exampleInputEmail').keyup(updView);


        function updView (e) {

            $('._editar.disabled').parents('.card').find('.card-header').html($(this).val());
        }

    });

</script>