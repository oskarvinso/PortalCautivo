<html>
<head>
	<title>Portal Cautivo | Agragar Usuario Nuevo</title>
	<link rel="stylesheet" href="sty.css"> 
</head>

<body>
<img class="header" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Colsubsidio_logo.svg/1280px-Colsubsidio_logo.svg.png" id="icon" alt="Logo del Almacen" />
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['pass']);
		
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {
				
		if(empty($name)) {
			echo "
			<div class = 'Aviso'>
				<div class ='AvisoTxt'>
					<font color='red'>Porfavor diligencie el campo Nombre</font><br/>
				</div>
			</div>";
		}
		
		if(empty($age)) {
			echo "
			<div class = 'Aviso'>
				<div class ='AvisoTxt'>
					<font color='red'>Porfavor diligencie el campo edad</font><br/>
				</div>
			</div>";
		}
		
		if(empty($email)) {
			echo "
			<div class = 'Aviso'>
				<div class ='AvisoTxt'>
					<font color='red'>Porfavor introduzca su correo electronico en un formato valido</font><br/>
				</div>
			</div>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Volver a intentarlo</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email,gender,pass) VALUES('$name','$age','$email','$gender','$pass')");
		
		//display success message
		echo "
		<a href='index.html'>
			<div class = 'Aviso'>
				<div class ='AvisoTxt'>
					<font color='green'>Usuario Registrado Satisfactoriamente; haz click para iniciar Sesión.
				</div>
			</div>
		</a>";
	}
}
?>
</body>
</html>
