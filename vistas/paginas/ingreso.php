
<?php 

ob_start();
session_start(); 

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Ingreso</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="cover" style="background-image: url(./assets/img/unnamed.jpg);">

   <br/>
	<div class=" w3-white w3-hide-small">
		<a href="#" class="w3-bar-item w3-button w3-right"><i class="fa fa-facebook-official"></i></a>
		<a href="#" class="w3-bar-item w3-button w3-right"><i class="fa fa-instagram"></i></a>
		<a href="#" class="w3-bar-item w3-button w3-right"><i class="fa fa-snapchat"></i></a>
		<a href="#" class="w3-bar-item w3-button w3-right"><i class="fa fa-flickr"></i></a>
		<a href="#" class="w3-bar-item w3-button w3-right"><i class="fa fa-twitter"></i></a>
		<a href="#" class="w3-bar-item w3-button w3-right"><i class="fa fa-linkedin"></i></a>
		
	  </div>


	<img src="assets/img/unnamed.png" width="15%"  heidth="15%">
	
	<img src="assets/img/430px-Log.png" width="7%"  heidth="10%">



	<form  method="POST" autocomplete="off" class="full-box logInForm" id="frmAcceso">
		<p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
		<p class="text-center text-muted text-uppercase">Ingresa tus Datos</p>
		
		<div class="form-group label-floating">
			<label class="control-label" for="UserEmail">Nombre</label>
			<input type="text" class="form-control" id="nombre" name="ingresoNombre" style="color:white;">
			<p class="help-block">Escribe tu Nombre</p>
		  </div>
		
	
		<div class="form-group label-floating">
		  <label class="control-label" for="UserPass">Contraseña</label>
		  <input type="text" class="form-control" id="clave" name="ingresoClave" style="color:white;">
		  <p class="help-block">Escribe tú contraseña</p>
		</div>

		<div class="form-group text-center">
		<?php
	/*	
			$registro = ControladorFormularios::ctrRegistro();
			
			if($registro == "ok")
			{
				echo '<script>

				if ( window.history.replaceState ) {

					window.history.replaceState( null, null, window.location.href );

				}

			</script>';

			echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
			}
	*/
			$ingreso = new ControladorFormularios();
			$ingreso->ctrIngreso();
	
	

		?>
			<button type="submit"  class="btn btn-raised btn-danger">Ingreso</button>
			
		</div>
	</form>
	<!--====== Scripts -->
	
	<script src="./js/jquery-3.1.1.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/material.min.js"></script>
	<script src="./js/ripples.min.js"></script>
	<script src="./js/sweetalert2.min.js"></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="./js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>