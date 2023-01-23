<?php
/*
$serverName = "PASOFTWARE\SQLEXPRESS";
$connectionInfo = array( "Database"=>"Huelleroces");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
     die( print_r( sqlsrv_errors(), true));
}

?>

<?php
*/
{
    try
    {
        $infoDB="sqlsrv:server=PADCOSSIO1\SQLEXPRESS;database=Huelleroces";
        $conexionBD=new PDO($infoDB);
        return($conexionBD);
    }catch(PDOException $error){
        echo($error->getMessage());
    }
}

	
?>