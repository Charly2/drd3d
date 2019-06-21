<?php
/**
 * Created by PhpStorm.
 * User: CHARLY
 * Date: 07/04/2019
 * Time: 10:41 PM
 */

session_start();

     error_reporting(0);
//

$_PATH = explode('/',$_GET{'url'});
$_PATH[1] = $_PATH[1]?$_PATH[1]:'index';
$_PATH[0] = $_PATH[0]?$_PATH[0]:'index';

if (!$_SESSION['user'] && $_PATH[0] !="login" ){

     header("location: /drd3d/app/login/index");
}

include_once '../config/config.php';
include_once '../lib/util.php';






include_once $_PATH[0].'_controller.php';


//include_once 'prueba_l.php';
?>
