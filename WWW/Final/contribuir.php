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
  <?php
include_once("includes/database.php");
if(isset($_GET["idHistoria"])){  
  $idAlmacenado= $_GET["idHistoria"];
  $sqlValidacion= "SELECT historias.id FROM Continuara.historias WHERE historias.idUsuario='".$_SESSION["username"]."' AND historias.id='".$idAlmacenado."'";
  $resValidacion=mysqli_query($con,$sqlValidacion);
  if(mysqli_num_rows($resValidacion)>0){
    //$sql="INSERT INTO Continuara.plumas(`idUsuario`, `idHistoria`) VALUES ('".$_SESSION["username"]."','$idAlmacenado')";
    //$comunicacion=mysqli_query($con,$sql);
    echo"<h1>NO PUEDES CONTRIBUIR A TU MISMA HISTORIA!</h1>";
    echo"<meta http-equiv='refresh' content='4;url=home.php'>";
  }else{
   ?>
    
		<header id="head_principal">
      		<div id='cabecera'>
      			<figure class="col-xs-1">
        			 <?php
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
    		<h4>NUEVAS HISTORIAS</h4>
    	</div>
    	<div class='row' id='contenedor_home'>
      <?php
      $sqlHistorias= "SELECT historias.id AS idHistoria, historias.cupos AS cupos, historias.imgCreador AS imagen, historias.tiempo AS tiempo, historias.titulo AS titulo, 
      historias.creador AS creador, historias.tipo AS tipo, historias.categoria AS categoria FROM Continuara.historias WHERE historias.id=".$idAlmacenado." ";
      $resHistorias= mysqli_query($con,$sqlHistorias);
      while($rowHistorias=mysqli_fetch_array($resHistorias)){
      ?>
       <article class="row">
        <div class="cupos col-xs-4">
          <div class="frente info col-xs-11">
          <?php 
           echo"<h5>".$rowHistorias["cupos"]." cupos disponibles</h5>";
            ?>
          </div>

          <div class="colaborar col-xs-12">
            <h5 class="frente col-xs-8">Colaborar</h5>
            <a href=""><figure class="col-xs-2"><img src="img/btn_mas.png" alt=""></figure></a>
            <div class="col-xs-2"></div>
          </div>
        </div>
        <div class="col-xs-4"></div>
        <div class="img_perfil col-xs-5">
        <?php
         echo"<figure><img src=".$rowHistorias["imagen"]." alt=''></figure>";
          ?>
        </div>
        <div class="frente plumas col-xs-4">
        <?php
           $sqlPlumas="SELECT plumas.id FROM Continuara.plumas WHERE plumas.idHistoria='".$rowHistorias["idHistoria"]."'";
        $resPlumas=mysqli_query($con,$sqlPlumas);
        $filasPlumas=mysqli_num_rows($resPlumas);
          echo"<a href='includes/agregarPluma.php?idHistoria=".$rowHistorias["idHistoria"]."'><figure class='col-xs-2'><img src='img/pluma_icon.png' alt=''></figure>".$filasPlumas." plumas</a>";
          ?>
        </div>
        <div class="info_historia col-xs-12">
          <div class="frente info col-xs-5">
            <div id="estado_historia" class="col-xs-2"></div>
            <h5>Historia en curso</h5>
          </div>
          <div class="col-xs-2"></div>
          <div class="frente info col-xs-5">
            <?php
             echo"<h5>tiempo restante: ".$rowHistorias["tiempo"]."</h5>";
            ?>
          </div>
          
          <div class="col-xs-12 clasificacion">
          <div class="col-xs-2"></div>
          <div class="col-xs-4 tipo_historia">
            <figure class="col-xs-4"><img src="img/cuento_icon.png" alt=""></figure>
            <?php
            echo"<h5 class='col-xs-8'>".$rowHistorias["tipo"]."</h5> ";
            ?>
          </div>
          <div class="col-xs-4 genero_historia">
            <figure class="col-xs-4"><img src="img/comedia_icon.png" alt=""></figure>
            <?php
            echo"<h5 class='col-xs-8'>".$rowHistorias["categoria"]."</h5> ";
            ?>
          </div>
          <div class="col-xs-2"></div>
        </div>
        </div>
      </article>
      <?php
    }
    ?>
    	<div class="col-xs-1"></div>
		<section class='col-xs-10'id='colaborar'>
			<form class='escribir' action="includes/agregarContribucion.php" method="POST">
				<!--<img id='pluma' src= "img/pluma.png"> -->
				<h3>CONTRIBUCIÓN</h3>
        <?php
        echo"<input type='hidden' name='idHistoriaActual' value='".$idAlmacenado."'>";
        ?>
				<textarea name="contenidoCon"></textarea>
				<div class="col-xs-10"></div>
				<input class="col-xs-2" type="submit" value="Publicar">
			</form>
		</section>
		<nav class="col-xs-12" id='menu'>
        	<ul>
        		 <a href="home.php"><li class="col-xs-4">HOME</li></a>
          <a href="perfil.php"><li class="col-xs-4">PERFIL</li></a>
          <a href="crear.php"><li class="col-xs-4">CREAR</li></a>
        	</ul>
      	</nav>
        <?php
       }
  
}
?>
      
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
          <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>

          <script src="js/vendor/bootstrap.min.js"></script>

          <script src="js/main.js"></script>
	</body>
</html>