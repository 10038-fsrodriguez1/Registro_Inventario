<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>
	<h1>
	  <div align="center">Stock</div></h1>
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


$sqli = "SELECT * FROM stock";
  $resultado = mysqli_query($conn,$sqli);
?>
<table align="center" class="table">
	<thead class="thead-dark">
<tr>
<th>Código</th>
<th>Modelo</th>
<th>Precio</th>
<th>Categoria</th>
<th>Memoria RAM</th>
<th>Almacenamiento ROM</th>
</tr>
		</thead>
<?php
	while ($row = mysqli_fetch_array($resultado)){
		?>
	<tbody  align="center">
	<tr>
	<td><?php echo $row['st_idC']?></td>
	<td><?php echo $row['st_modelo']?></td>
	<td><?php echo $row['st_precio']?></td>
	<td><?php echo $row['st_categoria']?></td>
  <td><?php echo $row['st_memoria']?></td>
  <td><?php echo $row['st_almac']?></td>
	</tr>
		</tbody>
	<?php
	}
	//echo("<a href='asistencia.php'>Regresar</a>");
	?>
	</table>
		<script src="../js/bootstrap.min.js"></script>
</body>
</html>
