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
		 <!-- Cabecera principal que contiene al ususario y la barra de busqueda -->
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
           <figure  class="col-xs-2"><img src="img/buscar_icon.png" alt=""></figure>
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
    	<h4>MIS HISTORIAS / HISTORIAS FINALIZADAS</h4>
    </div>
    <div id = 'accesos_perfil'>
        <div class='col-xs-1'></div>
    	<div class='col-xs-3'>
      <?php
       $sqlHistoriasUsuario="SELECT historias.id FROM Continuara.historias WHERE historias.idUsuario='". $_SESSION["username"]."'";
        $resHistoriasUsuario=mysqli_query($con,$sqlHistoriasUsuario);
        $filasHistoriasUsuario=mysqli_num_rows($resHistoriasUsuario);
    	echo"<h5>".$filasHistoriasUsuario." HISTORIAS</h5>";
      ?>
    	</div>
    	<div class='col-xs-4'>
       <?php
       $sqlColaboracionesUsuario="SELECT colaboraciones.id FROM Continuara.colaboraciones WHERE colaboraciones.idUsuario='". $_SESSION["username"]."'";
        $resColaboracionesUsuario=mysqli_query($con,$sqlColaboracionesUsuario);
        $filasColaboracionesUsuario=mysqli_num_rows($resColaboracionesUsuario);
      echo"<h5>".$filasColaboracionesUsuario." COLABORACIONES</h5>";
      ?>
    	</div>
    	<div class='col-xs-3'>
        <?php
       $sqlPlumasUsuario="SELECT plumas.id, historias.idUsuario FROM Continuara.plumas JOIN Continuara.historias ON historias.id=plumas.idHistoria
        WHERE historias.idUsuario='". $_SESSION["username"]."'";
        $resPlumasUsuario=mysqli_query($con,$sqlPlumasUsuario);
        $filasPlumasUsuario=mysqli_num_rows($resPlumasUsuario);
      echo"<h5>".$filasPlumasUsuario." Plumas</h5>";
      ?>
    	</div>
    	<div class='col-xs-1'></div>
    </div>
    <!--Articulo que corresponde a una historia, tiene la informacion
      del creador y la informacion general de la historias-->
      <div class='row' id='contenedor_perfil'>
       <!--Articulo que corresponde a una historia, tiene la informacion
      del creador y la informacion general de la historias-->
      <?php 
      include_once("includes/database.php");
      $sqlHistorias= "SELECT historias.id AS idHistoria, historias.cupos AS cupos, historias.imgCreador AS imagen, historias.tiempo AS tiempo, historias.titulo AS titulo, 
      historias.creador AS creador, historias.contenido AS contenido, historias.tipo AS tipo, historias.categoria AS categoria FROM Continuara.historias
      WHERE historias.idUsuario='". $_SESSION["username"]."'";
      $resHistorias= mysqli_query($con,$sqlHistorias);
      while($rowHistorias=mysqli_fetch_array($resHistorias)){


      echo"<article class='row'>";
        echo"<div class='cupos col-xs-4'>";
          echo"<div class='frente info col-xs-11 ".$rowHistorias["categoria"]."'>";
            echo"<h5>".$rowHistorias["cupos"]." cupos disponibles</h5>";
          echo"</div>";

        echo"</div>";
        echo"<div class='col-xs-4'></div>";
        echo"<div class='img_perfil col-xs-5'>";
          echo"<figure class='".$rowHistorias["categoria"]."'><img src=".$rowHistorias["imagen"]." alt=''></figure>";
        echo"</div>";
        echo"<div class='frente plumas col-xs-4 ".$rowHistorias["categoria"]."'>";
        $sqlPlumas="SELECT plumas.id FROM Continuara.plumas WHERE plumas.idHistoria='".$rowHistorias["idHistoria"]."'";
        $resPlumas=mysqli_query($con,$sqlPlumas);
        $filasPlumas=mysqli_num_rows($resPlumas);
          echo"<a class='linkHist' data-plumaID='".$rowHistorias["idHistoria"]."' href='#'><figure class='col-xs-2'><img src='img/pluma_icon.png' alt=''></figure>".$filasPlumas." plumas</a>";
        echo"</div>";
        echo"<div class='info_historia col-xs-12 ".$rowHistorias["categoria"]."'>";
          echo"<div class='frente info col-xs-5'>";
           if($rowHistorias["tiempo"]<1){
            echo"<div id='estado_historia2'  class='col-xs-2'></div>";
             echo"<h5>Historia Finalizada</h5>";
            }else{
              echo"<div id='estado_historia' class='col-xs-2'></div>";
               echo"<h5>Historia en curso</h5>";
            }
          echo"</div>";
          echo"<div class='col-xs-2'></div>";
          echo"<div class='frente info col-xs-5'>";
            echo"<h5>tiempo restante: ".$rowHistorias["tiempo"]."</h5>";
          echo"</div>";
          echo"<div class='cont_info col-xs-12'>";
            echo"<h1>".$rowHistorias["titulo"].", por: ".$rowHistorias["creador"]."</h1>";
            echo"<h3>".$rowHistorias["creador"].":</h3>";
            echo"<p>".$rowHistorias["contenido"]."</p>";
            echo"<div class='col-xs-10'></div>";
            echo"<a class='col-xs-2' href='visualizacion.php?idHistoria=".$rowHistorias["idHistoria"]."'>Ver más</a>";
          echo"</div>";
          echo"<div class='col-xs-12 clasificacion'>";
          echo"<div class='col-xs-2'></div>";
          echo"<div class='col-xs-4 tipo_historia'>";
            echo"<figure class='col-xs-4'><img src='img/cuento_icon.png' alt=''></figure>";
            echo"<h5 class='col-xs-8'>".$rowHistorias["tipo"]."</h5> ";
          echo"</div>";
          echo"<div class='col-xs-4 genero_historia'>";
           echo" <figure class='col-xs-4'><img src='img/comedia_icon.png' alt=''></figure>";
            echo"<h5 class='col-xs-8'>".$rowHistorias["categoria"]."</h5> ";
          echo"</div>";
          echo"<div class='col-xs-2'></div>";
        echo"</div>";
        echo"</div>";
      echo"</article>";
      }
 ?>
      </div>
		<!--<aside id='perfil'>
			<h2>MI PERFIL<h2>
			<hr>
			<img src= "img/foto.png">
			<h3>KAMMIL CARRANZA<h3>
			<img src= "img/libro.png">
			<h4>17 HISTORIAS</h4>
			<img src= "img/pluma.png">
			<h4>108 PLUMAS</h4>
		</aside>
		<aside id='barraLateral'>
			<input type="button" value="SALIR">
			<ul class = 'filtro1'>
				<li class = 'filtro1'>MIS HISTORIAS</li>
				<li class = 'filtro1'>FILTRAR POR</li>
					<ul class = 'filtro2'>
						<li class = 'filtro2'>GÉNERO</li>
						<li class = 'filtro2'>TIPO</li>
						<li class = 'filtro2'>TIEMPO</li>
						<li class = 'filtro2'>FINALIZADAS</li>
						<li class = 'filtro2'>PLUMAS</li>
					</ul>		
			</ul>
		</aside>-->
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