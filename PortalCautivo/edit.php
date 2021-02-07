<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
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
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email',gender='$gender',pass='$pass' WHERE id='$id'");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: admin.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
	$gender = $res['gender'];
	$pass = $res['pass'];
}
?>
<html>
<head>	
	<title>Portal Cautivo | Editar Usuario</title>
	<link rel="stylesheet" href="sty.css">
</head>

<body>
	<div class="wrapper fadeInDown">
		<form name="form1" method="post" action="edit.php">
			<table>
				<tr> 
					<td>Name</td>
					<td><input type="text" name="name" value="<?php echo $name;?>"></td>
				</tr>
				<tr> 
					<td>Age</td>
					<td><input type="text" name="age" value="<?php echo $age;?>"></td>
				</tr>
				<tr> 
					<td>Email</td>
					<td><input type="text" name="email" value="<?php echo $email;?>"></td>
				</tr>
				<tr> 
					<td>Genero</td>
					<td><input type="text" name="gender" value="<?php echo $gender;?>"></td>
				</tr>
				<tr> 
					<td>Contraseña</td>
					<td><input type="text" name="pass" value="<?php echo $pass;?>"></td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
					<td class= "Btn-form"><input type="submit" name="update" value="Actualizar"></td>
				</tr>
			</table>
		</form>
	</div>
	<div class="footer">Desarrollado por Oscar Castro, Y Giovanni Velez.  <br>  Politecnico Gran Colombiano    -    Gerencia de proyectos <br> 2020 </div>
</body>
</html>
