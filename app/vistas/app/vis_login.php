<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?=URL_ASSETS?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=URL_ASSETS?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url(<?=URL_ASSETS?>/img/login.jpg)"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login RDE DRD3D!</h1>
                                </div>
                                <div class="user" action="<?=_setUrl('app/login/valida')?>" method="post">
                                    <div class="form-group">
                                        <input autocomplete="off" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Ingresa tu email">
                                    </div>
                                    <div class="form-group">
                                        <input autocomplete="off" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group" style="opacity: 0">

                                    </div>
                                    <button   class="btn btn-primary btn-user btn-block login">
                                        Entrar
                                    </button>


                                </div>
                                <hr>
                                <div class="main_error" style="opacity: 0;">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            <span id="">Error</span>
                                            <div class="text-white-50 small" id="main_er">Faltan datos</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="<?=URL_ASSETS?>vendor/jquery/jquery.min.js"></script>
<script src="<?=URL_ASSETS?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?=URL_ASSETS?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=URL_ASSETS?>js/sb-admin-2.min.js"></script>


<script>
    $(document).ready(function() {

        $('#exampleInputPassword').add($('#exampleInputEmail')).keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                //$('.login').trigger('click');
                document.getElementsByClassName('login')[0].click();
            }
        });


        $('.login').click(function (e) {
            e.preventDefault();

            var email = $('#exampleInputEmail').val();
            var pass = $('#exampleInputPassword').val();

            if (email!="" && pass!=""){
                $.post("<?=_setUrl('app/login/valida')?>",{email:email,pass:pass}).done(function (e) {


                    if (e.split('--jsval--')[1] == "true"){
                        window.location.href = "<?=_setUrl('app/index/index')?>";
                    }else{
                        $('.main_er').html("Datos incorrectos")
                        $('.main_error').css('opacity','1')
                    }

                });
            }else{


                $('.main_er').html("Faltan datos")
                $('.main_error').css('opacity','1')
            }




        });
    });



</script>



</body>

</html>
