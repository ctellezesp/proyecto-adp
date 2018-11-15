<?php
	$conexion = new mysqli("localhost", "Administrador", "proyectos", "seleccion_proyectos");
	if ($conexion->connect_errno) 
	{
 		echo "<br>Error: Fallo al conectarse a MySQL debido a:" ;
   	 	echo "<br>Errno: " . $conexion->connect_errno;
    	echo "<br>Error: " . $conexion->connect_error;
        exit;
	}

	$sql = "delete from criterio where id>5";
	$sql2 = "delete from criterio_de_proyecto"; 
	$sql3 = "delete from matriz";
	$sql4 = "delete from proyecto";
	$conexion->query($sql);
	$conexion->query($sql2);
	$conexion->query($sql3);
	$conexion->query($sql4);

	if($conexion->affected_rows>0){
		echo'<script type="text/javascript">
		window.location.href="index.php";
		</script>';
	}else{ 
		echo'<script type="text/javascript">
		window.location.href="index.php";
		</script>';
	}  
	$conexion->close();
?>