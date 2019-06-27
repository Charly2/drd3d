<!--<a href="#home" class="up_btn scroll"><i class="fas fa-angle-up"></i></a>-->

    <script>

        <?
            global $_PATH;

            if ($_PATH[1]!="index"){?>
        console.log("NO index")
        var time = new Date().getTime();
        $(document.body).bind("mousemove keypress", function(e) {
            time = new Date().getTime();
        });

        function refresh() {
            if(new Date().getTime() - time >= 1000)
                window.location.href = "<?=_setUrl('index/borrar')?>";
            else
                setTimeout(refresh, 10000);
        }

        setTimeout(refresh, 10000);
            <?}else{

            }

        ?>






    </script>

<!--:::::jquery.waypoints.min.js :::::::-->
<script src="<?=URL_ASSETS?>assets/js/jquery.waypoints.min.js"></script>
<!--:::::popper js :::::::-->
<script src="<?=URL_ASSETS?>assets/js/popper.min.js"></script>
<!--:::::bootstrap js :::::::-->
<script src="<?=URL_ASSETS?>assets/js/bootstrap.min.js"></script>
<!--:::::owl carousel js :::::::-->
<script src="<?=URL_ASSETS?>assets/js/owl.carousel.min.js"></script>
<!--::::: google map js:::::::-->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<!--:::::modal video btn js :::::::-->
<script src="<?=URL_ASSETS?>assets/js/jquery-modal-video.min.js"></script>
<!--:::::slick nav mobile menu js :::::::-->
<script src="<?=URL_ASSETS?>assets/js/jquery.slicknav.min.js"></script>
<!--:::::counter js :::::::-->
<script src="<?=URL_ASSETS?>assets/js/jquery.counterup.js"></script>
<!--:::::main js :::::::-->
<script src="<?=URL_ASSETS?>assets/js/main.js"></script>

</body>

</html>