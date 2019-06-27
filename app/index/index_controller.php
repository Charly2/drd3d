<?php


if (function_exists($_PATH[1])){
    $_PATH[1]();
}else{
    setViewIndex('error');
}






function index (){

    setViewIndex('index_pre',['data'=>true]);
}

function borrar (){
    unset($_SESSION);
    session_destroy();
    header('location: /drd3d/index/');
}

function ok (){
    setViewIndex('index_dos');
}
function pre (){
    global $_PATH;

    $_SESSION['nombre']=$_PATH[2]?$_PATH[2]:"";
    $_SESSION['tel']=$_PATH[3]?$_PATH[3]:"";

    $_PRE_WHITE = true;
    setViewIndex('index',['data'=>$_PRE_WHITE]);
}

function comentario (){
    setViewIndex('comentario');
}


function prueba (){
    setViewIndex('prueba');
}


function encuesta (){
    include_once '../modelos/EncuestaModel.php';
    $modelo  = new Encuesta();

    $preg = $modelo->obtienePreguntas();

    //prEx($preg);

    setViewIndex('encuesta',['data'=>$preg]);
}

function full (){
    include_once '../modelos/EncuestaModel.php';
    $modelo  = new Encuesta();

    $preg = $modelo->obtienePreguntas();


    var_dump($preg);
}
function sess (){

   echo  getMailLogin("Juan Carlos","55869989898",null,"Hola como estansdaikdlasjdkla sdka djklsajd klasdjl","PRUEBA");

}






function save(){
    include_once '../modelos/EncuestaModel.php';

    global $_SUC;


    $db = new Dao();
    $db->connect();


    $modelo  = new Encuesta();




    $id_Encuesta = $modelo->registraEncuesta($_SUC,$_SESSION['nombre'],$_SESSION['tel'],"a1@gmail.com",1,"","1",$_POST['comm'],$_POST['data']);

    if (sizeof($_POST['data'])){

    $query = "";
    $query .= "INSERT INTO respuesta (	id_Pregunta, id_Encuesta, valor ) VALUES ";
    for ($i = 0; $i < sizeof($_POST['data']); $i++) {
        $query .= "('" . $_POST['data'][$i]['id_pregunta'] . "','$id_Encuesta', '" . $_POST['data'][$i]['value'] . "')";
        if ($i < (sizeof($_POST['data']) - 1)) {
            $query .= ',';
        }
    }

    echo $db->query_insert($query);

    }


    $va = sendMail('papapitufo10@gmail.com','Admnistración DRD',"Encuesta",getMailLogin($_SESSION['nombre'],$_SESSION['tel'],$_POST['data'],$_POST['comm'],"1"));



    unset($_SESSION);
    session_destroy();


    prEx($va);


};















?>