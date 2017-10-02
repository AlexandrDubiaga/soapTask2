<?php
ini_set("soap.wsdl_cache_enabled", "0");
include('../config.php');
include('Car.php');
$obj = new Car();
$obj->getConn();

$server = new SoapServer("wsdl.wsdl");
$server->setClass("Car");
$server->handle();






?>
