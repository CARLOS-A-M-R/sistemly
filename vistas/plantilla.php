<?php 
ob_start();
session_start();

$sistemly = ControladorFormularios::ctrMostrarSistemly();
//echo '<prev class="bg-white">'; print_r($sistemly); echo '</prev>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $sistemly['ts_titulo'];?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="<?php echo $sistemly['ts_dominio'];?>css/main.css">
    <!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo $sistemly['ts_dominio'];?>public/datatables/jquery.dataTables.min.css">
 
    <link rel="stylesheet" type="text/css" href="<?php echo $sistemly['ts_dominio'];?>public/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $sistemly['ts_dominio'];?>public/datatables/buttons.dataTables.min.css">

    <link rel="stylesheet" href="<?php echo $sistemly['ts_dominio'];?>css/bootstrap-select.min.css">
    

    <section class="full-box cover dashboard-sideBar">
        <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
        <div class="full-box dashboard-sideBar-ct">
            <!--SideBar Title -->
            <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">Sistema Bibliotecario<i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
            </div>
            <!-- SideBar User info -->
            <div class="full-box dashboard-sideBar-UserInfo">
                <figure class="full-box">
                    <img src="<?php echo $sistemly['ts_dominio'];?>assets/img/user01.png" alt="UserIcon">

				
				
				
                    
				
				<figcaption class="text-center text-titles">Usuario</figcaption>
					<figcaption class="text-center text-titles">
					<?php 
					if(empty($_SESSION['validarIngreso'])){

						header("Location:http://192.168.1.182/sistemly");
						
						//echo "<script>document.location = 'http://192.168.1.72/';</script>";
          
            					return;
					}else{

					echo $_SESSION['validarIngreso']; 
				
					}
					
					?>
						
					</figcaption>
                </figure>

			 	

                <ul class="full-box list-unstyled text-center">
                    <li>
                        <a href="#!">
                            <i class="zmdi zmdi-settings"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="btn-exit-system" ">
							<i class="zmdi zmdi-power "></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu ">
				<li>
					<a href="">
						<i class="zmdi zmdi-case zmdi-hc-fw "></i> Administracion
					</a>
				</li>
				
				<li>
					<a href="#! " class="btn-sideBar-SubMenu ">
						<i class="zmdi zmdi-account-add zmdi-hc-fw "></i> Usuarios <i class="zmdi zmdi-caret-down pull-right "></i>
					</a>
					<ul class="list-unstyled full-box ">
						<li>
							<a href="sistemly.php?pagina=usuario"><i class="zmdi zmdi-account zmdi-hc-fw "></i> Consulta usuarios</a>
						</li>
						<li>
							<a href="sistemly.php?pagina=personal"><i class="zmdi zmdi-male-alt zmdi-hc-fw "></i> Personal Administrativo </a>
						</li>
						<li>
							<a href="sistemly.php?pagina=bibliotecarios"><i class="zmdi zmdi-face zmdi-hc-fw "></i>Biblotecarios</a>
						</li>
						
					</ul>
				</li>
				
				
			</ul>
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Personal <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href=""><i class="zmdi zmdi-account zmdi-hc-fw"></i> Mi Perfil</a>
						</li>

					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Catalogo <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href=""><i class="zmdi zmdi-book zmdi-hc-fw"></i> Libros</a>
						</li>
						<li>
							<a href=""><i class="zmdi zmdi-book zmdi-hc-fw"></i> Categoria</a>
						</li>

						<li>
							<a href=""><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Prestamos</a>
						</li>
						<li>
							<a href=""><i class="zmdi zmdi-font zmdi-hc-fw"></i> Devoluciones</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
    </section>
    <section class="full-box dashboard-contentPage ">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar ">
			<ul class="full-box list-unstyled text-right ">
				<li class="pull-left ">
					<a href="#! " class="btn-menu-dashboard "><i class="zmdi zmdi-more-vert "></i></a>
				</li>
				
				<li>
					<a href="#! " class="btn-search ">
						<i class="zmdi zmdi-search "></i>
					</a>
				</li>
				<li>
					<a href="#! " class="btn-modal-help ">
						<i class="zmdi zmdi-help-outline "></i>
					</a>
				</li>
			</ul>
			
        </nav>
        
        
