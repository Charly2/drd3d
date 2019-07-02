<?php
/**
 * Created by PhpStorm.
 * User: CHARLY
 * Date: 07/04/2019
 * Time: 11:51 PM
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




function setViewIndex($view,$args="",$ver = false){
    if ($ver){
        print_r($args);
    }
    extract($args);
    $_VIEW = $view;
    include_once '../vistas/layout_index.php';
}

function setErrorIndex($args="Ocurrio un error"){

    $_ERROR = $args;
    $_VIEW = "error_custom";
    include_once '../vistas/layout_index.php';
}

function setViewApp($view,$args="",$ver = false){
    if ($ver){
        print_r($args);
    }
    extract($args);
    $_VIEW = $view;
    include_once '../vistas/layout_app.php';
}

function setViewApp_SL($view,$args="",$ver = false){
    if ($ver){
        print_r($args);
    }
    extract($args);
    $_VIEW = $view;
    include_once '../vistas/app/vis_'.$_VIEW.".php";
}



function _setUrl($url){
    global $_SUC;
    return URL_BASE.$_SUC."/".$url;
}

function encryptIt( $q ) {

    return base64_encode( $q );
}

function decryptIt( $q ) {
    return base64_decode( $q );
}


function autoUpdate($model, $name, $id , $controller,$value,$min,$max){
    $url = _setUrl($controller);
    return "data-model='$model' data-name='$name' data-id='$id' data-controller='$url' value='$value' data-min='$min' data-max='$max'";
}

function prEx($r){
    print_r($r);
    die("-----AQUI SALI -----");
}





function repuesta_tipo($ti , $val){
    switch ($ti){
        case '1':
            switch ($val){
                case '1':
                        return 'Mala';
                    break;
                case '2':
                        return 'Regular';
                    break;
                case '3':
                        return 'Buena';
                    break;
                case '4':
                        return 'Muy Buena';
                    break;
            }
            break;
        case '2':
            switch ($val){
                case '1':
                        return 'Amable';
                    break;
                case '2':
                        return 'Descortes';
                    break;
            }
            break;
        case '3':
            switch ($val){
                case '1':
                        return 'Si';
                    break;
                case '2':
                        return 'No';
                    break;
            }
            break;
        case '4':
            switch ($val){
                case '1':
                    return 'Excelente';
                    break;
                case '2':
                    return 'Buena';
                    break;
                case '3':
                    return 'Regular';
                    break;
                case '4':
                    return 'Mala';
                    break;
                case '5':
                    return 'Muy Mala';
                    break;
            }
            break;
        case '5':
            switch ($val){
                case '1':
                    return 'Observar al personal';
                    break;
                case '2':
                    return 'Capacitar al personal';
                    break;
                case '3':
                    return 'Personal muy bueno';
                    break;
            }
            break;
        case '6':
            return $val;
            break;
    }
}


function sendMail ($_UR,$to,$name,$sub,$html){



//Load composer's autoloader
    require '../vendor/autoload.php';

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'cendicontacto@gmail.com';                 // SMTP username
        $mail->Password = 'Charly123.';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('cendicontacto@gmail.com', $_UR);
        $mail->addAddress($to, $name);     // Add a recipient
        //$mail->addReplyTo('info@example.com', 'Information');


        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        /*$mail->AddAddress('recipient1@domain.com', 'First Name');
        $mail->AddAddress('recipient2@domain.com', 'Second Name');
        $mail->AddAddress('recipient3@domain.com', 'Third Name');*/


        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $sub;
        $mail->Body    = $html;

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        return false;
    }   
}
function getMailLogin($nombre,$tel,$preg,$com="",$suc){
    $a .=  '
    
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Demystifying Email Design</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 10px 0 30px 0;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                    <tr>
                        <td align="center" bgcolor="#ffffff" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                            <img src="http://www.drd3d.com/CursosDRD3D/PlaticasOP_2015/imgs/LOGODRD1.png" alt="Creating Email Magic" width="" height="230" style="display: block;" />
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="padding: 5px 0 5px 0;color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                        Sucursal: <b>'.$suc.'</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px 0 5px 0;color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                        Nombre: <b>'.$nombre.'</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px 0 5px 0;color: #153643; font-family: Arial, sans-serif; font-size: 24px;margin-top: 15px">
                                        Teléfono: <b>'.$tel.'</b>
                                    </td>
                                </tr>


                                <tr>
                                    <td style="padding: 5px 0 5px 0;color: #153643; font-family: Arial, sans-serif; font-size: 24px;margin-top: 15px">
                                        Comentario:
                                    </td>
                                </tr>
                                <tr style="padding: 10px 0 10px 0;">
                                    <td style=" color: #153643; font-family: Arial, sans-serif; font-size: 20px; line-height: 20px;">
                                        <b>'.$com.'</b>
                                    </td>
                                </tr>

                                <tr style="padding: 100px 0 100px 0;">
                                    <td>&nbsp;</td>
                                </tr>
                                ';
                                foreach($preg as $p){
                                $a .= '<tr>
                                    <td style="padding: 5px 0 5px 0;color: #153643; font-family: Arial, sans-serif; font-size: 24px;margin-top: 15px">
                                        '.$p["preg"].':
                                    </td>
                                </tr>
                                <tr>
                                    <td style=" color: #153643; font-family: Arial, sans-serif; font-size: 20px; line-height: 20px;">
                                        <b>'.$p["txt"].'</b>
                                    </td>
                                </tr>';
                                }
                            $a .= '</table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#12a284" style="padding: 30px 30px 30px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 20px;" width="75%">
                                        <a href="#" style="color: #ffffff;"><font color="#ffffff"></font></a> DRD3D - Recopilador de Encuestas  de Calidad en el Servicio
                                    </td>

                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </body>
    </html>
    ';
    return $a;
    }
