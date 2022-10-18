
<?php
session_start();
	//definicion de variables
$st_modelo = $_POST['st_modelo'];
$st_precio = $_POST['st_precio'];   //captura de datos por post
$st_categoria = $_POST['st_categoria'];
$st_memoria = $_POST['st_memoria'];
$st_almac = $_POST['st_almac'];
  // Datos para conectar a la base de datos.
  $nombreServidor = "localhost";
  $nombreUsuario = "root";
  $passwordBaseDeDatos = "";
  $nombreBaseDeDatos = "prueba3";

  // Crear conexión con la base de datos.
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);

  // Validar la conexión de base de datos.
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }

// VALIDACIONES

//if (empty($_POST['usu_nombre']) && empty($_POST['usu_cedula']) && empty($_POST['usu_user']) && empty($_POST['usu_pass'])){
//echo "<h1>Vuelva a intentar</h1>";
//}else{

if (empty($_POST['st_modelo'])) {
  echo "<h1>- VUELVA A INGRESAR EL MODELO -</h1>";
}
if (empty($_POST['st_precio'])) {
  echo "<h1>- VUELVA A INGRESAR EL PRECIO-</h1>";
}
if (empty($_POST['st_categoria'])) {
  echo "<h1>- VUELVA A INGRESAR LA CATEGORIA ( LAPTOP O ESCRITORIO) -</h1>";
}
if (empty($_POST['st_memoria'])) {
  echo "<h1>- VUELVA A INGRESAR LA CANTIDAD DE MEMORIA (EJ.8GB) -</h1>";
}
if (empty($_POST['st_almac'])) {
  echo "<h1>- VUELVA A INGRESAR EL ALMACENAMENTO (EJ.128GB) -</h1>";
} else {
  $query = "INSERT INTO  `stock`(`st_modelo`,`st_precio`,`st_categoria`,`st_memoria`,`st_almac` ) VALUES ('$st_modelo','$st_precio','$st_categoria','$st_memoria','$st_almac')";
  $resultado = mysqli_query($conn,$query);
    //Verifica que la consulta se realizo con o sin coincidencias en la base
    if($resultado){
    echo "<h1>Los datos han sido grabados</h1>";
    }
}
//}

   // Consulta a la base de datos.

//}
?>
