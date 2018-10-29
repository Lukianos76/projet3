<?php
session_start();
include_once ('_config.php');

MyAutoload::start();

if(!isset($_GET['r'])){
    $_GET['r'] = "";
}
$request = $_GET['r'];


$routeur = new Routeur($request);
$routeur->renderController();


