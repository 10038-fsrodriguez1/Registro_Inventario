
<?php
session_start();
	//definicion de variables
$usuNombre = $_POST['usu_nombre'];
$usuCI = $_POST['usu_cedula'];   //captura de datos por post
$usuUser = $_POST['usu_user'];
$usuClave = $_POST['usu_pass'];

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


/*if (empty($_POST['usu_cedula'])) {
  echo "<h1>- VUELVA A INGRESAR LA CEDULA -</h1>";
}*/
$a = 1;
if (empty($_POST['usu_nombre'])) {
  echo "<h1>- VUELVA A INGRESAR EL NOMBRE -</h1>";
  $a =0;
}elseif(empty($_POST['usu_cedula'])){
  echo "<h1 class='error'>Agrega tu cedula</h1>";
  $a =0;
}elseif(strlen($_POST['usu_cedula'])>10 || strlen($_POST['usu_cedula'])<10){
  echo "<h1 class='error'>Error, Ingrese 10 digitos</h1>";
  $a =0;
}elseif(cedula($_POST['usu_cedula']) != true){
  echo "<h1>CEDULA INCORRECTA</h1>";
  $a =0;
}elseif(empty($_POST['usu_user'])) {
  echo "<h1>- VUELVA A INGRESAR EL USUARIO -</h1>";
  $a =0;
}elseif (empty($_POST['usu_pass'])) {
  echo "<h1>- VUELVA A INGRESAR LA CONTRASEÑA -</h1>";
  $a =0;
}elseif($a==1){
  $query = "INSERT INTO  `usuarios`(`usu_nombre`,`usu_cedula`,`usu_user`,`usu_password`) VALUES ('$usuNombre','$usuCI','$usuUser','$usuClave')";
  $resultado = mysqli_query($conn,$query);

    //Verifica que la consulta se realizo con o sin coincidencias en la base
    if($resultado){
    echo "<h1>Los datos han sido grabados</h1>";
  }else{
    echo "<h1> f </h1>";
  }
}





    function cedula($cedula) {
        $sum = 0;
        $sumi = 0;
        for ($i = 0; $i < strlen($cedula) - 2; $i++) {
            if ($i % 2 == 0) {
                $sum += substr($cedula, $i + 1, 1);
            }
        }
        $j = 0;
        while ($j < strlen($cedula) - 1) {
            $b = substr($cedula, $j, 1);
            $b = $b * 2;
            if ($b > 9) {
                $b = $b - 9;
            }
            $sumi += $b;
            $j = $j + 2;
        }
        $t = $sum + $sumi;
        $res = 10 - $t % 10;
        $aux = substr($cedula, 9, 9);
        if ($res == $aux) {
            return true;
        } else {
            return  false;
        }
    }
//}

   // Consulta a la base de datos.

//}
