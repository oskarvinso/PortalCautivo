<html>
<head>
	<title>Portal Cautivo | Agragar Usuario Nuevo</title>
	<link rel="stylesheet" href="sty.css"> 
</head>

<body>
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
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
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
