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



function _setUrl($url){
    return URL_BASE.$url;
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












function sendMail ($to,$name,$sub,$html){



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
        $mail->setFrom('cendicontacto@gmail.com', 'Mailer');
        $mail->addAddress($to, $name);     // Add a recipient
        //$mail->addReplyTo('info@example.com', 'Information');


        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name




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


function getMailLogin($mail,$pass,$nombre){
    return "<h1>Maquetado de mailing</h1>";

}

function quita_acentos($cadena) {
    $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
    $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
    $texto = str_replace($no_permitidas, $permitidas ,$cadena);
    return $texto;
}


?>