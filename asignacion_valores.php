<!DOCTYPE html>
<html>
<head>
	<title>Asignación de valores</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

  	#demo{
  		display: none;
  	}
  </style>
</head>
<body>
<div class="row">
	<div class="col s12 l10 offset-l1">
		<div class="card">
				<table class="centered striped">
			        <thead>
			          <tr>
			              <th>Criterio</th>
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
								  		$cont = 0; 
								  		$ID_TABLA = 0; 
								  		$fil = 1; 
										while($row = $sql->fetch_assoc()) {
											echo "<th>".$row["nombre"]."</th>"; 
								           		  $fil++; 
												  $cont++;  
												}

									} 
									else 
									{
										echo "0 Proyectos";
									}
										//$conexion->close();
			              			echo "</tr>";
			        				echo "</thead>";

			        				echo "<tbody>";
			          				echo "<tr>";
									
									$sql2 = $conexion->query("select * from criterio");
									$result2 = $sql2->num_rows;
									if ($result2 > 0) {
										// output data of each row
								  		$cont2 = 0; 
								  		$ID_TABLA2 = 0; 
								  		$fil2 = 0; 
								  		$aux = 0;
											while($row2 = $sql2->fetch_assoc()) {
												echo "<tr>";
												echo "<td>".$row2["nombre"]."</td>"; 
									           		    
												if($row2["tipo"]=="Cuantitativo"){
													$content = "<input type='number' class='hp'";
												}	  
												else if($row2["tipo"]=="Cualitativo"){
													$content = "<select class='hp'><option value='' disabled selected>Elige una opcion</option><option value='1'> Muy Alto</option><option value='2'>Alto</option><option value='3'>Moderado</option><option value='4'>Bajo</option><option value='5'>Muy Bajo</option></select>";
												}

												for($i = 1; $i<$result2; $i++){
													echo "<td>".$content."</td>";
												}
												
												echo "</tr>";
												$aux++;
											}
									} 

									else {
										echo "0 Proyectos";
									}
							$conexion->close();
			              ?>
			        </tbody>
			    		

			      </table>
		</div>
		<a class="waves-effect waves-light btn right" onclick="cargar()"><i class="material-icons left">save</i>Cargar Valores</a>
		<form action="insertar_matriz.php" method="post">
		<p id="demo">
			<input type="text" name="cadena" id="inputt">
			<input type="number" id="proyectos" name="proyectos">
			<input type="number" id="criterios" name="criterios">
		</p>
		<button type="submit"><a class="waves-effect waves-light btn right"><i class="material-icons left">done</i>Evaluar</a><button>
		</form>

	</div>
</div>
<div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large blue" href="matriz_decision.php">
      <i class="material-icons">arrow_right</i>
    </a>
</div>

<div class="left-page horizontal click-to-toggle">
    <a class="btn-floating btn-large blue" href="registro_proyectos.php">
      <i class="material-icons">arrow_left</i>
    </a>
</div>
</body>
<script type="text/javascript">
  	$(document).ready(function(){
	    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
	    $('select').material_select();
  	});

  	/*function validate(){
  		for(i=1; i<= <?php $result ?>; i++)
  			for(j=1; j<= <?php  $result2 ?>; j++){
  				if((document.getElementById(j).value)=="" )
  					swal('Los campos deben estar completados');
  			}
  	}*/
  	function cargar(){
  		var info = "";
  		var num = 0;
  		let inputs = document.querySelectorAll('.hp');
		for (var i = 0; i < inputs.length; i++)
				if((inputs[i].value) != undefined){
  				info+= inputs[i].value; 
  				info+= "#";
  			}
  			document.getElementById("inputt").value = info;
  			document.getElementById("proyectos").value = <?php echo $result; ?>;
  			document.getElementById("criterios").value = <?php echo $result2; ?>;
  			swal('Valores cargados correctamente');
  	}

  </script>
</html>