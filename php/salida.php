<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Salida</title>
</head>

<body>
<div class="container">
	<h2>Formulario de rergistro salida</h2>
	<form method="post" action="../php/graba-salida.php">

		  <?php
		  date_default_timezone_set('America/Guayaquil');
		  $nombreServidor = "localhost";
		  $nombreUsuario = "root";
		  $passwordBaseDeDatos = "";
		  $nombreBaseDeDatos = "prueba3";
		  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
		 		  ?>
	<label>Cédula: </label><input type="text" name="cedula" id="idcedula">

	  <p>
	    <label for="fechaE">Fecha Salida:</label>
        <input name="fechaS" type="date"  id="date" disabled value="<?php echo date('Y-m-d');?>">
	  </p>
	  <p>
	    <label for="horaE">Hora Salida:</label>
        <input type="time" name="horaS" id="time" disabled value="<?php echo date('H:i:s');?>">
	  </p>

	  <p>
	    <input type="submit" name="submit" id="submit" value="Enviar">
	  <input type="reset" name="reset" id="reset" value="Restablecer">
	</p>
	</form>

</div>
</body>
</html>
