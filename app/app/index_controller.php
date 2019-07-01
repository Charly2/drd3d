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
    $ano = 2019;
    $total = [];
    for ($i=1;$i<=12;$i++){
        $and = "fecha BETWEEN '$ano-$i-01' and '$ano-$i-31' ";
        $preg = $db->queryRet("SELECT count(*) as t from encuesta where $and ");
        $total[]= $preg[0][0];
    }

    $preg = $db->queryRet("select count(*),sucursal.nombre as t from encuesta e inner join sucursal on sucursal.id_Sucursal = e.id_Sucursal group by e.id_Sucursal");
    //prEx($preg);
    $suc= [];
    $t= [];
    foreach ($preg as $p){
        $suc[]= $p['t'];
        $t[]= $p[0];
    }

    setViewApp('dashboard',['total'=>$total,'suc'=>$suc,'t'=>$t]);
}

function newpr(){
    include_once '../modelos/Dao.php';


    $db = new Dao();
    $db->connect();



    $result = $db->insert('pregunta',[$_POST['txt'],$_POST['tipo'],$_POST['orden'],$_POST['opc'],1],'texto,tipo_Pregunta,orden,rango,estado_Pregunta');


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


function sucursal_gra(){

    include_once '../modelos/Dao.php';


    $db = new Dao();
    $db->connect();



    $preg = $db->queryRet("SELECT sucursal.id_Sucursal,sucursal.nombre, encuesta.id_Encuesta, COUNT(encuesta.id_Encuesta) as tot FROM sucursal INNER JOIN encuesta on sucursal.id_Sucursal = encuesta.id_Sucursal GROUP by sucursal.id_Sucursal");
    //prEx($preg);

    setViewApp('sucursal_gra_all',['data'=>$preg]);
}




function suc (){
    global $_PATH;
    include_once '../modelos/Dao.php';


    $db = new Dao();
    $db->connect();

    $today = date("d/m/Y");
    $today = explode('/',$today);



    $mes = $_PATH[3]?$_PATH[3]:$today[1];
    $ano = $_PATH[4]?$_PATH[4]:$today[2];


        $and = "and fecha BETWEEN '$ano-$mes-01' and '$ano-$mes-31' ";





    $preg = $db->queryRet("SELECT * FROM encuesta WHERE id_Sucursal = '".$_PATH[2]."' $and");

    //prEx($preg);


    setViewApp('encuestas',['data'=>$preg,'id_s'=>$_PATH[2],'mes'=>$mes,'ano'=>$ano]);
}

function gra (){
    global $_PATH;
    include_once '../modelos/Dao.php';


    $db = new Dao();
    $db->connect();
    $suc = $_PATH[2]?$_PATH[2]:"";
    $and="";
    $join="";


    $today = date("d/m/Y");
    $today = explode('/',$today);



    $mes = $_PATH[3]?$_PATH[3]:$today[1];
    $ano = $_PATH[4]?$_PATH[4]:$today[2];


    $and = "and e.fecha BETWEEN '$ano-$mes-01' and '$ano-$mes-31' ";

    //die("si");






    if ($suc){
        $join = " INNER JOIN encuesta e on e.id_Encuesta = r.id_Encuesta ";
        $and .= "and e.id_Sucursal = '$suc' ";

    }


    $preg = $db->queryRet("SELECT id_Pregunta,texto,opciones_Respuesta,tipo_Pregunta FROM pregunta WHERE estado_Pregunta = 1");

    $ar=[];

    foreach ($preg as $p ){


        $res = $db->queryRet("SELECT r.valor,count(r.valor) FROM respuesta r $join WHERE r.id_Pregunta = '".$p['id_Pregunta']."' $and group by r.valor");
        for ($i=0;$i<sizeof($res);$i++){
            $res[$i]['label']=repuesta_tipo($p['tipo_Pregunta'],$res[$i][0]);

            //print_r($res[$i]);
        }
        $p['data']= $res;
        $ar[]=$p;

    }

    //prEx($ar);


    setViewApp('sucursal_gra',['data'=>$ar,'id_s'=>$suc]);
}

function export (){
    global $_PATH;
    $today = date("d/m/Y");
    $today = explode('/',$today);



    $mes = $_PATH[3]?$_PATH[3]:$today[1];
    $ano = $_PATH[4]?$_PATH[4]:$today[2];
    $and = "and fecha BETWEEN '$ano-$mes-01' and '$ano-$mes-31' ";

    print_r($and);



    if (!sizeof($_PATH[2])){
        die("sin datos");
    }

    include_once '../modelos/Dao.php';
    $db = new Dao();
    $db->connect();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");

    $arregl = ['id_Encuesta','fecha','hora','nombre_contacto','telefono_contacto',"Comentario"];



    $pregac = $db->queryRet("SELECT texto FROM pregunta  WHERE estado_Pregunta = '1'");

    foreach ($pregac as $p){
        $arregl[] = $p['texto'];
    }

    fputcsv($output,array_map("utf8_decode", $arregl) );



    $encu = $db->queryRet("SELECT * FROM encuesta  WHERE id_Sucursal = '".$_PATH[2]."' $and");

    foreach ($encu as $p){


        $arr=[];
        $arr = [$p['id_Encuesta'],$p['fecha'],$p['hora'],$p['nombre_contacto'],$p['telefono_contacto'],$p['comentario']];
        $preg = $db->queryRet("SELECT respuesta.valor FROM respuesta  WHERE id_Encuesta = '".$p['id_Encuesta']."'");
        foreach ($preg as $p){
            $arr[]=$p['valor'];
        }
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


    $pregs = $db->queryRet("SELECT * FROM encuesta WHERE id_Encuesta = '".$_PATH[2]."'");

    //prEx($preg);


    setViewApp('respuesta',['data'=>$preg,'encu'=>$pregs[0]]);
}



?>