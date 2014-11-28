<!-- Inicio sesión de nuevo para acceder al dato del ID ya almacenado -->
<?php session_start(); ?>
<!DOCTYPE html><!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
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
<body>
  <header id="head_principal">
    <div id='cabecera'>
      <figure class="col-xs-1">
       <?php
       include_once("includes/database.php");
       if(isset($_GET["idHistoria"])){  
        $idAlmacenado= $_GET["idHistoria"];

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
        <a id="notificacion" href="#"><li>0 NOTIFICACIONES</li></a>
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
<?php 
$sqlHistorias= "SELECT historias.id AS idHistoria, historias.cupos AS cupos, historias.imgCreador AS imagen, historias.tiempo AS tiempo, historias.titulo AS titulo, 
historias.creador AS creador, historias.contenido AS contenido, historias.tipo AS tipo, historias.categoria AS categoria FROM Continuara.historias WHERE historias.id=".$idAlmacenado."";
$resHistorias= mysqli_query($con,$sqlHistorias);
while($rowHistorias=mysqli_fetch_array($resHistorias)){

  ?>
  <div class='col-xs-1'></div>

  <div class='col-xs-10' id='colaboradores'>
    <figure class='col-xs-2'>
      <?php
      echo"<img id='creador' class='".$rowHistorias["categoria"]."' src= '".$rowHistorias["imagen"]."'>";
      ?>
    </figure>
    <div class='col-xs-1'></div>
    <div class='col-xs-7 colaboradoresIN'>
     <h4>COLABORADORES</h4>
     <?php
     $sqlColaboradores="SELECT usuarios.rutaImg AS imagenColabora FROM Continuara.usuarios JOIN Continuara.colaboraciones ON usuarios.id=colaboraciones.idUsuario 
     WHERE colaboraciones.idHistoria=".$rowHistorias["idHistoria"]."";
     $resColaboradores=mysqli_query($con,$sqlColaboradores);
     while($rowColaboradores=mysqli_fetch_array($resColaboradores)){
       echo"<figure class='colaborador'>";
       echo"<img src= '".$rowColaboradores["imagenColabora"]."''>";
       echo"</figure>";
     }
     ?>
     <div class='colaborador'id='nuevoColaborador'>
      <?php
      echo"<a href=''>".$rowHistorias["cupos"]."</a>";
      ?>
    </div>
  </div>
</div>
<div class='col-xs-1'></div>
<article class='contenedor_visual col-xs-10'>
 <?php
	echo"<div class='info_historia col-xs-12 ".$rowHistorias["categoria"]."'>";
 
    echo"<div class='frente info col-xs-5 ".$rowHistorias["categoria"]."'>";
    ?>
      <div id="estado_historia" class="col-xs-2"></div>
      <h5>Historia en curso</h5>
    </div>
    <div class="col-xs-2"></div>
    <?php
    echo"<div class='frente info col-xs-5 ".$rowHistorias["categoria"]."'>";
    ?>
     <?php
     echo"<h5>tiempo restante: ".$rowHistorias["tiempo"]."</h5>";
     ?>
   </div>
   <div class="cont_info vis col-xs-12">
     <?php
     echo"<h1>".$rowHistorias["titulo"].", por: ".$rowHistorias["creador"]."</h1>";

     echo"<h3>".$rowHistorias["creador"].":</h3>";
     echo"<p>".$rowHistorias["contenido"]."</p>";

     $sqlColaboraciones="SELECT colaboraciones.contenido AS colaboracion, usuarios.nombre AS colaborante FROM Continuara.colaboraciones JOIN Continuara.usuarios
     ON colaboraciones.idUsuario=usuarios.id WHERE colaboraciones.idHistoria=".$rowHistorias["idHistoria"]."";
     $resColaboraciones=mysqli_query($con,$sqlColaboraciones);
     while ($rowColaboraciones=mysqli_fetch_array($resColaboraciones)) {
      echo"<h3>".$rowColaboraciones["colaborante"].":</h3>";
      echo"<p>".$rowColaboraciones["colaboracion"]."</p>";
    }
    ?>
    <div class="col-xs-10"></div>
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
}
?>
<div class="comentarios row">
  <h4>COMENTARIOS</h4>
  <?php
  $sqlComentario="SELECT comentarios.contenido AS comentario, usuarios.rutaImg AS imagenComent FROM Continuara.comentarios JOIN Continuara.usuarios
  ON comentarios.idUsuario=usuarios.id WHERE comentarios.idHistoria=".$idAlmacenado."";
  $resComentario=mysqli_query($con,$sqlComentario);
  while ($rowComentario=mysqli_fetch_array($resComentario)) {
   echo"<div class='publicados row'>";
   echo"<figure class='col-xs-3'><img src='".$rowComentario["imagenComent"]."'></figure>";
   echo"<p class='col-xs-9'>".$rowComentario["comentario"]."</p>";
   echo"</div>";
 }	
 ?>
 <H4>DEJA UN COMENTARIO</H4>
 <div class="comentar row">
  <figure class="col-xs-3"><img src="img/kammil.png"></figure>
  <div class="col-xs-9">
    <form  id="dejarComent"  method="POST">
     <?php
     echo"<input id='idHistoriaActual' type='hidden' name='idHistoriaActual' value='".$idAlmacenado."'>";
     ?>
     <textarea id="contenidoCom" name="contenidoCom" class="col-xs-12"></textarea>
     <div class="col-xs-12">
       <input type="submit" value="Comentar">
     </div>
   </form>
 </div>
</div>
</div>

<nav class="col-xs-12" id='menu'>
  <ul>
    <a href="home.php"><li class="col-xs-4">HOME</li></a>
    <a href="perfil.php"><li class="col-xs-4">PERFIL</li></a>
    <a href="crear.php"><li class="col-xs-4">CREAR</li></a>
  </ul>
</nav>
<div class="col-xs-11 col-sm-11 popUpNotificacion">
  <div class="contenedorNotif">
  </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>

<script src="js/vendor/bootstrap.min.js"></script>

<script src="js/main.js"></script>
</body>
</html>