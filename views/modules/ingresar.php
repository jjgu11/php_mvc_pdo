<h1>INGRESAR</h1>

	<form method="post">
		
		<input type="text" placeholder="Usuario" name="usuarioIngreso" required>

		<input type="password" placeholder="Contraseña" name="passwordIngreso" required>

		<input type="submit" value="Enviar">

	</form>



<?php 

$ingreso = new MvcController();
$ingreso->ingresoUsuarioController();


/*para el registro el que responde es la vista*/
if(isset($_GET["p"])){

	if($_GET["p"]=="fallo"){

		echo "Fallo al Ingresar";
	}
}



/*para el registro el que responde es la vista*/
if(isset($_GET["p"])){

	if($_GET["p"]=="fallo3intentos"){

		echo "Fallo de 3 IntentosDebe Rellenar el Captcha";
	}
}






 ?>	