<!DOCTYPE html>
<html>
<head>
	<title>Matriz de Decisión</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.all.min.js"></script>
  <style type="text/css">
  	body{
  		background: #263238;
  	}

  	.left-page{
	    position: fixed;
	    left: 23px;
	    bottom: 23px;
	    padding-top: 15px;
	    margin-bottom: 0;
	    z-index: 997;
  	}
  </style>
</head>
<body>
<div class="row">
	<div class="col s12 l8 offset-l2">
		<div class="card">
			<table class="centered striped">
		        <thead>
		          <tr>
		              <th>Criterio</th>
		              <th>Ponderación</th>
		              <?php
		              	$conexion = new mysqli("localhost", "Administrador", "proyectos", "seleccion_proyectos");
								if ($conexion->connect_errno) 
								{
									echo "<br>Error: Fallo al conectarse a MySQL debido a:" ;
								 	echo "<br>Errno: " . $conexion->connect_errno;
								   	echo "<br>Error: " . $conexion->connect_error;
								    exit;
								}
								$sql = $conexion->query("select * from proyecto");
								$result = $sql->num_rows;
								if ($result > 0) {
								// output data of each row
							  $cont = 0; 
							  $ID_TABLA = 0; 
							  $fil = 1; 
								while($row = $sql->fetch_assoc()) {
									echo "<th>".$row["nombre"]."</th>"; 
						           		  $fil++; 
										  $cont++;  
										}

									} 

								else {
										echo "0 Proyectos";
								}
							$conexion->close();
		              ?>
		          </tr>
		        </thead>

		        <tbody>
		          	<?php
		          		$conexion = new mysqli("localhost", "Administrador", "proyectos", "seleccion_proyectos");
								if ($conexion->connect_errno) 
								{
									echo "<br>Error: Fallo al conectarse a MySQL debido a:" ;
								 	echo "<br>Errno: " . $conexion->connect_errno;
								   	echo "<br>Error: " . $conexion->connect_error;
								    exit;
								}
								$sql2 = $conexion->query("select * from criterio");
								$result2 = $sql2->num_rows;
								if ($result > 0) {
								// output data of each row
							  $cont = 0; 
							  $ID_TABLA = 0; 
							  $fil = 1; 
								while($row2 = $sql2->fetch_assoc()) {
									echo "<tr>";
									echo "<td>".$row2["nombre"]."</td><td>".$row2["ponderacion"]."</td>"; 
									echo "<td></td>";
									echo "<td></td>";
									echo "</tr>";
						           		  $fil++; 
										  $cont++;  

										  if($row["tipo"] == "cuantitativo"){
										  	if($row["valor"]=="mayor"){
										  		$num = 
										  		$orden = "DESC";
										  		$sql = 'select from criterio_de_proyecto(pid,valor) where cid="$" order by valor $orden';
										  		$result = $sql->num_rows;
												if ($result > 0) {
													while($row = $sql->fetch_assoc()){
														for($i=1; $i<$result; $i++){
															$dato = $row["valor"];
															echo "<td>".$row[""]."</td>";
														}
													}
												}
										  	}
										  	else if($row["valor"]=="menor"){
										  		$orden = "ASC";
										  		$sql = 'select from criterio_de_proyecto(valor) where cid="$" order by valor $orden';

										  	}
										  }

										  else if($row["tipo"] == "cualitativo"){
										  	if($row["valor"]=="muy alto"){

										  	}
										  	else if($row["valor"]=="alto"){
										  		
										  	}
										  	else if($row["valor"]=="moderado"){
										  		
										  	}
										  	else if($row["valor"]=="bajo"){
										  		
										  	}
										  	else if($row["valor"]=="muy bajo"){
										  		
										  	}

										  }
								}

									} 

								else {
										echo "0 Criterios";
								}
							$conexion->close();
						?>
		        </tbody>
		      </table>
		</div>
	</div>
</div>
<div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large blue" href="analisis.html">
      <i class="material-icons">arrow_right</i>
    </a>
</div>

<div class="left-page horizontal click-to-toggle">
    <a class="btn-floating btn-large blue" href="valores.html">
      <i class="material-icons">arrow_left</i>
    </a>
</div>
</body>
</html>