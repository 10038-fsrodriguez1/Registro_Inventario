<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	<?php
	if(isset($_POST['submit'])){
	date_default_timezone_set('America/Guayaquil');
	//$cod =$_POST['codigo'];
	$fEntrada = date('Y-m-d');
	$hEntrada =date('H:i:s');
	$cedula=$_POST['cedula'];
	// Datos para conectar a la base de datos.
  $nombreServidor = "localhost";
  $nombreUsuario = "root";
  $passwordBaseDeDatos = "";
  $nombreBaseDeDatos = "prueba3";
//Conexion con la base
 $conn = mysqli_connect($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);

// Validar la conexión de base de datos.
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }

//validar la cedula

	$busqueda =mysqli_query($conn,"SELECT `usu_cedula` FROM `usuarios` WHERE `usu_cedula` = '$cedula'");

	if(mysqli_num_rows($busqueda)>0){

		echo"Esta cedula existe";

		//compara la cedula con el codigo
		$compara=mysqli_query($conn,"SELECT `usu_codigo` FROM `usuarios` WHERE `usu_cedula` = '$cedula'");
		$res=mysqli_fetch_array($compara);
		$cod=$res['usu_codigo'];
		echo "codigo: ",$cod;

		// validar duplicado

	$check=mysqli_query($conn,"SELECT * FROM `asistencia` WHERE usu_codigo='$cod' AND asis_fechaE='$fEntrada' ");
	 $checkrows=mysqli_num_rows($check);
	//echo($checkrows);

	if($checkrows>0){
		//comprobamos si el codigo ya está registrado
		//echo("El codigo y fecha ya está registrado");
		 //echo "<a href=\"javascript:history.back()\">Regresar</a>";}

		 echo'<script type="text/javascript"> alert("El codigo y fecha ya está registrado"); window.location.href="asistencia.php"; </script>';
	}

		//si no esta registrada la fecha continua el script
	else{
			$query = "INSERT IGNORE INTO `asistencia`(`usu_codigo`,`asis_fechaE`,`asis_horaE`) VALUES ('$cod','$fEntrada','$hEntrada')";
  			$resultado = mysqli_query($conn,$query);

			//echo("se registró");
			//header("Location: A_actualizar.php");
		 echo'<script type="text/javascript"> alert("Registro Guardado exitosamente"); window.location.href="A_actualizar.php"; </script>';
		}

	}else{

	echo'<script type="text/javascript"> alert("La cedula ingresada no existe, digite otra"); window.location.href="asistencia.php"; </script>';}



		//cerrarla conexion
		mysqli_close($conn);
	};
?>
</body>
</html>
