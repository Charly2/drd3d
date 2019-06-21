<?php


if (function_exists($_PATH[1])){
    $_PATH[1]();
}else{
    setViewIndex('error');
}




function index(){
    include_once '../modelos/Dao.php';


    $db = new Dao();
    $db->connect();



    $preg = $db->queryRet("SELECT sucursal.id_Sucursal,sucursal.nombre, encuesta.id_Encuesta, COUNT(encuesta.id_Encuesta) as tot FROM sucursal INNER JOIN encuesta on sucursal.id_Sucursal = encuesta.id_Sucursal GROUP by sucursal.id_Sucursal");
    //prEx($preg);

    setViewApp('sucursal',['data'=>$preg]);
}

function newpr(){
    include_once '../modelos/Dao.php';


    $db = new Dao();
    $db->connect();



    $result = $db->insert('pregunta',[$_POST['txt'],$_POST['tipo'],$_POST['orden'],1],'texto,tipo_Pregunta,orden,estado_Pregunta');


    print_r($result);
}
function update(){
    include_once '../modelos/Dao.php';


    $db = new Dao();
    $db->connect();

    $result= $db->update('pregunta',[$_POST['val']],[$_POST['row']],"id_Pregunta ='".$_POST['id']."'" );



    print_r($result);
}






function update_orden(){
    include_once '../modelos/Dao.php';


    $db = new Dao();
    $db->connect();


    foreach ($_POST['_dat'] as $pre){
        echo "id : ".$pre['id'];
        echo "or : ".$pre['orden'];
        $result= $db->update('pregunta',[$pre['orden']],['orden'],"id_Pregunta ='".$pre['id']."'" );
        echo "****";
    }

//    $result= $db->update('pregunta',[$_POST['val']],[$_POST['row']],"id_Pregunta ='".$_POST['id']."'" );



    print_r($_POST['_dat']);
}

function editar_preguntas(){


    include_once '../modelos/EncuestaModel.php';
    $modelo  = new Encuesta();

    $preg = $modelo->obtienePreguntas();

    //prEx($preg);

    setViewApp('editar_preguntas',['data'=>$preg]);
}

function sucursal(){

    include_once '../modelos/Dao.php';


    $db = new Dao();
    $db->connect();



    $preg = $db->queryRet("SELECT sucursal.id_Sucursal,sucursal.nombre, encuesta.id_Encuesta, COUNT(encuesta.id_Encuesta) as tot FROM sucursal INNER JOIN encuesta on sucursal.id_Sucursal = encuesta.id_Sucursal GROUP by sucursal.id_Sucursal");
    //prEx($preg);

    setViewApp('sucursal',['data'=>$preg]);
}




function suc (){
    global $_PATH;
    include_once '../modelos/Dao.php';


    $db = new Dao();
    $db->connect();

    $_PATH[2];


    $preg = $db->queryRet("SELECT * FROM encuesta WHERE id_Sucursal = '".$_PATH[2]."'");

    //prEx($preg);


    setViewApp('encuestas',['data'=>$preg,'id_s'=>$_PATH[2]]);
}

function export (){
    global $_PATH;
    if (!sizeof($_PATH[2])){
        die("sin datos");
    }

    include_once '../modelos/Dao.php';
    $db = new Dao();
    $db->connect();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");

    $arregl = ['id_Encuesta','fecha','hora','nombre_contacto','telefono_contacto'];

    include_once '../modelos/EncuestaModel.php';
    $modelo  = new Encuesta();

    $pregac = $db->queryRet("SELECT texto FROM pregunta  WHERE estado_Pregunta = '1'");

    foreach ($pregac as $p){
        $arregl[] = $p['texto'];
    } $arregl[] = "Comentario";

    fputcsv($output,array_map("utf8_decode", $arregl) );



    $encu = $db->queryRet("SELECT * FROM encuesta  WHERE id_Sucursal = '".$_PATH[2]."'");

    foreach ($encu as $p){
        $arr=[];
        $arr = [$p['id_Encuesta'],$p['fecha'],$p['hora'],$p['nombre_contacto'],$p['telefono_contacto']];
        $preg = $db->queryRet("SELECT respuesta.valor FROM respuesta  WHERE id_Encuesta = '".$p['id_Encuesta']."'");
        foreach ($preg as $p){
            $arr[]=$p['valor'];
        }
        $arr[] = $p['comentario'];
        //print_r($arr);
        fputcsv($output, array_map("utf8_decode", $arr));
    }



    fclose($output);
}



function encuesta_det (){
    global $_PATH;
    include_once '../modelos/Dao.php';


    $db = new Dao();
    $db->connect();




    $preg = $db->queryRet("SELECT pregunta.texto,pregunta.tipo_Pregunta,respuesta.valor FROM respuesta INNER JOIN pregunta ON respuesta.id_Pregunta = pregunta.id_Pregunta WHERE id_Encuesta = '".$_PATH[2]."'");


    $pregs = $db->queryRet("SELECT * FROM encuesta WHERE id_Sucursal = '".$_PATH[2]."'");

    //prEx($preg);


    setViewApp('respuesta',['data'=>$preg,'encu'=>$pregs[0]]);
}



?>