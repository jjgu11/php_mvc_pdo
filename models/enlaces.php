<?php 

class EnlacesPaginas{


	/* recibe el parametro del controlador y retorna el nombre del archivo vista a incluir */
	public static function enlacesPaginasModel($enlacesModel){

		if( $enlacesModel == "ingresar" || 
			$enlacesModel == "usuarios" || 
			$enlacesModel == "editar" || 
			$enlacesModel == "salir"){

			$module = "views/modules/".$enlacesModel.".php";

		}else if( $enlacesModel == "index"){

			$module = "views/modules/registro.php";

		}else if( $enlacesModel == "ok"){

			$module = "views/modules/registro.php";

		}else if( $enlacesModel == "fallo"){

			$module = "views/modules/ingresar.php";

		}else if( $enlacesModel == "cambio"){

			$module = "views/modules/usuarios.php";
				
		}else if( $enlacesModel == "fallo3intentos"){

			$module = "views/modules/ingresar.php";	
		}else{

			$module = "views/modules/registro.php";
		}

		return $module;
	}



}





