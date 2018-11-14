<?php
	$conexion = new mysqli("localhost", "Administrador", "proyectos", "seleccion_proyectos");
	if ($conexion->connect_errno) 
	{
 		echo "<br>Error: Fallo al conectarse a MySQL debido a:" ;
   	 	echo "<br>Errno: " . $conexion->connect_errno;
    	echo "<br>Error: " . $conexion->connect_error;
        exit;
	}
		$sql2 = $conexion->query("select id,tipo, valor from criterio");
		$result2 = $sql2->num_rows;
		if ($result2 > 0) {
			$cont;
			while($row2 = $sql2->fetch_assoc()) {
				$cont = $row2["id"];
				echo $cont;
				if($row2["tipo"]=="Cuantitativo"){
					if($row2["valor"]=="menor"){
						$int = -1;
						$sql = $conexion->query("select * from criterio_de_proyecto where cid = '$cont' order by valor asc");
						$result = $sql->num_rows;
						if ($result > 0) {
							while($row = $sql->fetch_assoc()) {
								$val1 = $row["CID"];
								$val2 = $row["PID"];
								$int += 2;
								$sql4 = "insert into matriz(cid,pid, valor) values ('$val1', '$val2', '$int')";	
								echo $sql4;
								$conexion->query($sql4);		
							}
						}
					}
					else if($row2["valor"]=="mayor"){
						$cont = $row2["id"];
						$sql = $conexion->query("select * from criterio_de_proyecto where cid = '$cont' order by valor desc");
						$result = $sql->num_rows;
						if ($result > 0) {
							$int = ($result*2)-1;
							while($row = $sql->fetch_assoc()) {
								$val1 = $row["CID"];
								$val2 = $row["PID"];
								$sql4 = "insert into matriz(cid,pid, valor) values ('$val1', '$val2', '$int')";	
								$int -= 2;
								echo $sql4;
								$conexion->query($sql4);		
							}
						}
					}
				}
				else if($row2["tipo"]== "Cualitativo"){
					$cont = $row2["id"];
					
					if($row2["valor"]=="muy bajo" || $row2["valor"]=="bajo" || $row2["valor"] == "moderado"){
						$int = -1;
						$sql = $conexion->query("select * from criterio_de_proyecto where cid = '$cont' order by valor asc");
						$result = $sql->num_rows;
						if ($result > 0) {
							while($row = $sql->fetch_assoc()) {
								$val1 = $row["CID"];
								$val2 = $row["PID"];
								$int += 2;
								$sql4 = "insert into matriz(cid,pid, valor) values ('$val1', '$val2', '$int')";	
								echo $sql4;
								$conexion->query($sql4);		
							}
						}
					}
					else if($row2["valor"] == "alto" || $row2["valor"] == "muy alto"){
						$cont = $row2["id"];
						$sql = $conexion->query("select * from criterio_de_proyecto where cid = '$cont' order by valor desc");
						$result = $sql->num_rows;
						if ($result > 0) {
							$int = ($result*2)-1;
							while($row = $sql->fetch_assoc()) {
								$val1 = $row["CID"];
								$val2 = $row["PID"];
								$sql4 = "insert into matriz(cid,pid, valor) values ('$val1', '$val2', '$int')";	
								$int -= 2;
								echo $sql4;
								$conexion->query($sql4);		
							}
						}
					}
				}
			}
		}

		if($conexion->affected_rows>0){
				echo'<script type="text/javascript">
				alert("Criterio insertado");
				window.location.href = "matriz_decision.php";
				</script>';
			}

			else{ 
				echo'<script type="text/javascript">
				alert("Criterio no insertado");
				window.location.href = "matriz_decision.php";
				</script>';
			}  

	$conexion->close();
?>