<?php
include_once 'layout/header_app.php';
include_once 'layout/nav_app.php';?>






    <main class="page-content">
        <div class="container-fluid">
            <? include_once 'app/vis_'.$_VIEW.".php";?>
        </div>

    </main>


<?
include_once 'layout/fotter_app.php';
?>