<?php
/**
 * Created by PhpStorm.
 * User: CHARLY
 * Date: 07/04/2019
 * Time: 10:34 PM
 */
session_start();



error_reporting(0 );
//


include_once '../config/config.php';
include_once '../lib/util.php';




$_PATHPRE = explode('/',$_GET{'url'});




$_SUC = $_PATHPRE[0];



$_PATH[0]=$_PATHPRE[1];
$_PATH[1]=$_PATHPRE[2];
$_PATH[2]=$_PATHPRE[3];
$_PATH[3]=$_PATHPRE[4];
$_PATH[4]=$_PATHPRE[5];






$_PATH[1] = $_PATH[1]?$_PATH[1]:'index';


include_once $_PATH[0].'_controller.php';






?>
