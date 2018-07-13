<html>
	<head>
		<title> Registro de usuario </title>
		<meta charset="UTF-8">
	</head>
<body>
<?php
	if (isset($_POST['registro'])){
        include ("includes/abrirbd.php");
        $sql = /*completar código*/ ;
        $resultado = mysqli_query($link, $sql);
        if (mysqli_num_rows ($resultado) != 0){
             echo "<Center> <font color= red>";
			 echo "<BR><BR><BR>Usuario ya existente <BR><BR>";
             echo "<A href= '{$_SERVER['PHP_SELF']}'> Volver a registro </A>";
             echo "</Center></font>"; 
	   } else {
			/*completar código utilizar el salt para guardar contraseña*/
			$hash = hash("sha256", $password . $salt, false);
           	$sql = "INSERT INTO usuarios (user, password, salt, nombres, apellidos, permisos) VALUES (/*completar código*/,'NNNNNNNNNN')";
            $resultado = mysqli_query ($link, $sql);
            if (!$resultado) {
				echo "</Center></font>"; 
				echo ("<BR><BR><BR>Datos erróneos".mysqli_error($link)."<BR><BR>");
				echo "<A href= '{$_SERVER['PHP_SELF']}'> Volver a registro </A>";
				echo "</Center></font>"; 
		    } else {
				echo "<BR><BR><BR><CENTER>";
				echo "Usuario Registrado <BR><BR>";
				echo "<A href= 'login.php'> Volver a login </A>";
				echo "</CENTER>";
			}
       }
	   mysqli_close($link);
	} else {
?>
		<br><br><br>
		<center>
			<img src="logo1.png" width= 280 height= 60>
			<br>
			<h2> REGISTRO DE UN NUEVO USUARIO </h2>
			<br>
			<form action= '<?php "{$_SERVER['PHP_SELF']}" ?>' method = post>
				<table bgcolor = 'lightgrey'> 
					<tr>
						<td width= 100> Usuario: </td> 
						<td> <input type = text name ='user'></td>
					</tr>
					<tr>
						<td width= 100> Password: </td> 
						<td> <input type = password name ='passwd'></td>
					</tr>
					<tr>
						<td width= 100> Nombre: </td> 
						<td> <input type = text name = 'nombre'></td>
					</tr>
					<tr>
						<td width= 100> Apellidos: </td> 
						<td> <input type = text name = 'apellidos'></td>
					</tr>
				</table><br>
				<input type=submit name = 'registro' value = "REGISTRO">
			</form>
			<br><br><A href= 'login.php'> Volver a login </A>
		</center>
<?php
	}
?>
</body>
</html>