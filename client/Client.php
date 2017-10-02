<?php
include('../config.php');
print_r($client->__getFunction());
$client = new SoapClient('http://192.168.0.15/~user2/SOAP/soapTask2/server/MySoap.wsdl',array('connection_timeout' => 120));
var_dump($client->__getFunctions());

include('template/index.html');


?>
