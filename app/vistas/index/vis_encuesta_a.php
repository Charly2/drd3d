<link rel="stylesheet" type="text/css" href="<?=URL_ASSETS?>assets/css/jquery.pagepiling.css" />

<img class="img_fott" src="<?=URL_ASSETS?>assets/img/sep.svg" alt="">
<img class="img_hea" src="<?=URL_ASSETS?>assets/img/sep3.svg" alt="">



<pre>
    <? var_dump($data) ?>
</pre>




<div id="pagepiling">

    <?for($i=0;$i<4;$i++){?>
        <div class="section" id="section<?=$i?>">
            <div class="main_conte">
                <?
                    print_preg_tipo1(null);
                ?>
            </div>
        </div>
    <?}?>
    </div>

</div>








<script type="text/javascript" src="<?=URL_ASSETS?>assets/js/jquery.pagepiling.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        /*
        * Plugin intialization
        */
        $('#pagepiling').pagepiling({
            direction: 'horizontal',
            menu: '#menu',
            anchors: ['section0', 'section1', 'section2', 'section3'],
            normalScrollElements:'.main_conte',
            navigation:false,
            afterRender: function(){
                $('#pp-nav').addClass('custom');
            },
            afterLoad: function(anchorLink, index){
                if(index>1){
                    $('#pp-nav').removeClass('custom');
                }else{
                    $('#pp-nav').addClass('custom');
                }
            }
        });
    });
</script>