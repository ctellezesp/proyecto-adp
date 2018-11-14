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
	$tipo = $conexion->real_escape_string($_POST['tipo']);
	$valor = $conexion->real_escape_string($_POST['valor']);

   
   $sql = "insert into criterio( nombre, tipo, valor) values ('$nombre', '$tipo', '$valor');";
	$conexion->query($sql);

	if($conexion->affected_rows>0){
		echo'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.all.min.js"></script><script type="text/javascript">
		alert("Criterio insertado");
		window.location.href="index.php";
		</script>';
	}else{ 
		echo'<script type="text/javascript">
		alert("Criterio no insertado");
		window.location.href="index.php";
		</script>';
	}  
	$conexion->close();
?>