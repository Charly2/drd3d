<link rel="stylesheet" type="text/css" href="<?=URL_ASSETS?>assets/css/fullpage.css" />

<style>
    body{
        background-image: url("/drd3d/public/img/02_bal.jpg");
        background-size: 100% 100%;
    }
    .logo.white{
        display: none;
    }
    .main_conte{
        padding-top: 200px;
    }
    .salir_{
        position: absolute;
        left: 48%;
        bottom: 40px;
        z-index: 10000;
    }
</style>

<div onclick="borrar_f()" class="btn btn-danger btn-circle btn-lg salir_">
    <i class="fa fa-times"></i>
</div>


<div id="fullpage">

    <div class="section" id="section1">
        <div class="slide ">
            <div class="main_conte" style="padding-top: 160px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="titulo_pre nets">LE INVITAMOS A DEJAR <br> SUS COMENTARIOS</h1>
                        </div>
                    </div>
                    <div class="row position-relative">
                        <div class="col-md-12">
                            <textarea name="" id="_com" cols="30" rows="4"></textarea>
                        </div>

                        <label class="row" id="ckckc">
                            <span id="" class="checkbox"></span>
                            <span class="label">¿Desea que nos pongamos en <br> contacto de inmediato con usted?</span>
                        </label>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-8 ">
                            <div class="temp-keyboard">
                                <div class="keyboard  showKey  grande" id="qwerty">
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
                                        <div id="ss" data-value="ñ"><p>ñ</p></div>
                                    </div>
                                    <div class="row-keyboard">
                                        <div id="w" data-value="z"><p>z</p></div>
                                        <div id="x" data-value="x"><p>x</p></div>
                                        <div id="c" data-value="c"><p>c</p></div>
                                        <div id="v" data-value="v"><p>v</p></div>
                                        <div id="b" data-value="b"><p>b</p></div>
                                        <div id="n" data-value="n"><p>n</p></div>
                                        <div id="m" data-value="m"><p>m</p></div>
                                        <div id="del" data-value="del"><p id="del">Borrar</p></div>
                                    </div>
                                    <div class="row-keyboard">
                                        <div id="switch" class="w250" data-value="&nbsp;"><p>___</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 float-left ">
                            <div class="app-btns v4 text-right">
                                <a onclick="send(this)"  class="app-btn align-self-center abntnt" >
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


    $('.resp_item').click(function (e) {



    });


    $('.keyboard .row-keyboard div').on('click', function(e){
        e.preventDefault();
        $('.abntnt').prop( "disabled", false );
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
    
    
    function send(e) {
        $(e).attr('disabled',true);
        if  ($('#_com').val() != ""){
            $.post( "<?=_setUrl('index/save');?>", {data:_DATOS, comm : $('#_com').val() ,urg:$('.checkbox').hasClass('positive')}).done(function( data ) {
                console.log(data)
                setTimeout(function () {
                    window.location.href = ' <?=_setUrl('index/ok');?>';
                },280);


            });
        }


    }

</script>


<script>
    function borrar_f() {
        window.location.href = "<?=_setUrl('index/borrar')?>";
    }
    $('#ckckc').click(function(){
        t = $(this).children('.checkbox');
        if (t.hasClass('positive')){
            t.removeClass('positive');

        } else {
            t.addClass('positive');
            t.html('<svg id="i-checkmark" viewBox="0 0 32 32" width="20" height="20" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="10.9375%"><path d="M2 20 L12 28 30 4" /></svg>');

        }
    });

</script>