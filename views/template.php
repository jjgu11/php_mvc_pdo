<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Template | Sys FIM</title>
	<link rel="stylesheet" href="./public/css/style.css">
</head>
<body>

<header>
	<h1>SYS MVC - TEST</h1>
</header>


<!-- menu navegacion -->
<?php
include "modules/navegacion.php";
?>




<!-- Recibe a la redireccion GET por el controlador -->
<section>
<?php
$mvc = new MvcController();
$mvc->enlacesPaginasController();
?>
</section>



<script src="./public/js/validarRegistro.js">	

</script>

</body>
</html>