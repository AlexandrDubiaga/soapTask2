<?php
include('../config.php');
$client = new SoapClient('http://localhost/dashboard/soap/server/MySoap.wsdl',array('connection_timeout' => 120));



include('template/index.html');


?>