<?php

class MvcController {

	#LLAMADA A LA PLANTILLA (template.php)
	#-----------------------------------------------------
	public function renderPlantilla() {
		include "views/template.php";
	}



	#INTERACCION CON EL USUARIO
	#-----------------------------------------------------
	public function enlacesPaginasController() {


		/*si tiene informacion que lo guarde*/
		if(isset($_GET["p"])){

			$enlacesController = $_GET["p"];

		}else{

			$enlacesController = "index";
		}

	

		/*heredo la clase, la funcion del Modelo y paso el parametro* de la vista a renderizar*/
		$rpt = EnlacesPaginas::enlacesPaginasModel($enlacesController);

		include $rpt;
	}



	#REGISTRO DE  USUARIO
	#-----------------------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST['usuario'])){


			#valida expresiones regulares en el server
			if(preg_match('/^[a-zA-Z0-9]*$/',$_POST['usuario']) && 
				preg_match('/^[a-zA-Z0-9]*$/',$_POST['password']) && 
				preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',$_POST['email'])){	

				$encriptar = crypt($_POST['password'],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');



				$datosController = array(	
						"usuario"=>$_POST['usuario'],
						"password"=>$encriptar,
						"email"=>$_POST['email']
				);

				#pasa parametros y trae la respuesta del del modelo
				$rpt = Datos::registroUsuarioModel($datosController,"usuarios");

				if($rpt=="ok"){


					#utilizo para borrar los values de la cache del navegador  o sino si actualizo se siguen insertando datos
					header("location:index.php?p=ok");

				}else{

					header("location(index.php");	
				}

			}

		}

	}


	#INGRESO DE USUARIO
	#-----------------------------------------------------
	
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){


			#valida expresiones regulares en el server
			if(preg_match('/^[a-zA-Z0-9]*$/',$_POST['usuarioIngreso']) && 
				preg_match('/^[a-zA-Z0-9]*$/',$_POST['passwordIngreso'])) {


				$encriptar = crypt($_POST['passwordIngreso'],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = array(	
						"usuario"=>$_POST['usuarioIngreso'],
						"password"=>$encriptar

				);


				$rpt= Datos::ingresoUsuarioModel($datosController,"usuarios");

				$intentos = $rpt['intento'];
				$usuario = $_POST["usuarioIngreso"];
				$maximo = 2;

				if($intentos < $maximo){

					if($rpt['usuario']==$_POST['usuarioIngreso']  && $rpt['password']==$encriptar){

						session_start();


						# actualizamos los intentos a 0
						$_SESSION["validar"] = true;

						$intentos=0;
						$datosController = array("usuarioActual"=>$usuario,
												"actualizarIntento"=>$intentos);
						$rptActualizarIntentos = Datos::intentosUsuarioModel($datosController,"usuarios");
						#-------------------------------------------

						header("location:index.php?p=usuarios");

					}else{

						#si usuario se equivoca que intento sume 1 y se actualize en la BD
						++$intentos;

						$datosController = array("usuarioActual"=>$usuario,
												"actualizarIntento"=>$intentos);

						$rptActualizarIntentos = Datos::intentosUsuarioModel($datosController,"usuarios");
						header("location:index.php?p=fallo");
					}

				}else{
						#si usuario supra los 2 ntentos mostrar msj de llenar el captcha
						$intentos=0;
						$datosController = array("usuarioActual"=>$usuario,
												"actualizarIntento"=>$intentos);

						$rptActualizarIntentos = Datos::intentosUsuarioModel($datosController,"usuarios");

						header("location:index.php?p=fallo3intentos");

				}

			}
			

		}


	}


	#LISTA DE USUARIO
	#-----------------------------------------------------
	
	public function listaUsuariocontroller(){

		$rpt = Datos::listaUsuarioModel("usuarios");

		foreach ($rpt as $row => $item) {

			//echo $item["usuario"]. "" . $item["password"]."". $item["email"]."<br>"; 

			echo '<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?p=editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?p=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';
		}

		//var_dump($rpt[0][0]);

	}


	#EDITAR USUARIO
	#-----------------------------------------------------
	public function editarUsuarioController(){

		$datosController = $_GET["id"];

		$rpt = Datos::editarUsuarioModel($datosController,"usuarios");

		echo  '<input type="text" value="'.$rpt["usuario"].'"placeholder="Usuario" name="usuarioEditar" required>

				<input type="text" value="'.$rpt["password"].'"placeholder="Contraseña" name="passwordEditar" required>

				<input type="email" value="'.$rpt["email"].'"placeholder="Email" name="emailEditar" required>

				<input type="submit" value="Actualizar">
				<input type="hidden" value="'.$rpt["id"].'" name="id">';

	}


	#ACTUALIZAR USUARIO 
	#-----------------------------------------------------
	public function actualizarUsuarioController(){

		if(isset($_POST["usuarioEditar"])){

			
			#valida expresiones regulares en el server
			if(preg_match('/^[a-zA-Z0-9]*$/',$_POST['usuarioEditar']) && 
				preg_match('/^[a-zA-Z0-9]*$/',$_POST['passwordEditar']) && 
				preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',$_POST['emailEditar']) ){

				$encriptar = crypt($_POST['passwordEditar'],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = array(
					"usuario"=>$_POST["usuarioEditar"],
					"password"=>$encriptar,
					"email"=>$_POST["emailEditar"],
					"id"=>$_POST["id"]);


				$rpt = Datos::actualizarUsuarioModel($datosController,"usuarios");

				if($rpt=="ok"){

					header("location:index.php?p=cambio");
				}else{

					echo "error";
				}


			}

		}
	}




	#ELIMINAR USUARIO 
	#-----------------------------------------------------
	public function eliminarUsuarioController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];

			$rpt= Datos::eliminarUsuarioModel($datosController,"usuarios");

			if($rpt=="ok"){

				header("location:index.php?p=usuarios");
				

			}else{

				echo "error";
			}
		}

	}


}


/*PENDIENTE EL HTACCES  15/08/17  JCHECK*/

?>