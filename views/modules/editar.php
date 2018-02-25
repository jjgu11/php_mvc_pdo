<?php 

session_start();

//var_dump($_SESSION["validar"]);

if(!$_SESSION["validar"]){

	header("location:index.php?p=ingresar");

	exit();
}


 ?>



<h1>EDITAR USUARIO</h1>

<form method="post">
	
	<?php 

	$editar = new MvcController();

	$editar->editarUsuarioController();

	#muestra error de actualizar
	$editar->actualizarUsuarioController();

	 ?>

</form>


