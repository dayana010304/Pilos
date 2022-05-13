<?php

$serverName = "PASOFTWARE\SQLEXPRESS";
$connectionInfo = array( "Database"=>"Huelleroces");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

?>