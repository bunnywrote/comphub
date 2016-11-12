<?php
session_start();
define("ROOT", realpath($_SERVER["DOCUMENT_ROOT"]));

require_once("Controllers/Controller.php");
require_once("Controllers/AuthController.php");

require_once("Helpers/Helper.php");

$controller;

if(!isset($_SESSION['lang']))
    $_SESSION['lang'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

//Routing
// if(count($_GET) > 0){
//     switch ($_GET['type']){
//         case "login":


$controller = new AuthController();
$controller->actionIndex();
?>