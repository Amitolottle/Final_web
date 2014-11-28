<!-- Inicio sesión de nuevo para acceder al dato del ID ya almacenado -->
<?php session_start(); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>>Continuara</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">


  <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body id="home_body">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->

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
                 <div class="col-xs-1 col-sm-1"></div>
                 <?php

                 echo"<h1 class='col-xs-3 col-sm-3 '>".$row["nombre"]."</h1>";
               }
               ?>
                <div class="col-xs-0 col-sm-5"></div>

               <nav class="col-xs-6 col-sm-3 col-sm-offset-4">
                <ul>
                  <li>0 NOTIFICACIONES</li>
                  <a id="salir" href="#"><li class='raya'>SALIR</li></a>
                </ul>
              </nav>
            </div>
            <div class="nave_buscador col-xs-12 col-sm-5">
              <div class="buscador col-xs-9 col-sm-7">
               <figure  class="col-xs-2 col-sm-2"><img src="img/buscar_icon.png" alt=""></figure>
               <input  id="buscar" class="buscador col-xs-10 col-sm-9" type="text">
             </div>
             <div class="btn_filtrar col-xs-3 col-sm-3">
               <select id="selecciones">
                <option>FILTRAR</option>
                <option value = "Activas">Historias Activas</option>
                <option value = "Romance">Romance</option>
                <option value = "Ficcion">Ficcion</option>
                <option value = "Comedia">Comedia</option>
                <option value = "Drama">Drama</option>
                <option value = "Fantasia">Fantasia</option>
                <option value = "Horror">Horror</option>
                <option value = "Improvisar">Improvisar</option>
              </select>
            </div>
          </div>
        </header>

        <!--Contenedor del articulo, en este estan las historias que se muestran-->
        <div id="contenedor_home" class="row">
          <div class="nombre_seccion">
            <h4>Nuevas historias</h4>
          </div>

      <!--Articulo que corresponde a una historia, tiene la informacion
      del creador y la informacion general de la historias-->
      <div id="todoContenido">
        <?php 
        include_once("includes/database.php");
        $sqlHistorias= "SELECT historias.id AS idHistoria, historias.cupos AS cupos, historias.imgCreador AS imagen, historias.tiempo AS tiempo, historias.titulo AS titulo, 
        historias.creador AS creador, historias.contenido AS contenido, historias.tipo AS tipo, historias.categoria AS categoria FROM Continuara.historias ";
        $resHistorias= mysqli_query($con,$sqlHistorias);
        while($rowHistorias=mysqli_fetch_array($resHistorias)){


          echo"<article class='row'>";
           echo"<div class = 'col-xs-0 col-sm-12'>";
        echo"<div class = 'col-xs-0 col-sm-1'></div>";

        echo"<div class = 'col-xs-0 col-sm-10' id='info_cont'>";
          echo"<div class='cupos col-xs-4 col-sm-4'>";
          echo"<div class='frente info col-xs-9 col-sm-11 ".$rowHistorias["categoria"]."'>";
          echo"<h5>".$rowHistorias["cupos"]." cupos disponibles</h5>";
          echo"</div>";
          echo"<div class='colaborar col-xs-12 col-sm-12 ".$rowHistorias["categoria"]."'>";
          echo"<h5 class='frente col-xs-8 col-sm-8 '>Colaborar</h5>";
          echo"<a class='linkCol' data-colaboracionID='".$rowHistorias["idHistoria"]."' href='#'><figure class='col-xs-2'><img src='img/btn_mas.png' alt=''></figure></a>";
          echo"<div class='col-xs-2 col-sm-2 '></div>";
          echo"</div>";
          echo"</div>";
          echo"<div class='col-xs-4 col-sm-5'></div>";
          echo"<div class='img_perfil col-xs-5 col-sm-5'>";
          echo"<figure class='".$rowHistorias["categoria"]."'><img src=".$rowHistorias["imagen"]." alt=''></figure>";
          echo"</div>";
          echo"<div class='frente plumas col-xs-4 col-sm-3 ".$rowHistorias["categoria"]."'>";
          $sqlPlumas="SELECT plumas.id FROM Continuara.plumas WHERE plumas.idHistoria='".$rowHistorias["idHistoria"]."'";
          $resPlumas=mysqli_query($con,$sqlPlumas);
          $filasPlumas=mysqli_num_rows($resPlumas);

          echo"<a class='linkHist' data-plumaID='".$rowHistorias["idHistoria"]."' href='#'><figure class='col-xs-2'><img src='img/pluma_icon.png' alt=''></figure>".$filasPlumas." plumas</a>";
          echo"</div>";
          echo"</div>";

          echo"<div class = 'col-xs-0 col-sm-1'></div>";

      echo"</div>";


        /*VISUALIZACION DE LA HISTORIA*/
      echo"<div class = 'col-sm-12'>";

        echo"<div class = 'col-sm-1'></div>";

          echo"<div class='info_historia col-xs-12 col-sm-10 ".$rowHistorias["categoria"]."'>";
          echo"<div class='frente info col-xs-5 col-sm-5'>";
          if($rowHistorias["tiempo"]<1){
            echo"<div id='estado_historia2'  class='col-xs-2 col-sm-2'></div>";
            echo"<h5>Historia Finalizada</h5>";
          }else{
            echo"<div id='estado_historia' class='col-xs-2 col-sm-2'></div>";
            echo"<h5>Historia en curso</h5>";
          }
          echo"</div>";
          echo"<div class='col-xs-2 col-sm-2'></div>";
          echo"<div class='frente info col-xs-5 col-sm-5'>";
          echo"<h5>tiempo restante:</h5";
          echo"</br>";
          echo"<h5>".$rowHistorias["tiempo"]." Minutos</h5>";
          echo"</div>";
          echo"<div class='cont_info col-xs-12 col-sm-12'>";
          echo"<h1>".$rowHistorias["titulo"].", por: ".$rowHistorias["creador"]."</h1>";

          echo"<h3>".$rowHistorias["creador"].":</h3>";
          echo"<p>".$rowHistorias["contenido"]."</p>";

          // $sqlColaboraciones="SELECT colaboraciones.contenido AS colaboracion, usuarios.nombre AS colaborante FROM Continuara.colaboraciones JOIN Continuara.usuarios
          // ON colaboraciones.idUsuario=usuarios.id WHERE colaboraciones.idHistoria=".$rowHistorias["idHistoria"]."";
          // $resColaboraciones=mysqli_query($con,$sqlColaboraciones);
          // while ($rowColaboraciones=mysqli_fetch_array($resColaboraciones)) {
          //   echo"<h3>".$rowColaboraciones["colaborante"].":</h3>";
          //   echo"<p>".$rowColaboraciones["colaboracion"]."</p>";
          // }
          echo"<div class='col-xs-10 col-sm-10'></div>";
          echo"<a class='col-xs-2 col-sm-2' href='visualizacion.php?idHistoria=".$rowHistorias["idHistoria"]."'>Ver más</a>";
          echo"</div>";
          echo"<div class='col-xs-12 col-sm-10 clasificacion'>";
          echo"<div class='col-xs-2 col-sm-2'></div>";
          echo"<div class='col-xs-4 col-sm-4 tipo_historia'>";
          echo"<figure class='col-xs-4 col-sm-4 '><img src='img/cuento_icon.png' alt=''></figure>";
          echo"<h5 class='col-xs-8 col-sm-8 '>".$rowHistorias["tipo"]."</h5> ";
          echo"</div>";
          echo"<div class='col-xs-4 col-sm-4 genero_historia'>";
          echo" <figure class='col-xs-4 col-sm-4'><img src='img/comedia_icon.png' alt=''></figure>";
          echo"<h5 class='col-xs-8 col-sm-8 '>".$rowHistorias["categoria"]."</h5> ";
          echo"</div>";
          echo"<div class='col-xs-2 col-sm-2'></div>";
        echo"</div>";
        echo"<div class = 'col-xs-0 col-sm-1'></div>";
        echo"</div>";
        echo"<div class = 'col-xs-0 col-sm-1'></div>";
        
      echo"</div>";
      echo"</article>";
        }
        ?>
        </div>
      </div>

      <nav class="col-xs-12 col-sm-12" id='menu'>
        <ul>
          <a href="home.php"><li class="col-xs-4 col-sm-4">HOME</li></a>
          <a href="perfil.php"><li class="col-xs-4 col-sm-4">PERFIL</li></a>
          <a href="crear.php"><li class="col-xs-4 col-sm-4">CREAR</li></a>
        </ul>
      </nav>



      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>

      <script src="js/vendor/bootstrap.min.js"></script>

      <script src="js/main.js"></script>
    </body>
    </html>
