
/*----------  VALIDAR USUARIO  ----------*/

function validarRegistro(){

	var usuario = document.querySelector("#usuarioRegistro").value;
	var password = document.querySelector("#passwordRegistro").value;
	var email = document.querySelector("#emailRegistro").value;
	var terminos = document.querySelector("#terminos").checked;

	
	if (usuario!=""){

		var caracteres = usuario.length;
		var expregular = /^[a-zA-Z0-9]*$/;

		if(caracteres>10){

			alert("POR FAVOR ESCRIBA MENOS DE 10 CARACTERES");

			return false;
		}

		if(!expregular.test(usuario)){

			alert("NO ESCRIBA CARACTERES ESPECIALES");

			return false;

		}
	}


	if (password!=""){

		var caracteres = password.length;
		var expregular = /^[a-zA-Z0-9]*$/;

		if(caracteres>10){

			alert("POR FAVOR ESCRIBA MENOS DE 10 CARACTERES");

			return false;
		}

		if(!expregular.test(password)){

			alert("NO ESCRIBA CARACTERES ESPECIALES");

			return false;

		}
	}




	if (email!=""){

		
		var expregular = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


		if(!expregular.test(email)){

			alert("EMAIL INCORRECTO");

			return false;

		}
	}

	

	if (!terminos){

		alert("Acepte los terminos y condiciones");

		/*que no borre los values y solo acepte los terminos*/
		var usuario = document.querySelector("#usuarioRegistro").value = usuario;
		var password = document.querySelector("#passwordRegistro").value = password;
		var email = document.querySelector("#emailRegistro").value = email;


		return false;

	}
	



	return true;

	

}




/*PENDIENTE VALIDAR EL LOGIN  10-08-17  Jchek   */