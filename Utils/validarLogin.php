<?php
include('conexion.php');

/* $consulta= "SELECT * FROM usuario WHERE usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($datos_base,$consulta);

$filas=mysqli_num_rows($resultado); */


/* ENCRIPTACIÓN */
/* $pass = '123456';
echo password_hash($pass, algo: PASSWORD_DEFAULT)."\n"; */

/* $passdb =  password_hash($pass, algo: PASSWORD_DEFAULT);

if(password_verify($pass, $passdb)){
	echo "correcto";
}else{
	echo "incorrecto";
} */
/* FIN ENCRIPTACIÓN */


/* $contra = password_hash('gon1495', PASSWORD_DEFAULT);
mysqli_query($datos_base, "UPDATE usuario SET contraseña = '$contra' WHERE idUsuario = 1"); */

/* $contra = password_hash('1234', PASSWORD_DEFAULT);
mysqli_query($datos_base, "INSERT INTO usuario VALUES (DEFAULT, 'OSDE', '$contra', 2)"); */
if(isset($_POST['ingreso'])){
	$usuario =$_POST['usuario'];
	$contraseña =$_POST['contraseña'];
	
	$destinatario = 'gonzalonnegro@gmail.com';
	$asunto = 'Actualización de su documento en Industrias Médicas.';
	$header = 'Enviado desde Industrias Médicas.';
	
	$mensaje = 'Se ha actualizado el estado de su documento.';
	$nombre = 'INDUSTRIAS MÉDICAS';
	$mensajeCompleto = $mensaje . "\nAtentamente: " . $nombre;
	
	mail($destinatario, $asunto, $mensajeCompleto, $header);
	
	
	$sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";
	
	$resultado = $datos_base->query($sql);
	
	$fila = mysqli_fetch_assoc($resultado);
	
	$passwordHash = $fila['contraseña'];
	
	if(password_verify($contraseña, $passwordHash)){
		session_start();
		$_SESSION['usuario'] = $usuario; 
		header("location: ../Principal/login.php?ok");
	}else{
		header("location: ../Principal/login.php?error"); 
	}
	mysqli_free_result($resultado);
}
elseif(isset($_POST['registrar'])){

	$regNom =$_POST['regNom'];
	$regCor =$_POST['regCor'];
	$regDir =$_POST['regDir'];
	$regUsu =$_POST['regUsu'];
	$regPas =$_POST['regPas'];

	if($_REQUEST['tipo'] == "obra"){
		$tipo = 5;

		$regPassword = password_hash($regPas, PASSWORD_DEFAULT);

		/* INSERTAR DEFAULT, USUARIO, CONTRASEÑA Y ROL*/
		mysqli_query($datos_base, "INSERT INTO usuario VALUES (DEFAULT, '$regUsu', '$regPassword', '$tipo', 3, '$regNom', '$regCor', '$regDir', 1)");

	}else if($_REQUEST['tipo'] == "proveedor"){
		$tipo = 6;

		$regPassword = password_hash($regPas, PASSWORD_DEFAULT);

		/* INSERTAR DEFAULT, USUARIO, CONTRASEÑA Y ROL*/
		mysqli_query($datos_base, "INSERT INTO usuario VALUES (DEFAULT, '$regUsu', '$regPassword', '$tipo', 2, '$regNom', '$regCor', '$regDir', 1)");
	}
	header("location: ../Principal/login.php?reg");
}

/* if($filas){
	session_start();
	$_SESSION['usuario'] = $usuario; 
	header("location: ../Principal/login.php?ok");
}else{

	header("location: ../Principal/login.php?error"); 
} */

mysqli_close($datos_base);
?>