<?php
ini_set("soap.wsdl_cache_enabled", "0");
include('../config.php');
include('Car.php');
$obj = new Car();
$server = new SoapServer("MySoap.wsdl");
$server->setClass("Car");
$server->handle();



?>
