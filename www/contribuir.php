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
        			<img id="foto_perfil" src= "img/kammil.png"> 
      			</figure>
      			<div class="col-xs-1"></div>
      			<h1 class="col-xs-3">KAMMIL CARRANZA</h1>
      			<nav class="col-xs-6">
        			<ul>
        			  <li>0 NOTIFICACIONES</li>
        			  <li class='raya'>SALIR</li>
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
       <article class="row">
        <div class="cupos col-xs-4">
          <div class="frente info col-xs-11">
            <h5>2 cupos disponibles</h5>
          </div>

          <div class="colaborar col-xs-12">
            <h5 class="frente col-xs-8">Colaborar</h5>
            <a href=""><figure class="col-xs-2"><img src="img/btn_mas.png" alt=""></figure></a>
            <div class="col-xs-2"></div>
          </div>
        </div>
        <div class="col-xs-4"></div>
        <div class="img_perfil col-xs-5">
          <figure><img src="img/alegria.png" alt=""></figure>
        </div>
        <div class="frente plumas col-xs-4">
          <a href=""><figure class="col-xs-2"><img src="img/pluma_icon.png" alt=""></figure>28 plumas</a>
        </div>
        <div class="info_historia col-xs-12">
          <div class="frente info col-xs-5">
            <div id="estado_historia" class="col-xs-2"></div>
            <h5>Historia en curso</h5>
          </div>
          <div class="col-xs-2"></div>
          <div class="frente info col-xs-5">
            <h5>tiempo restante: 00:20:34</h5>
          </div>
          
          <div class="col-xs-12 clasificacion">
          <div class="col-xs-2"></div>
          <div class="col-xs-4 tipo_historia">
            <figure class="col-xs-4"><img src="img/cuento_icon.png" alt=""></figure>
            <h5 class="col-xs-8">cuento</h5> 
          </div>
          <div class="col-xs-4 genero_historia">
            <figure class="col-xs-4"><img src="img/comedia_icon.png" alt=""></figure>
            <h5 class="col-xs-8">comedia</h5> 
          </div>
          <div class="col-xs-2"></div>
        </div>
        </div>
      </article>
    	<div class="col-xs-1"></div>
		<section class='col-xs-10'id='colaborar'>
			<form class='escribir'>
				<!--<img id='pluma' src= "img/pluma.png"> -->
				<h3>CONTRIBUCIÓN</h3>
				<textarea></textarea>
				<div class="col-xs-10"></div>
				<input class="col-xs-2" type="button" value="PUBLICAR">
			</form>
		</section>
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