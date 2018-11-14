<!DOCTYPE html>
<html>
<head>
	<title>Análisis de costos</title>
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
			<div class="row">
				<div class="input-field col s12">
		          <i class="material-icons prefix">attach_money</i>
		          <input id="inversion" type="number" class="validate">
		          <label for="inversion">Presupuesto de inversión</label>
		        </div>
			</div>
			<a class="waves-effect waves-light btn right" onclick="calcular()"><i class="material-icons left">done</i>Analizar</a>
		</div>
	</div>
	<div class="col s12 l8 offset-l2">
		<div class="card">
			<table class="centered striped">
		        <thead>
		          <tr>
		              <th>Prioridad</th>
		              <th>Proyecto</th>
		              <th>Costo</th>
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
								$sql = $conexion->query("select p.nombre, sum(valor) as valor, p.costo from matriz m, proyecto p where m.pid = p.ID GROUP by (pid) having avg(valor) order by valor desc");
								$result = $sql->num_rows;
								if ($result > 0) {
									$aux=1;
									while($row = $sql->fetch_assoc()) {
										echo "<tr>";
											echo "<td>".$aux."</td>";
											echo "<td>"."<p id='$aux-name'>".$row["nombre"]."</p>"."</td>";
											echo "<td>"."<p id='$aux'>".$row["costo"]."</p>"."</td>";
										echo "</tr>";
										$aux++;
										}
										
									}
										  
		

							$conexion->close();
						?>

		        </tbody>
		      </table>
		      <br><br>
		      <div class="row center-align">
		      	<div class="col s8">
		      		Proyectos prioritarios ejecutables con el presupuesto de inversión: 
		      	</div>
		      	<div class="col s4">
		      		<p id="demo"></p>
		      	</div>
		      </div>
		</div>
	</div>
</div>
<div class="left-page horizontal click-to-toggle">
    <a class="btn-floating btn-large blue" href="matriz.html">
      <i class="material-icons">arrow_left</i>
    </a>
</div>
</body>
<script type="text/javascript">
	function calcular(){
		document.getElementById("demo").innerHTML = "";
		var cant = document.getElementById("inversion").value;
		var proy = new Array();
		var name = new Array();
		var key = "-name";
		for(i=1; i<= <?php echo $result ?> ; i++){
			proy[i] = parseInt(document.getElementById(i.toString()).innerHTML);
			name[i] = document.getElementById(i.toString()+key).innerHTML;
		}
		var sum =0;
		for(j=1; j<= <?php echo $result ?>; j++){
			if(cant > proy[j]){
				if((sum+proy[j]) < cant ){
					document.getElementById("demo").innerHTML += name[j] + "<br>"; 
					sum += proy[j];
				}
			}

			if(sum > cant){
				j=<?php echo $result ?> + 2;
			}
		}

	}
</script>
</html>