<?php
	$conexion = new mysqli("localhost", "Administrador", "proyectos", "seleccion_proyectos");
	if ($conexion->connect_errno) 
	{
 		echo "<br>Error: Fallo al conectarse a MySQL debido a:" ;
   	 	echo "<br>Errno: " . $conexion->connect_errno;
    	echo "<br>Error: " . $conexion->connect_error;
        exit;
	}
	$data = $_POST['data'];
	$crit = $_POST['criterios'];
	$datos = explode("#", $data);


	for($i=1 ; $i<=$crit; $i++){
		$valor = $datos[$i-1];
   		$sql = "update criterio set ponderacion='$valor' where id='$i'";
		$conexion->query($sql);
	}
	$conexion->close();
?>