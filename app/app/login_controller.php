<?php


if (function_exists($_PATH[1])){
    $_PATH[1]();
}else{
    setViewIndex('error');
}




function index(){
    if ($_SESSION['user']){
        header("location: /drd3d/app/index/index");
    }

    setViewApp_SL('login');
}


function valida(){

    if ($_POST['email'] == 'admin_drd' and $_POST['pass'] == 'admin_drd'){
        $_SESSION['user']= 'admin_drd';
        echo "--jsval--true";
    }else{
        echo "--jsval--false";
    }

}

function logout(){
    unset($_SESSION['user']);

    session_destroy();

    header("location: /drd3d/app/login/index");
}




?>