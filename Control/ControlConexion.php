<?php
class ControlConexion
{
    public function __construct(){}

    public function conectarBD()
    {
        try
        {
            $infoDB="sqlsrv:server=PASOFTWARE\SQLEXPRESS;database=Huelleroces";
            $conexionBD=new PDO($infoDB);
            return($conexionBD);
        }catch(PDOException $error){
            echo($error->getMessage());
        }
    }

	public function agregarDatos($consultaSQL){
		$conexionBD=$this->conectarBD();
        $consultaInsertarDatos= $conexionBD->prepare($consultaSQL);
        $resultado=$consultaInsertarDatos->execute();
        if ($resultado){
            echo("Registro agregado con exito");
        }else{
            echo("Error agregando el registro");
        }
	}

    public function consultarDatos($consultaSQL){
        $conexionBD=$this->conectarBD();
        $consultaBuscarDatos= $conexionBD->prepare($consultaSQL);
        $consultaBuscarDatos->setFetchMode(PDO::FETCH_ASSOC);
        $consultaBuscarDatos->execute();
        return($consultaBuscarDatos->fetchAll());
    }

}

?>