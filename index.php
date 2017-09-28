<?php
ini_set('soap.wsdl_cache_enabled', 'Off');
include ('server/Car.php');
include ('config.php');
$obj = new Car();
$obj->getConn();
try {
    $server = new SoapServer('server/wsdl.wsdl');
    $server->setClass("Car");
    $server->setPersistence(SOAP_PERSISTENCE_SESSION);
    $server->handle();
} catch (ExceptionFileNotFound $e) {
    echo 'Error message: ' . $e->getMessage();
}
$client = new
SoapClient(
    "http://localhost/dashboard/soaptask2/index.php?a=Car&amp;amp;action=wsdl"
);
echo $client->getListOfCars();



?>