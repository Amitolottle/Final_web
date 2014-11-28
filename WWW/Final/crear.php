<!-- Inicio sesión de nuevo para acceder al dato del ID ya almacenado -->
<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	  <title>>Log In</title>
	  <meta name="description" content="">
	  <meta name="viewport" content="width=device-width, initial-scale=1">

	  <link rel="stylesheet" href="css/bootstrap.min.css">
	  <link rel="stylesheet" href="css/main.css">

	  <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	</head>
	<body>
	<header id="head_principal">
    	<div id='cabecera'>
      		<figure class="col-xs-1">
        		<?php
            include_once("includes/database.php");
            $sql="SELECT usuarios.nombre AS nombre, usuarios.id AS idUsuario, usuarios.rutaImg AS imagen  FROM Continuara.usuarios WHERE usuarios.id='". $_SESSION["username"]."'";
            $resultado=mysqli_query($con,$sql);

            while ($row= mysqli_fetch_array($resultado)) {
               echo"<img id='foto_perfil' src=".$row["imagen"].">"; 
              ?>
      		</figure>
      		<div class="col-xs-1"></div>
      		 <?php
              
              echo"<h1 class='col-xs-3'>".$row["nombre"]."</h1>";
            }
              ?>
      		<nav class="col-xs-6">
        		<ul>
        			<li>0 NOTIFICACIONES</li>
          		 <a href="includes/terminarSesion.php"><li class='raya'>SALIR</li></a>
       			</ul>
      		</nav>
    	</div>
    	<div class="nave_buscador col-xs-12">
        	<div class="buscador col-xs-9">
           		<figure  class="col-xs-2">
           			<img src="img/buscar_icon.png" alt="">
           		</figure>
           		<input  class="buscador col-xs-10"type="text">
        	</div>
        	<div class="btn_filtrar col-xs-3">
          		<select>
          			<option>FILTRAR</option>
          			<option value = "nuevas historias">NUEVAS HISTORIAS</option>
          			<option value = "genero">GÉNERO</option>
          			<option value = "categoria">CATEGORIA</option>
          			<option value = "tiempo">TIEMPO</option>
          			<option value = "en curso">EN CURSO</option>
          			<option value = "finalizadas">FINALIZADAS</option>
          			<option value = "numero de plumas">NÚMERO DE PLUMAS</option>
          		</select>
        	</div>
   		</div>
    </header>
    <div class = 'nombre_seccion'>
    	<h4>CREAR NUEVA HISTORIA</h4>
    </div>
		<div class="col-xs-1"></div>
		<section class='col-xs-10' id='crear'>
			<form id="crearHist" class ='escribir' method="POST">
				<!--<img id='pluma' src= "img/pluma.png"> -->
				<input id="tituloCrear" type="text" name="titulo" value="TITULO">
				  <select id="tipoCrear" name = "tipo">
          <option value = "cuento corto">CUENTO CORTO</option>
          <option value = "cuento medio">CUENTO MEDIO</option>
          <option value = "cuento largo">CUENTO LARGO</option>
          <option value = "continuara">CONTINUARÁ</option>
        </select>
        <select id="generoCrear" name = "genero">
          <option value = "Romance">ROMANCE</option>
          <option value = "Ficcion">FICCIÓN</option>
          <option value = "Comedia">COMEDIA</option>
          <option value = "Drama">DRAMA</option>
          <option value = "Fantasia">FANTASIA</option>
          <option value = "Horror">HORROR</option>
          <option value = "Improvisar">IMPROVISAR</option>
        </select>
        <textarea id="contenidoCrear" name="contenido"></textarea>
				<div class="col-xs-10"></div>
				<input class="col-xs-2" type="submit" value="PUBLICAR">
			</form>
		</section>
		<div class="col-xs-1"></div>
		<nav class="col-xs-12" id='menu'>
        <ul>
           <a href="home.php"><li class="col-xs-4">HOME</li></a>
          <a href="perfil.php"><li class="col-xs-4">PERFIL</li></a>
          <a href="crear.php"><li class="col-xs-4">CREAR</li></a>
        </ul>
      </nav>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
          <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>

          <script src="js/vendor/bootstrap.min.js"></script>

          <script src="js/main.js"></script>
	</body>
</html>