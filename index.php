<?php
ini_set('soap.wsdl_cache_enabled', 'Off');
include ('server/Car.php');
include ('config.php');
$obj = new Car();
$obj->getConn();
var_dump($obj->getListOfCars());
var_dump($obj->getListOfCarsById(2));
echo "<br>";
echo "<br>";
var_dump($obj->getListOfCarsByParams('Ferarri'));



/*try {
    $server = new SoapServer('server/wsdl.wsdl');
    $server->setClass("Car");
    $server->setPersistence(SOAP_PERSISTENCE_SESSION);
    $server->handle();
} catch (ExceptionFileNotFound $e) {
    echo 'Error message: ' . $e->getMessage();
}
/*$client = new
SoapClient(
    "http://192.168.0.15/~user2/SOAP/soapTask2/index.php?a=Car&amp;amp;action=wsdl"
);
echo $client->getListOfCars();*/



?>
