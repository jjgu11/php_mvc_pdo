<h1>REGISTRO DE USUARIO</h1>

<form method="post" onsubmit="return validarRegistro()">
	
	<input type="text" placeholder="Usuario" name="usuario" id="usuarioRegistro" required>

	<input type="password" placeholder="Contraseña" name="password" id="passwordRegistro" required>

	<input type="email" placeholder="Email" name="email" id="emailRegistro" required>

	<p style="text-align:center; display: block;"><input type="checkbox" id="terminos">Acepto Terminos y condiciones</p>

	<input type="submit" value="Enviar">

</form>


<?php 

$registro = new MvcController();
$registro->registroUsuarioController();



/*para el registro el que responde es la vista*/
if(isset($_GET["p"])){

	if($_GET["p"]=="ok"){

		echo "Registro Exitoso";
	}
}



 ?>