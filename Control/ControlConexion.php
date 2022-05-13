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
            echo '<script type="text/javascript">
                    alert("Registro guardado con exito");
                    window.location.href="index.php";
                </script>';
        }else{
            echo '<script type="text/javascript">
                    alert("No se pudo guardar el registro");
                    window.location.href="index.php";
                </script>';
        }
	}

    public function consultarDatos($consultaSQL){
        $conexionBD=$this->conectarBD();
        $consultaBuscarDatos= $conexionBD->prepare($consultaSQL);
        $consultaBuscarDatos->setFetchMode(PDO::FETCH_ASSOC);
        $consultaBuscarDatos->execute();
        return($consultaBuscarDatos->fetchAll());
    }

    public function editarDatos($consultaSQL){
        $conexionBD=$this->conectarBD();
        $consultaEditarDatos= $conexionBD->prepare($consultaSQL);
        $resultado=$consultaEditarDatos->execute();
        if($resultado){
            echo("Registro editado con exito");
        }else{
            echo("Error editando el registro");
        }
    }

}

?>