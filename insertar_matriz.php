<?php
	$conexion = new mysqli("localhost", "Administrador", "proyectos", "seleccion_proyectos");
	if ($conexion->connect_errno) 
	{
 		echo "<br>Error: Fallo al conectarse a MySQL debido a:" ;
   	 	echo "<br>Errno: " . $conexion->connect_errno;
    	echo "<br>Error: " . $conexion->connect_error;
        exit;
	}

	$proy = $_POST['proyectos'];
	$crit = $_POST['criterios'];
	$datos = $_POST['cadena'];
	$data = explode("#", $datos);
	$aux = 0;
	for($i=1; $i<=$crit; $i++){
		for($j=1; $j<=$proy; $j++){
			$valor = $data[$aux];
			$sql3 = "insert into CRITERIO_DE_PROYECTO(cid, pid, valor) values ('$i', '$j', '$valor');";
			$conexion->query($sql3);
			$aux++;
		}
	}

			if($conexion->affected_rows>0){
				echo'<script type="text/javascript">
				alert("Criterio insertado");
				window.location.href = "insertar_matriz2.php";
				</script>';
			}

			else{ 
				echo'<script type="text/javascript">
				alert("Criterio no insertado");
				window.location.href = "insertar_matriz2.php";
				</script>';
			}  
   
	$conexion->close();
?>