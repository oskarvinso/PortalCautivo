<?php
include_once("config.php");
$nombre = $_GET["Uname"];
$password = $_GET["Upass"];
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE name='$nombre'");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
	$gender = $res['gender'];
	$pass = $res['pass'];
}
if ($nombre == "admin") {
	echo "		<a href='admin.php'>
	<div class = 'Aviso'>
		<div class ='AvisoTxt'>
			Bienvenido al Modulo de administración, haz click para ingresar
		</div>
	</div>
</a>";
}else {
	if ($pass == $password) {
		echo "
		<a href='adsT.html'>
			<div class = 'Aviso'>
				<div class ='AvisoTxt'>
					Bienvenido al portal cautivo de almacenes colsubisidio, haz click para aceder a internet.
				</div>
			</div>
		</a>";
	}else {
		echo "
		<a href='index.html'>
			<div class = 'Aviso'>
				<div class ='AvisoTxt'>
					Clave Erronea o el usuario no existe, intalo de nuevo o registrate
				</div>
			</div>
		</a>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="sty.css">
	<title>Verificación</title>
</head>
<body>
<div class="footer">Desarrollado por Oscar Castro, Y Giovanni Velez.  <br>  Politecnico Gran Colombiano    -    Gerencia de proyectos <br> 2020 </div>	
</body>
</html>
