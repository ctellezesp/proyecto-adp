<!DOCTYPE html>
<html>
<head>
	<title>Nvo Criterio</title>
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
  	}

  	#cuan, #cual{
  		display: none;
  	}

  	.material-tooltip{
  		max-width: 40% !important;
  	}
  </style>
</head>
<body>
<div class="row">
	<div class="col s12 m8 offset-m2">
	<form action="insertar_criterio.php" method="post">
		<div class="card">
			<br>
			<div class="row">
				<div class="col s10 offset-s1">
					<div class="row">
						<div class="input-field col s12">
				          <i class="material-icons prefix">edit</i>
				          <input id="icon_prefix" type="text" class="validate" name="nombre">
				          <label for="icon_prefix">Nuevo Criterio</label>
				        </div>
				    </div>    
				</div>
				<div class="col s10 offset-s1">
					    <p onclick="cuan()">
					      <input name="tipo" type="radio" id="test1" value="Cuantitativo"  />
					      <label for="test1">Cuantitativo</label>
					    </p>
					    <p onclick="cual()">
					      <input name="tipo" type="radio" id="test2" value="Cualitativo" />
					      <label for="test2">Cualitativo</label>
					    </p>
				</div>
				<br>
				<div class="col s10 offset-s1">
					<div class="row">
						<div class="col s4">
							<p>Mejor calificacion es otorgada al valor:</p>
							<a class="btn-floating btn-short waves-effect waves-light black right tooltipped" data-position="bottom" data-delay="50" data-tooltip="Suponga que se ha creado un nuevo criterio cuantitativo X y
en lo listo desplegable se ha elegido 'Mayor' poro otorgarle
lo mejor calificación. Si con dicho criterio se evalúan 3
proyectos (A, B y C), cuyos valores de X son: 100, 20 y 300
respectivamente, será mejor evaluado el proyecto C, porque
corresponde al mayor valor de lo listo.
Si el criterio fuero cualitativo, entonces lo opción de 'Mayor'
correspondería o lo categoría 'Muy alto'""><i class="material-icons">live_help</i></a>
						</div>
						<div class="col s8">
							 <div class="input-field col s12" id="cuan">
							    <select name="valor">
							      <option value="" disabled selected>Elige una opción</option>
							      <option value="mayor">Mayor</option>
							      <option value="menor">Menor</option>
							    </select>
							    <label>Calificación</label>
							  </div>
							  <div class="input-field col s12" id="cual">
							    <select name="valor">
							      <option value="" disabled selected>Elige una opción</option>
							      <option value="muy-bajo">Muy bajo</option>
							      <option value="bajo">Bajo</option>
							      <option value="moderado">Moderado</option>
							      <option value="alto">Alto</option>
							      <option value="muy-alto">Muy Alto</option>
							    </select>
							    <label>Calificación</label>
							  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="waves-effect waves-light btn left red" href="index.php"><i class="material-icons left">cancel</i>Cancelar</a>
		<button type="submit"><a class="waves-effect waves-light btn right green" onclick="success()"><i class="material-icons left">done</i>Añadir Criterio</a></button>
	</div>
</div>
</body>
<script type="text/javascript">
  	$(document).ready(function(){
	    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
	    $('select').material_select();
	    $('.tooltipped').tooltip({delay: 50});
  	});

  	function cuan(){
  		document.getElementById("cual").style.display = "none";
  		document.getElementById("cuan").style.display = "block";
  	}

  	function cual(){
  		document.getElementById("cual").style.display = "block";
  		document.getElementById("cuan").style.display = "none";
  	}

  </script>
</html>