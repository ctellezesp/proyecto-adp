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
				if($row2["tipo"]=="cuantitativo"){
					if($row2["valor"]=="menor"){
						$int = -1;
						$sql = $conexion->query("select * from criterio_de_proyecto where cid = '$cont' order by valor asc");
						$result = $sql->num_rows;
						if ($result > 0) {
							while($row = $sql->fetch_assoc()) {
								$val1 = $row["cid"];
								$val2 = $row["pid"];
								$int += 2;
								$sql2 = "insert into matriz(cid,pid, valor) values ('$val1', '$val2', '$int')";			
							}
						}
					}
					else if($row2["valor"]=="mayor"){
						$sql = $conexion->query("select * from criterio_de_proyecto where cid = 1 order by valor desc");
						$result = $sql->num_rows;
						if ($result > 0) {
							$int = $result;
							while($row = $sql->fetch_assoc()) {
								$val1 = $row["cid"];
								$val2 = $row["pid"];
								$int -= 2;
								$sql2 = "insert into matriz(cid,pid, valor) values ('$val1', '$val2', '$int')";			
							}
						}
					}
				}
				else if($row2["tipo"]== "cualitativo"){
					if($row2["valor"]=="muy bajo" || $row2["valor"]=="bajo" || $row["valor"] == "moderado"){
						$int = -1;
						$sql = $conexion->query("select * from criterio_de_proyecto where cid = 1 order by valor asc");
						$result = $sql->num_rows;
						if ($result > 0) {
							while($row = $sql->fetch_assoc()) {
								$val1 = $row["cid"];
								$val2 = $row["pid"];
								$int += 2;
								$sql2 = "insert into matriz(cid,pid, valor) values ('$val1', '$val2', '$int')";			
							}
						}
					}
					else if($row2["valor"] == "alto" || $row2["valor"] == "muy alto"){
						$sql = $conexion->query("select * from criterio_de_proyecto where cid = 1 order by valor desc");
						$result = $sql->num_rows;
						if ($result > 0) {
							$int = $result;
							while($row = $sql->fetch_assoc()) {
								$val1 = $row["cid"];
								$val2 = $row["pid"];
								$int -= 2;
								$sql2 = "insert into matriz(cid,pid, valor) values ('$val1', '$val2', '$int')";			
							}
						}
					}
				}
			}
		}
?>