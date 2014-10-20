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
    <div class='col-xs-1'></div>
	<div class='col-xs-10' id='colaboradores'>
		<figure class='col-xs-2'>
			<img id='creador' src= "img/kammil.png">
		</figure>
		<div class='col-xs-1'></div>
		<div class='col-xs-7'>
			<h4>COLABORADORES</h4>
			<figure class='colaborador'>
				<img src= "img/alegria.png">
			</figure>
			<figure class='colaborador'>
				<img src= "img/alegria.png">
			</figure>
			<div class='colaborador'id='nuevoColaborador'>
				<a href="">7</a>
			</div>
		</div>
	</div>
	<div class='col-xs-1'></div>
	<article class='contenedor_visual col-xs-10'>
	<div class="info_historia col-xs-12">
          <div class="frente info col-xs-5">
            <div id="estado_historia" class="col-xs-2"></div>
            <h5>Historia en curso</h5>
          </div>
          <div class="col-xs-2"></div>
          <div class="frente info col-xs-5">
            <h5>tiempo restante: 00:20:34</h5>
          </div>
          <div class="cont_info vis col-xs-12">
            <h1>Nueva historia por: veronica</h1>
            <h3>Voronica:</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
              Dignissimos doloribus totam, nobis inventore cumque ut 
              perspiciatis incidunt odio non natus placeat ratione, 
              quisquam nostrum ex sit iure explicabo magni officiis!
            </p>
            <h3>Ignacio:</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
              Dignissimos doloribus totam, nobis inventore cumque ut 
              perspiciatis incidunt odio non natus placeat ratione, 
              quisquam nostrum ex sit iure explicabo magni officiis!
            </p>
            <h3>Pepito:</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
              Dignissimos doloribus totam, nobis inventore cumque ut 
              perspiciatis incidunt odio non natus placeat ratione, 
              quisquam nostrum ex sit iure explicabo magni officiis!
            </p>
            <div class="col-xs-10"></div>
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
        <div class="comentarios row">
        <h4>COMENTARIOS</h4>
        	<div class="publicados row">
        		<figure class="col-xs-3"><img src="img/kammil.png"></figure>
        		<p class="col-xs-9">
        			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        			tempor incididunt ut labore et dolore magna aliqua.  
        		</p>
        	</div>
        	<H4>DEJA UN COMENTARIO</H4>
        	<div class="comentar row">
        		<figure class="col-xs-3"><img src="img/kammil.png"></figure>
        		<div class="col-xs-9">
        			<textarea class="col-xs-12">
        				
        			</textarea>
        			<div class="col-xs-12">
        			<input type="submit" value="COMENTAR">
        			</div>
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

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
          <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>

          <script src="js/vendor/bootstrap.min.js"></script>

          <script src="js/main.js"></script>
	</body>
</html>