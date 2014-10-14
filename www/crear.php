<!DOCTYPE html>
<html>
	<head>
		<title>Crear</title>
		<link rel="stylesheet" href="css/estilos.css" />
		<meta charset="utf-8">
		<meta name= "viewport" content="width=device-width">
	</head>
	<body>
		<header id='cabecera'>
			<h1>BIENVENIDO: KAMMIL CARRANZA</h1>
			<img src= "img/logo.png"> 
			<nav>
				<ul>
					<li>HOME</li>
					<li>PERFIL</li>
					<li>CREAR</li>
					<li>NOTIFICACIONES</li>
				</ul>
			</nav>
		</header>
		<section id='crear'>
			<form>
				<img id='pluma' src= "img/pluma.png"> 
				<input type="text" name="titulo" value="TITULO">
				<select name = "TIPO DE HISTORIA">
					<option value = "cueto corto">CUENTO CORTO</option>
					<option value = "cueto medio">CUENTO MEDIO</option>
					<option value = "cueto largo">CUENTO LARGO</option>
					<option value = "continuara">CONTINUARÁ</option>
				</select>
				<select name = "CATEGORIA">
					<option value = "romance">ROMANCE</option>
					<option value = "ficcion">FICCIÓN</option>
					<option value = "comedia">COMEDOA</option>
					<option value = "drama">DRAMA</option>
					<option value = "fantasia">FANTASIA</option>
					<option value = "horror">HORROR</option>
					<option value = "improvisar">IMPROVISAR</option>
				</select>
				<textarea></textarea>
				<input type="button" value="PUBLICAR">
			</form>
		</section>
		<aside id='barraLateral'>
			<input type="button" value="SALIR">
			<ul class='filtro1'>
				<li class='filtro1'>MIS HISTORIAS</li>
				<li class='filtro1'>FILTRAR POR</li>
					<ul class='filtro2'>
						<li class='filtro2'>GÉNERO</li>
						<li class='filtro2'>TIPO</li>
						<li class='filtro2'>TIEMPO</li>
						<li class='filtro2'>FINALIZADAS</li>
						<li class='filtro2'>PLUMAS</li>
					</ul>		
			</ul>
		</aside>
	</body>
</html>