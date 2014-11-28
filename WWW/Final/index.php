<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
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
 <body id="login_body">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
  <header id="login_header" class="row"> 
    <div class="col-xs-2 col-sm-3"></div>
     <figure class="col-xs-6 col-sm-6"><img src="img/logo_log.png" alt=""></figure>
     <div class="col-xs-3 col-sm-3"></div>
    <nav id="login_nav" class="col-sm-12">
      <form id="login" class="home_forms col-sm-12"  method="POST">
        <div class="cont_input col-xs-12 col-sm-5">
        <figure class="col-xs-2 col-sm-1"><img src="img/user_log_icon.png" alt=""></figure>
        <input id="correoLogin" class="col-xs-10 col-sm-9" type="text" name="correo" placeholder="Correo">
        </div>
        <div class="cont_input col-xs-12 col-sm-5">
        <figure class="col-xs-2 col-sm-1"><img src="img/password_log_icon.png" alt=""></figure>
        <input id="pwLogin" class="col-xs-10 col-sm-9" type="text" name="pw" placeholder="Contraseña">
        </div>
        <div class="cont_submit col-xs-12 col-sm-2">
        <input class="col-xs-12" type="submit" value="INICIAR SESIÓN">
        </div>
      </form>
    </nav>
   <div class="col-xs-12 row">
    <p >¿Hasta dondé continúan las historias?</p>
    </div>
    <div class="row">
    <div class="col-xs-5"></div>
    <div class="col-xs-2">
      <a href="#login_div">
        <figure><img src="img/btn_login_bajar_movil.png" alt=""></figure>
      </a>
    </div>
    <div class="col-xs-5"></div>
    </div>

  </header>
  <div id="login_div" class="row">
    <div class="col-xs-12">
    <p>
      En continuará, serás parte de una red de escritores 
      de historias colectivas, historias que nacen a partir 
      de un “cadever exquisito”. Es decir crear a partir de 
      mínima información de un parrafo anterior. Unete hoy 
      mismo y descubre las posibilidades de creación que 
      podrás generar junto a cientos de usuarios.
      <br>
      <br>
      Tal vez aquí se encuentre el próximo Nobel de literatura 
      o el creador de un movimiento venguardista
    </p>
    </div>
  </div>
  <div id="login_conten" class="row">
    <div id="contenSection">
      <aside class="row">
        <div id="form_registro">
          <h3>Registrarse</h3>
          <form id="registro" class="home_forms" method="POST">
            <input id="nombresReg" type="text" name="nombres" placeholder="Nombre de usuario">
            <input id="correoReg" type="text" name="correo" placeholder="Correo Electrónico">
            <input id="pwReg" type="text" name="pw" placeholder="Contraseña">
            <input id="confirmarPwReg" type="text" name="confirmarPw" placeholder="Confirmar Contraseña">
            <input id="fechaReg" type="date" name="fecha">
            <select id="generoReg" name="genero" placeholder="Genero">
              <option value="hombre">Hombre</option>
              <option value="mujer">Mujer</option>
            </select>
            <input type="submit" value="Registrar">
          </form>
        </div>
      </aside>
    </div>
  </div> 




          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
          <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>

          <script src="js/vendor/bootstrap.min.js"></script>

          <script src="js/main.js"></script>
        </body>
        </html>
