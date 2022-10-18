<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<div class="container">
	<h2>Formulario de computadoras</h2>
	<form method="post" action="../php/graba-entrada.php">

		  <?php
		  $nombreServidor = "localhost";
		  $nombreUsuario = "root";
		  $passwordBaseDeDatos = "";
		  $nombreBaseDeDatos = "prueba3";
		  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
		 		  ?>
	<label>Cédula: </label><input type="text" name="cedula" id="idcedula">

	  <p>
	    <label for="fechaE">Fecha Entrada:</label>
        <input name="fechaE" type="date"  id="date" disabled value="<?php echo date('Y-m-d');?>">
	  </p>
	  <p>
	    <label for="horaE">Hora Entrada:</label>
        <input type="time" name="horaE" id="time" disabled value="<?php echo date('H:i:s');?>">
	  </p>

	  <p>
	    <input type="submit" name="submit" id="submit" value="Enviar">
	  <input type="reset" name="reset" id="reset" value="Restablecer">
	</p>
	</form>

</div>
</body>
</html>
