<link rel="stylesheet" type="text/css" href="<?=URL_ASSETS?>assets/css/fullpage.css" />

<img class="img_fott" src="<?=URL_ASSETS?>assets/img/sep.svg" alt="">
<img class="img_hea" src="<?=URL_ASSETS?>assets/img/sep3.svg" alt="">





<div id="fullpage">

    <div class="section" id="section1">
        <?foreach($data as $pre){?>
        <div class="slide ">
            <div class="main_conte">
                <?
                    //print_r($pre);
                    switch ($pre['tipo_Pregunta']){
                        case '1':
                            print_preg_tipo1($pre);
                            break;
                        case '2':
                            print_preg_tipo2($pre);
                            break;
                        case '3':
                            print_preg_tipo3($pre);
                            break;
                        case '4':
                            print_preg_tipo4($pre);
                            break;
                        case '5':
                            print_preg_tipo5($pre);
                            break;
                    }

                ?>
            </div>
        </div>
        <?}?>
        <div class="slide ">
            <div class="main_conte">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="titulo_pre"> Dejanos tu comentario</h1>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <textarea name="" id="_com" cols="30" rows="8"></textarea>
                        </div>
                        <div class="col-md-6">
                            <div class="temp-keyboard">
                                <div class="keyboard  showKey" id="qwerty">
                                    <div class="row-keyboard">
                                        <div id="a" data-value="q"><p>q</p></div>
                                        <div id="z" data-value="w"><p>w</p></div>
                                        <div id="e" data-value="e"><p>e</p></div>
                                        <div id="r" data-value="r"><p>r</p></div>
                                        <div id="t" data-value="t"><p>t</p></div>
                                        <div id="y" data-value="y"><p>y</p></div>
                                        <div id="u" data-value="u"><p>u</p></div>
                                        <div id="i" data-value="i"><p>i</p></div>
                                        <div id="o" data-value="o"><p>o</p></div>
                                        <div id="p" data-value="p"><p>p</p></div>
                                    </div>
                                    <div class="row-keyboard">
                                        <div id="q" data-value="a"><p>a</p></div>
                                        <div id="s" data-value="s"><p>s</p></div>
                                        <div id="d" data-value="d"><p>d</p></div>
                                        <div id="f" data-value="f"><p>f</p></div>
                                        <div id="g" data-value="g"><p>g</p></div>
                                        <div id="h" data-value="h"><p>h</p></div>
                                        <div id="j" data-value="j"><p>j</p></div>
                                        <div id="k" data-value="k"><p>k</p></div>
                                        <div id="l" data-value="l"><p>l</p></div>
                                        <div id="m" data-value="m"><p>m</p></div>
                                    </div>
                                    <div class="row-keyboard">
                                        <div id="w" data-value="z"><p>z</p></div>
                                        <div id="x" data-value="x"><p>x</p></div>
                                        <div id="c" data-value="c"><p>c</p></div>
                                        <div id="v" data-value="v"><p>v</p></div>
                                        <div id="switch" data-value="&nbsp;"><p>___</p></div>
                                        <div id="b" data-value="b"><p>b</p></div>
                                        <div id="n" data-value="n"><p>n</p></div>
                                        <div id="del" data-value="del"><p id="del">Borrar</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 float-left ">
                            <div class="app-btns v4 text-right">
                                <a onclick="send()" class="app-btn align-self-center">
                                <span class="app-btn-icon">
                                    <i class="fa fa-check-double"></i>
                                </span>
                                    <span class="app-btn-text">
                                    <small class="display_block">Finalizar<strong>Evaluación</strong></small>
                                </span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>










<script type="text/javascript" src="<?=URL_ASSETS?>assets/js/fullpage.js"></script>
<script type="text/javascript">
    var _DATOS = [];
    var _TOTAL = <?=sizeof($data)+1?>;
    var _ACTIVO = 1;
    var myFullpage = new fullpage('#fullpage', {
        loopHorizontal:false,
        afterRender: function(){
            var pluginContainer = this;
            fullpage_api.setAllowScrolling(false);
        }
    });


    function nxt() {
        console.log(fullpage_api.moveSlideRight());
    }

    $('.keyboard .row-keyboard div').on('click', function(e){
        e.preventDefault();
        var inputtext = $('#_com').val();
        if (e.target.id == 'del') {
            var temp = inputtext.substring(0, inputtext.length - 1);
            temp = temp.substring(0, temp.length - 1);
            console.log(temp)
            temp =  temp+'|';
            $('#_com').val(temp);
        }else{
            let temp = $(this).data('value');
            inputtext = inputtext.substring(0, inputtext.length - 1);
            temp = inputtext + temp+'|';
            $('#_com').removeClass("error");
            $('#_com').val(temp);
        }
    });


    $('.resp_item').click(function (e) {

        var a = $(this).data();
        a.txt = $(this).find('p').html();
        a.preg = $(this).parents('.main_conte').find('.titulo_pre').html();
        _DATOS.push(a);
        if(_ACTIVO < _TOTAL){
            _ACTIVO++;
            $(this).addClass('acti');

            setTimeout(function () {
                nxt();
            },280);
        }else{

        }

    });
    
    
    function send() {
        $.post( "<?=_setUrl('index/save');?>", {data:_DATOS, comm : $('#_com').val() }).done(function( data ) {
            console.log(data)



        });
        //window.location.href = ' <?=_setUrl('index/ok');?>';
    }

</script>