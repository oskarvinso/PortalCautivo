<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Portal Cautivo | Administracion</title>
	<link rel="stylesheet" href="sty.css">
	</head>

	<body>
	<a href="add.html">Agregar Nuevos Usuarios</a><br/><br/>

		<table>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Edad</th>
					<th>Correo Electronico</th>
					<th>Genero</th>
					<th>Acciones</th>
				</tr>
			</thead>
		<?php 
		//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
		while($res = mysqli_fetch_array($result)) { 		
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['age']."</td>";
			echo "<td>".$res['email']."</td>";	
			echo "<td>".$res['gender']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Confirma que desea eliminar?')\">Delete</a></td>";		
		}
		?>
		</table>
		<div class="footer">Desarrollado por Oscar Castro, Y Giovanni Velez.  <br>  Politecnico Gran Colombiano    -    Gerencia de proyectos <br> 2020 </div>
	</body>
</html>
