<?php 

class Conexion{

	public static function conectar(){

		$con = new PDO("mysql:host=localhost;dbname=php_mvc","root","elementary");

		return $con;
	}

}	



