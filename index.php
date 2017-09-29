<?php
include ('server/Car.php');
include ('config.php');
$obj = new Car();
$obj->getConn();
/*var_dump($obj->getListOfCars());
var_dump($obj->getListOfCarsById(1));
echo "<br>";
echo "<br>";
$arr = array('color'=>'red');
var_dump($obj->getListOfCarsByParams($arr));

$arr2 = array('id_car'=>'2','name'=>'Solo','sername'=>'Valex','pay'=>'Web');
$obj->getOrderCar($arr2);

*/

try {
$server = new SoapServer('server/wsdl.wsdl');
$server->setClass('Car');
$server->setPersistence(SOAP_PERSISTENCE_SESSION);

$server->handle();
} catch (ExceptionFileNotFound $e) {
echo 'Error message: ' . $e->getMessage();
}
$client = new
SoapClient('http://192.168.0.15/~user2/SOAP/soapTask2/server/wsdl.wsdl', array('trace' => true, 'keep_alive' => false));
 $client->getListOfCars();
echo "REQUEST:\n" . $client->__getLastRequest() . "\n";




?>
