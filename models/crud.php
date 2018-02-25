<?php 

require_once "conexion.php";


	#Extendemos de una clase padre para manipular sus informacion
	class Datos extends Conexion{

		#REGISTRO DE USUARIOS
		#--------------------------------------------------
		 public static function registroUsuarioModel($datosModel,$tabla){

		 	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, email) VALUES (:usuario,:password,:email)");	

		 	$stmt->bindParam(":usuario",$datosModel["usuario"],PDO::PARAM_STR);
		 	$stmt->bindParam(":password",$datosModel["password"],PDO::PARAM_STR);
		 	$stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);

		 	

		 	if($stmt->execute()){

		 		return "ok";

		 	}else{

		 		return "error";
		 	}

		 	$stmt->close();


		 	//return  $datosModel["usuario"].$datosModel["password"].$datosModel["email"];

		 }



		#INGRESO DE USUARIOS
		#--------------------------------------------------	
		 public static function ingresoUsuarioModel($datosModel,$tabla){

		 	$stmt = Conexion::conectar()->prepare("SELECT usuario,password,intento from $tabla where usuario = :usuario");

		 	$stmt->bindParam(":usuario", $datosModel["usuario"],PDO::PARAM_STR);
		 	$stmt->execute();

		 

		 	return $stmt->fetch();

		 	$stmt->close();


		 }


		#LISTA DE USUARIOS
		#--------------------------------------------------	
		 public static function listaUsuarioModel($tabla){

		 	$stmt = Conexion::conectar()->prepare("SELECT id,usuario,password,email from $tabla");
		 	$stmt->execute();

		 	return $stmt->fetchall();

		 	$stmt->close();


		 }



		#EDITAR USUARIOS
		#--------------------------------------------------	
		 public static function editarUsuarioModel($datosModel,$tabla){

		 	$stmt = Conexion::conectar()->prepare("SELECT id,usuario,password,email from $tabla WHERE id=:id");

		 	$stmt->bindParam(":id", $datosModel,PDO::PARAM_INT);

		 	$stmt->execute();

		 	return $stmt->fetch();

		 	$stmt->close();


		 }

		 #ACTUALIZAR USUARIOS
		#--------------------------------------------------
		public static function actualizarUsuarioModel($datosModel,$tabla){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set usuario=:usuario, password=:password, email=:email where id=:id");

			$stmt->bindParam(":usuario",$datosModel["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":password",$datosModel["password"], PDO::PARAM_STR);
			$stmt->bindParam(":email",$datosModel["email"], PDO::PARAM_STR);
			$stmt->bindParam(":id",$datosModel["id"], PDO::PARAM_STR);

			//$stmt->execute();

			if($stmt->execute()){

		 		return "ok";

		 	}else{

		 		return "error";
		 	}

		 	$stmt->close();


		}




		#ELIMINAR USUARIO
		#--------------------------------------------------
		public static function eliminarUsuarioModel($datosModel,$tabla){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla where id=:id");

			$stmt->bindParam(":id",$datosModel, PDO::PARAM_INT);

			//$stmt->execute();

			if($stmt->execute()){

		 		return "ok";

		 	}else{

		 		return "error";
		 	}

		 	$stmt->close();


		}

		public static function intentosUsuarioModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set intento=:intentos  where usuario=:user");

			$stmt->bindParam(":intentos", $datosModel["actualizarIntento"], PDO::PARAM_INT);
			$stmt->bindParam(":user", $datosModel["usuarioActual"], PDO::PARAM_STR);


			if($stmt->execute()){

		 		return "ok";

		 	}else{

		 		return "error";
		 	}

		 	$stmt->close();


		}			
 			
 





		 
}