function quita_acentos($cadena) {
    $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
    $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
    $texto = str_replace($no_permitidas, $permitidas ,$cadena);
    return $texto;
}
function print_preg_tipo1($pre){?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="titulo_pre"> <?=$pre['texto']?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="cont_resp">
                    <div class="resp_item" data-id_Pregunta="<?=$pre['id_Pregunta']?>" data-value="1">
                        <img src="<?=URL_ASSETS?>assets/img/resp/res_a_1.svg" alt="">
                        <p style="color:#009b7a">Muy Buena</p>
                    </div>
                    <div class="resp_item" data-id_Pregunta="<?=$pre['id_Pregunta']?>" data-value="2">
                        <img src="<?=URL_ASSETS?>assets/img/resp/res_a_3.svg" alt="">
                        <p style="color: #7fef37">Buena</p>
                    </div>
                    <div class="resp_item" data-id_Pregunta="<?=$pre['id_Pregunta']?>" data-value="3">
                        <img src="<?=URL_ASSETS?>assets/img/resp/res_a_2.svg" alt="">
                        <p style="color: #f2db36">Regular</p>
                    </div>
                    <div class="resp_item" data-id_Pregunta="<?=$pre['id_Pregunta']?>" data-value="4">
                        <img src="<?=URL_ASSETS?>assets/img/resp/res_a_4.svg" alt="">
                        <p style="color:#dc3545">Mala</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}
function print_preg_tipo2($pre){?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="titulo_pre"> <?=$pre['texto']?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="cont_resp">
                    <div class="resp_item" data-id_Pregunta="<?=$pre['id_Pregunta']?>" data-value="1">
                        <img src="<?=URL_ASSETS?>assets/img/resp/res_b_2.svg" alt="">
                        <p>Amable</p>
                    </div>
                    <div class="resp_item" data-id_Pregunta="<?=$pre['id_Pregunta']?>" data-value="2">
                        <img src="<?=URL_ASSETS?>assets/img/resp/res_b_1.svg" alt="">
                        <p>Descortes</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}

function print_preg_tipo3($pre){?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="titulo_pre"> <?=$pre['texto']?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="cont_resp">
                    <div class="resp_item" data-ios="<?=$pre['rango']?>" data-id_Pregunta="<?=$pre['id_Pregunta']?>" data-value="1">
                        <img src="<?=URL_ASSETS?>assets/img/resp/res_c_1.svg" alt="">
                        <p class="text_verde">Si</p>
                    </div>
                    <div class="resp_item"  data-id_Pregunta="<?=$pre['id_Pregunta']?>" data-value="2">
                        <img src="<?=URL_ASSETS?>assets/img/resp/res_c_2.svg" alt="">
                        <p class="text_rojo">No</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}

function print_preg_tipo4($pre){?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="titulo_pre"> <?=$pre['texto']?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="cont_resp">
                    <div class="resp_item" style="margin-left: 10px" data-id_Pregunta="<?=$pre['id_Pregunta']?>" data-value="1">
                        <img src="<?=URL_ASSETS?>assets/img/resp/res_d_1.svg" alt="">
                        <p>Excelente</p>
                    </div>
                    <div class="resp_item" style="margin-left: 10px" data-id_Pregunta="<?=$pre['id_Pregunta']?>" data-value="2">
                        <img src="<?=URL_ASSETS?>assets/img/resp/res_d_2.svg" alt="">
                        <p>Buena</p>
                    </div>
                    <div class="resp_item" style="margin-left: 10px" data-id_Pregunta="<?=$pre['id_Pregunta']?>" data-value="3">
                        <img src="<?=URL_ASSETS?>assets/img/resp/res_d_3.svg" alt="">
                        <p>Regular</p>
                    </div>
                    <div class="resp_item" style="margin-left: 10px" data-id_Pregunta="<?=$pre['id_Pregunta']?>" data-value="4">
                        <img src="<?=URL_ASSETS?>assets/img/resp/res_d_4.svg" alt="">
                        <p>Mala</p>
                    </div>
                    <div class="resp_item" style="margin-left: 10px" data-id_Pregunta="<?=$pre['id_Pregunta']?>" data-value="5">
                        <img src="<?=URL_ASSETS?>assets/img/resp/res_d_5.svg" alt="">
                        <p>Muy Mala</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}


function print_preg_tipo5($pre){?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="titulo_pre"> <?=$pre['texto']?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="cont_resp">
                    <div class="resp_item" data-id_Pregunta="<?=$pre['id_Pregunta']?>" data-value="1">
                        <img src="<?=URL_ASSETS?>assets/img/resp/res_t_3.svg" alt="">
                        <p>Personal muy bueno</p>
                    </div>
                    <div class="resp_item" data-id_Pregunta="<?=$pre['id_Pregunta']?>" data-value="2">
                        <img src="<?=URL_ASSETS?>assets/img/resp/res_t_2.svg" alt="">
                        <p>Capacitar al personal</p>
                    </div>
                    <div class="resp_item" data-id_Pregunta="<?=$pre['id_Pregunta']?>" data-value="3">
                        <img src="<?=URL_ASSETS?>assets/img/resp/res_t_1.svg" alt="">
                        <p>Observar al personal</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}


?>












