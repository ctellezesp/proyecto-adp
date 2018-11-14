<!DOCTYPE html>
<html>
<head>
	<?php
		$conexion = new mysqli("localhost", "Administrador", "proyectos", "seleccion_proyectos");
		if ($conexion->connect_errno) 
		{
			echo "<br>Error: Fallo al conectarse a MySQL debido a:" ;
		 	echo "<br>Errno: " . $conexion->connect_errno;
		   	echo "<br>Error: " . $conexion->connect_error;
		    exit;
		}
		$sql = $conexion->query("select * from criterio");
		$result = $sql->num_rows;
		?>
	<title>Index</title>
	 <!-- Compiled and minified CSS -->
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

  	#total{
  		color: white;
  		margin-right: 10%;
  	}
  </style>
  <script type="text/javascript">
  	function calcular(){
  		var res = 0;
  		var dat = "";
  		for(i=1; i<= <?php echo $result ?>; i++){
  			res += parseInt(document.getElementById(i.toString()).value);
  			dat += document.getElementById(i.toString()).value;
  			dat += "#";
  		}
  		for(i=1; i<= <?php echo $result ?>; i++)
  			if((document.getElementById(i.toString()).value) == "")
  				swal('Debes completar todos los campos');
  			else {
  				if(res == 100){
		  			document.getElementById("total").innerHTML = res + "%";
		  			var crit = <?php echo $result ?>;
		  			var parametros = {
		                "data" : dat,
		                "criterios": crit  
		        };
		  			$.ajax({
		                data:  parametros, //datos que se envian a traves de ajax
		                url:   'registrar_ponderacion.php', //archivo que recibe la peticion
		                type:  'post', //método de envio
		                success:  function (response) { 
		                	swal('Ponderacion correcta');
		                }
		          });
  				}
		  		else swal('Ponderacion incorrecta, la suma de la ponderacion debe ser 100%');
  			}

  		
  	}
  </script>
</head>
<body>
<div class="row">
	<div class="col s12 m8 offset-m2" id="main">
		<div class="card">
			<table class="striped centered">
		        <thead>
		          <tr>
		              <th colspan="2">Criterio</th>
		              <th>Tipo</th>
		              <th>Ponderación</th>
		          </tr>
		        </thead>
		        <tbody>
		          <tr>
		              <div id="div4">
						<?php 
							
							if ($result > 0) {
								// output data of each row
							  $cont = 0; 
							  $ID_TABLA = 0; 
							  $fil = 1; 
							  echo "<div class='datagrid'>\n";
							  echo "<table>";
								while($row = $sql->fetch_assoc()) {
									  //echo "id: " . $row["matricula"]. " - Name: " . $row["nombre"]."<br>";
								  //if($cont%2==0){
									  echo "<tr><td>".$row["nombre"]."</td><td>".$row["tipo"]."</td><td>"."<input id=".$row["ID"]." type='text' name='ponderacion'>"."</td></tr> \n"; 
								  //}
								  /*else{
									  echo "<tr><td>".$row["nombre"]."</td><td>".$row["tipo"]."</td><td>"."<input type='text' name='ponderacion'>"."</td></tr> \n"; 
									 }*/
									 $fil++; 
								  $cont++;  
								}

								echo "</table> \n"; 
								echo " </div>  \n";

							} else {
								echo "0 Criterios";
							}
							$conexion->close();
							?>

					</div>
		          </tr>
		        </tbody>
		      </table>
		</div>
		<a class="waves-effect waves-light btn right" onclick="calcular()" style="margin-right: 10%;"><i class="material-icons left">done</i>Calcular</a>
	</div>
	<div class="col s12 m4 offset-m2"><a href="nuevo-criterio.php" class="waves-effect waves-light btn modal-trigger" style="margin-left: 10%;"><i class="material-icons left">add</i>Añadir Criterio</a></div>
	<div class="col s12 m4"><h5 class="right-align" id="total">0%</h4></div>
	
</div>
</div>
<div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large blue" href="registro_proyectos.php">
      <i class="material-icons">arrow_right_alt</i>
    </a>
</div>
</body>
</html>