</head>

<body>
	<div class="container-fluid">
		
		<?php
		if(isset($_GET["pagina"]))
		{
			if($_GET["pagina"] == "admin" ||
			   $_GET["pagina"] == "usuario" ||
			   $_GET["pagina"] == "bibliotecarios" ||
			   $_GET["pagina"] == "inicio" ||
			   $_GET["pagina"] == "perfil" ||
			   $_GET["pagina"] == "personal" ||
			   $_GET["pagina"] == "registro" ||
			   $_GET["pagina"] == "pruebas" ||
			   //$_GET["pagina"] == "ingreso" ||
			   $_GET["pagina"] == "salir" ||
			   $_GET["pagina"] == "modal-ayuda.php" ||
			   $_GET["pagina"] == "header" ||
			   $_GET["pagina"] == "footer")
			   {
				
				include "paginas/".$_GET["pagina"].".php";
			   
			}else{

				include "paginas/error.php";

			   }
		}else{
			//cambiar mas adelante
			include "paginas/inicio.php";
		}
		
		
		?>

	</div>
</body>

<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-large "> 

	<table>
	  <thead>
		  <tr>
			  <th><img src="../../assets/img/unnamed.png " width="35% "  heidth="15% "></th>
			  <th><img src="../../assets/img/430px-Log.png " width="20% "  heidth="10% "></th>
			  <th><center><p>
				  Encuentranos en Redes Sociales</p>
				  <i class="fa fa-facebook-official w3-hover-opacity "></i>
				  <i class="fa fa-instagram w3-hover-opacity "></i>
				  <i class="fa fa-snapchat w3-hover-opacity "></i>
				  <i class="fa fa-pinterest-p w3-hover-opacity "></i>
				  <i class="fa fa-twitter w3-hover-opacity "></i>
				  <i class="fa fa-linkedin w3-hover-opacity "></i>
				  <p> <a href="https://sic.cultura.gob.mx/ficha.php?table=biblioteca&table_id=6839 " target="_blank " class="w3-hover-text-green ">BIBLIOTECAS DGB</a></center></p></th>   
				 
		  </tr>
	  </thead>

	  
    </table>

	
    
</footer>
 

<script src="<?php echo $sistemly['ts_dominio'];?>js/jquery-3.5.1.min.js"></script>

	<script src="<?php echo $sistemly['ts_dominio'];?>js/sweetalert2.min.js "></script>
	<script src="<?php echo $sistemly['ts_dominio'];?>js/bootstrap.min.js "></script>
	<script src="<?php echo $sistemly['ts_dominio'];?>js/material.min.js "></script>
	<script src="<?php echo $sistemly['ts_dominio'];?>js/ripples.min.js "></script>
	<script src="<?php echo $sistemly['ts_dominio'];?>js/jquery.mCustomScrollbar.concat.min.js "></script>
	<script src="<?php echo $sistemly['ts_dominio'];?>js/main.js "></script>
	<script src="<?php echo $sistemly['ts_dominio'];?>js/bootstrap-select.min.js"></script>

	<script src="<?php echo $sistemly['ts_dominio'];?>public/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo $sistemly['ts_dominio'];?>public/datatables/dataTables.buttons.min.js"></script>
	<script src="<?php echo $sistemly['ts_dominio'];?>public/datatables/buttons.html5.min.js"></script>
	<script src="<?php echo $sistemly['ts_dominio'];?>public/datatables/buttons.colVis.min.js"></script>
	<script src="<?php echo $sistemly['ts_dominio'];?>public/datatables/jszip.min.js"></script>
	<script src="<?php echo $sistemly['ts_dominio'];?>public/datatables/pdfmake.min.js"></script>
	<script src="<?php echo $sistemly['ts_dominio'];?>public/datatables/vfs_fonts.js"></script>

	<script>
		$.material.init();
	</script>
		
</html>

