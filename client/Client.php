<?php
include('../config.php');
$client = new SoapClient('http://192.168.0.15/~user2/SOAP/soapTask2/server/MySoap.wsdl',array('connection_timeout' => 120));
print_r($client->getListOfCars());

include('template/index.html');


?>
