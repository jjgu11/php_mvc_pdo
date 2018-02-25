
<?php 

session_start();

//var_dump($_SESSION["validar"]);

if(!$_SESSION["validar"]){

	header("location:index.php?p=ingresar");

	exit();
}


 ?>

<h1>USUARIOS</h1>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>Usuario</th>
				<th>Contraseña</th>
				<th>Email</th>
				<th>Opcion</th>
				<th>Opcion</th>

			</tr>

		</thead>

		<tbody>
			
			<?php 
			$vistaUsuario = new MvcController();
			$vistaUsuario->listaUsuariocontroller();


			#ejecuta el mensaje ok de la eliminacion
			$vistaUsuario->eliminarUsuarioController();

			?>	

		</tbody>

	</table>

<?php 



#muestra  si se actualizo correctamente
if(isset($_GET["p"])){

	if($_GET["p"]=="cambio"){

		echo "Cambio Exitoso";

	}

}

 ?>

