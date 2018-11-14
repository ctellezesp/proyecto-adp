<!DOCTYPE html>
<html>
<head>
	<title>Registro de Proyectos</title>
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
				<form class="col s12" action="insertar_proyecto.php" method="post">
			      <div class="row">
			        <div class="input-field col s12">
			          <i class="material-icons prefix">assignment</i>
			          <input id="name" type="text" class="validate" name="nombre">
			          <label for="name">Identificador</label>
			        </div>
			        <div class="input-field col s12">
			          <i class="material-icons prefix">edit</i>
			          <textarea id="description" class="materialize-textarea" name="descripcion"></textarea>
			          <label for="description">Descripción</label>
			        </div>
			        <div class="input-field col s12">
			          <i class="material-icons prefix">attach_money</i>
			          <input id="cost" type="number" class="validate" name="costo">
			          <label for="cost">Costo</label>
			        </div>
			        <button type="submit" class="waves-effect waves-light btn right"><i class="material-icons left">done</i>Añadir Proyecto</button>
			      </div>
				</form>
			</div>
		</div>
	</div>
	<div class="col s12 l8 offset-l2">
		<div class="card">
			<h4 class="center-align">Proyectos Registrados</h4>
			<div class="row">
				<div class="col s12 l10 offset-l1">
					<table class="centered striped highlight">
				        <thead>
				          <tr>
				              <th>Nombre</th>
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
								$sql = $conexion->query("select * from proyecto");
								$result = $sql->num_rows;
								if ($result > 0) {
								// output data of each row
							  $cont = 0; 
							  $ID_TABLA = 0; 
							  $fil = 1; 
							  echo "<div class='datagrid'>\n";
								while($row = $sql->fetch_assoc()) {
									echo "<tr><td>".$row["nombre"]."</td><td>".$row["costo"]."</td></tr> \n"; 
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
				        </tbody>
				     </table>
			    </div>
			</div>
		</div>
	</div>
</div>
<div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large blue" href="asignacion_valores.php">
      <i class="material-icons">arrow_right</i>
    </a>
</div>

<div class="left-page horizontal click-to-toggle">
    <a class="btn-floating btn-large blue" href="index.php">
      <i class="material-icons">arrow_left</i>
    </a>
</div>
</body>
</html>