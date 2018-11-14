<?php
	$conexion = new mysqli("localhost", "Administrador", "proyectos", "seleccion_proyectos");
	if ($conexion->connect_errno) 
	{
 		echo "<br>Error: Fallo al conectarse a MySQL debido a:" ;
   	 	echo "<br>Errno: " . $conexion->connect_errno;
    	echo "<br>Error: " . $conexion->connect_error;
        exit;
	}
	$nombre = $conexion->real_escape_string($_POST['nombre']);
	$desc = $conexion->real_escape_string($_POST['descripcion']);
	$costo = $conexion->real_escape_string($_POST['costo']);

   
   $sql = "insert into proyecto( descripcion, costo, nombre) values ('$desc', '$costo', '$nombre');";
	$conexion->query($sql);

	if($conexion->affected_rows>0){
		echo'<script type="text/javascript">
		alert("Criterio insertado");
		window.location.href="registro_proyectos.php";
		</script>';
	}else{ 
		echo'<script type="text/javascript">
		alert("Criterio no insertado");
		window.location.href="registro_proyectos.php";
		</script>';
	}  
	$conexion->close();
?>