<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	<h1>
	  <div align="center">Asistencia Entrada</div></h1>
<br>
<br>
<?php
	// Datos para conectar a la base de datos.
  $nombreServidor = "localhost";
  $nombreUsuario = "root";
  $passwordBaseDeDatos = "";
  $nombreBaseDeDatos = "prueba3";
//Conexion con la base
 $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);

// Validar la conexión de base de datos.
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }
 // Consulta a la base de datos.

$query = "SELECT * FROM asistencia";
  $resultado = mysqli_query($conn,$query);
?>
<table align="center">
<tr>
<th>Código</th>
<th>Fecha Entrada</th>
	<th>Hora Entrada</th>
</tr>
<?php
	while ($row = mysqli_fetch_array($resultado)){
		?>
	<tr>
	<td><?php echo $row['usu_codigo']?></td>
	<td><?php echo $row['asis_fechaE']?></td>
	<td><?php echo $row['asis_horaE']?></td>
	</tr>
	<?php
	}
	//echo("<a href='asistencia.php'>Regresar</a>");
	?>
	</table>
</body>
</html>
