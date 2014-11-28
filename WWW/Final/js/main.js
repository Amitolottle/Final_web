$(document).ready(function(){
	$( "#login" ).submit(function( event ) {
		console.log("FUNCA");
		var user=$("#correoLogin").val();
		var pass=$("#pwLogin").val();
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: "includes/validarUsuario.php",
			data: { correo: user, pw: pass }
		}).done(function(){
			console.log("Solicitud enviada al API");
		}).success(function(result){
			var conca=JSON.parse(result);
			console.log("Resultado: "+conca.error);
			if(conca.error=="false"){
				console.log("NO TAN PUTA VIDA");

				window.location.replace("home.php");
			}else{
				console.log("PUTA VIDA");
				$("#correoLogin").val('');
				$("#pwLogin").val('');
				alert("Datos incorrectos, vuelva a digitarlos de nuevo");
				//window.location.replace("index.php");
			}
			
		}).error(function(error){
			console.log("Error: "+ error);
			//
		})
	});


	$( "#registro" ).submit(function( event ) {
		console.log("FUNCAREG");
		var userReg=$("#nombresReg").val();
		var correoReg=$("#correoReg").val();
		var passReg=$("#pwReg").val();
		var passConfReg=$("#confirmarPwReg").val();
		var fechaReg=$("#fechaReg").val();
		var generoReg=$("#generoReg").val();
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: "includes/registrarUsuario.php",
			data: { nombres: userReg, correo: correoReg, pw:passReg, confirmarPw:passConfReg, fecha:fechaReg, genero:generoReg }
		}).done(function(){
			console.log("Solicitud enviada al API");
		}).success(function(result){
			console.log("Resultado: "+result);
			var concaReg=JSON.parse(result);
			console.log("Resultado: "+concaReg.error);
			if(concaReg.error=="false"){
				console.log("NO TAN PUTA VIDA");

				window.location.replace("home.php");
			}else{
				console.log("PUTA VIDA");
				window.location.replace("index.php");
			}
			
		}).error(function(error){
			console.log("Error: "+ error);
			
		})
	});

	$( "#salir" ).click(function( event ) {
		console.log("FUNCASalir");
		event.preventDefault();
		$.ajax({
			type: "GET",
			url: "includes/terminarSesion.php",
			data: {}
		}).done(function(){
			console.log("Solicitud enviada al API");
		}).success(function(result){
			window.location.replace("index.php");
		}).error(function(error){
			console.log("Error: "+ error);
			//
		})
	});

	$( "#buscar" ).keypress(function( event ) {
		if ( event.which == 13 ) {
			event.preventDefault();
			var busqueda = $('#buscar').val();
			$.ajax({
				type: "POST",
				url: "includes/buscar.php",
				data: { palabra: busqueda }
			}).done(function(){
				console.log("Solicitud de busqueda enviada al API");
			}).success(function(result){
				console.log("Resultado: "+result);
				resultado = JSON.parse(result);
				html = "";
				if(!resultado.error){
					$("#todoContenido").empty();
					for(i=0;i<resultado.historia.length;i++){ 
						html += "<article class='row'>";
						html += "<div class='cupos col-xs-4'>";
						html +="<div class='frente info col-xs-11 "+resultado.historia[i].categoria+"'>";
						html +="<h5>"+resultado.historia[i].cupos+" cupos disponibles</h5>";
						html +="</div>";
						html +="<div class='colaborar col-xs-12 "+resultado.historia[i].categoria+"'>";
						html +="<h5 class='frente col-xs-8'>Colaborar</h5>";
						html +="<a href='includes/validarContribucion.php?idHistoria="+resultado.historia[i].idHistoria+"'><figure class='col-xs-2'><img src='img/btn_mas.png' alt=''></figure></a>";
						html +="<div class='col-xs-2'></div>";
						html +="</div>";
						html +="</div>";
						html +="<div class='col-xs-4'></div>";
						html +="<div class='img_perfil col-xs-5'>";
						html +="<figure class='"+resultado.historia[i].categoria+"'><img src='"+resultado.historia[i].imagen+"' alt=''></figure>";
						html +="</div>";
						html +="<div class='frente plumas col-xs-4 "+resultado.historia[i].categoria+"'>";
						html += "<a id='"+resultado.historia[i].idHistoria+"' class='linkHist' href='#'><figure class='col-xs-2'><img src='img/pluma_icon.png' alt=''></figure>"+resultado.historia[i].plumas+" plumas</a>";
						html +="</div>";
						html +="<div class='info_historia col-xs-12 "+resultado.historia[i].categoria+"'>";
						html +="<div class='frente info col-xs-5'>";
						html +="<div id='estado_historia' class='col-xs-2'></div>";
						html +="<h5>Historia en curso</h5>";
						html +="</div>";
						html +="<div class='col-xs-2'></div>";
						html +="<div class='frente info col-xs-5'>";
						html +="<h5>tiempo restante: "+resultado.historia[i].tiempo+"</h5>";
						html +="</div>";
						html +="<div class='cont_info col-xs-12'>";
						html +="<h1>"+resultado.historia[i].titulo+", por: "+resultado.historia[i].creador+"</h1>";
						html +="<h3>"+resultado.historia[i].creador+":</h3>";
						html +="<p>"+resultado.historia[i].contenido+"</p>";
						html +="<div class='col-xs-10'></div>";
						html +="<a class='col-xs-2' href='visualizacion.php?idHistoria="+resultado.historia[i].idHistoria+"'>Ver más</a>";
						html +="</div>";
						html +="<div class='col-xs-12 clasificacion'>";
						html +="<div class='col-xs-2'></div>";
						html +="<div class='col-xs-4 tipo_historia'>";
						html +="<figure class='col-xs-4'><img src='img/cuento_icon.png' alt=''></figure>";
						html +="<h5 class='col-xs-8'>"+resultado.historia[i].tipo+"</h5> ";
						html +="</div>";
						html +="<div class='col-xs-4 genero_historia'>";
						html +=" <figure class='col-xs-4'><img src='img/comedia_icon.png' alt=''></figure>";
						html +="<h5 class='col-xs-8'>"+resultado.historia[i].categoria+"</h5> ";
						html +="</div>";
						html +="<div class='col-xs-2'></div>";
						html +="</div>";
						html +="</div>";
						html +="</article>";

						$("#todoContenido").html(html);
					}
				}
				console.log(resultado);


			}).error(function(error){
				console.log("Error: "+ error);

			})
		}
	})

$("#selecciones").change(function(){
		//event.preventDefault();
		var value = $(this).val();
		//console.log(value);
		switch(value){
			case "Activas":
			$("#todoContenido").empty();

			$.ajax({
				type: "GET",
				url: "includes/filtrarActivo.php",
				data: {}
			})
			.done(function(){
				console.log("Solicitud enviada al API");
			})
			.success(function(result){
				resultado = JSON.parse(result);
				html = "";
				if(!resultado.error){
					for(i=0;i<resultado.historia.length;i++){ 
						html += "<article class='row'>";
						html += "<div class='cupos col-xs-4'>";
						html +="<div class='frente info col-xs-11 "+resultado.historia[i].categoria+"'>";
						html +="<h5>"+resultado.historia[i].cupos+" cupos disponibles</h5>";
						html +="</div>";
						html +="<div class='colaborar col-xs-12 "+resultado.historia[i].categoria+"'>";
						html +="<h5 class='frente col-xs-8'>Colaborar</h5>";
						html +="<a href='includes/validarContribucion.php?idHistoria="+resultado.historia[i].idHistoria+"'><figure class='col-xs-2'><img src='img/btn_mas.png' alt=''></figure></a>";
						html +="<div class='col-xs-2'></div>";
						html +="</div>";
						html +="</div>";
						html +="<div class='col-xs-4'></div>";
						html +="<div class='img_perfil col-xs-5'>";
						html +="<figure class='"+resultado.historia[i].categoria+"'><img src='"+resultado.historia[i].imagen+"' alt=''></figure>";
						html +="</div>";
						html +="<div class='frente plumas col-xs-4 "+resultado.historia[i].categoria+"'>";
						html += "<a id='"+resultado.historia[i].idHistoria+"' class='linkHist' href='#'><figure class='col-xs-2'><img src='img/pluma_icon.png' alt=''></figure>"+resultado.historia[i].plumas+" plumas</a>";
						html +="</div>";
						html +="<div class='info_historia col-xs-12 "+resultado.historia[i].categoria+"'>";
						html +="<div class='frente info col-xs-5'>";
						html +="<div id='estado_historia' class='col-xs-2'></div>";
						html +="<h5>Historia en curso</h5>";
						html +="</div>";
						html +="<div class='col-xs-2'></div>";
						html +="<div class='frente info col-xs-5'>";
						html +="<h5>tiempo restante: "+resultado.historia[i].tiempo+"</h5>";
						html +="</div>";
						html +="<div class='cont_info col-xs-12'>";
						html +="<h1>"+resultado.historia[i].titulo+", por: "+resultado.historia[i].creador+"</h1>";
						html +="<h3>"+resultado.historia[i].creador+":</h3>";
						html +="<p>"+resultado.historia[i].contenido+"</p>";
						html +="<div class='col-xs-10'></div>";
						html +="<a class='col-xs-2' href='visualizacion.php?idHistoria="+resultado.historia[i].idHistoria+"'>Ver más</a>";
						html +="</div>";
						html +="<div class='col-xs-12 clasificacion'>";
						html +="<div class='col-xs-2'></div>";
						html +="<div class='col-xs-4 tipo_historia'>";
						html +="<figure class='col-xs-4'><img src='img/cuento_icon.png' alt=''></figure>";
						html +="<h5 class='col-xs-8'>"+resultado.historia[i].tipo+"</h5> ";
						html +="</div>";
						html +="<div class='col-xs-4 genero_historia'>";
						html +=" <figure class='col-xs-4'><img src='img/comedia_icon.png' alt=''></figure>";
						html +="<h5 class='col-xs-8'>"+resultado.historia[i].categoria+"</h5> ";
						html +="</div>";
						html +="<div class='col-xs-2'></div>";
						html +="</div>";
						html +="</div>";
						html +="</article>";

						$("#todoContenido").html(html);
					}
				}
				console.log(resultado);
			})
.error(function(error){
	console.log("Error: "+ error);
})
break;
case 'Romance':
$("#todoContenido").empty();

$.ajax({
	type: "GET",
	url: "includes/filtrarRomance.php",
	data: {}
})
.done(function(){
	console.log("Solicitud enviada al API");
})
.success(function(result){
	resultado = JSON.parse(result);
	html = "";
	if(!resultado.error){
		for(i=0;i<resultado.historia.length;i++){ 
			html += "<article class='row'>";
			html += "<div class='cupos col-xs-4'>";
			html +="<div class='frente info col-xs-11 "+resultado.historia[i].categoria+"'>";
			html +="<h5>"+resultado.historia[i].cupos+" cupos disponibles</h5>";
			html +="</div>";
			html +="<div class='colaborar col-xs-12 "+resultado.historia[i].categoria+"'>";
			html +="<h5 class='frente col-xs-8'>Colaborar</h5>";
			html +="<a href='includes/validarContribucion.php?idHistoria="+resultado.historia[i].idHistoria+"'><figure class='col-xs-2'><img src='img/btn_mas.png' alt=''></figure></a>";
			html +="<div class='col-xs-2'></div>";
			html +="</div>";
			html +="</div>";
			html +="<div class='col-xs-4'></div>";
			html +="<div class='img_perfil col-xs-5'>";
			html +="<figure class='"+resultado.historia[i].categoria+"'><img src='"+resultado.historia[i].imagen+"' alt=''></figure>";
			html +="</div>";
			html +="<div class='frente plumas col-xs-4 "+resultado.historia[i].categoria+"'>";
			html += "<a id='"+resultado.historia[i].idHistoria+"' class='linkHist' href='#'><figure class='col-xs-2'><img src='img/pluma_icon.png' alt=''></figure>"+resultado.historia[i].plumas+" plumas</a>";
			html +="</div>";
			html +="<div class='info_historia col-xs-12 "+resultado.historia[i].categoria+"'>";
			html +="<div class='frente info col-xs-5'>";
			html +="<div id='estado_historia' class='col-xs-2'></div>";
			html +="<h5>Historia en curso</h5>";
			html +="</div>";
			html +="<div class='col-xs-2'></div>";
			html +="<div class='frente info col-xs-5'>";
			html +="<h5>tiempo restante: "+resultado.historia[i].tiempo+"</h5>";
			html +="</div>";
			html +="<div class='cont_info col-xs-12'>";
			html +="<h1>"+resultado.historia[i].titulo+", por: "+resultado.historia[i].creador+"</h1>";
			html +="<h3>"+resultado.historia[i].creador+":</h3>";
			html +="<p>"+resultado.historia[i].contenido+"</p>";
			html +="<div class='col-xs-10'></div>";
			html +="<a class='col-xs-2' href='visualizacion.php?idHistoria="+resultado.historia[i].idHistoria+"'>Ver más</a>";
			html +="</div>";
			html +="<div class='col-xs-12 clasificacion'>";
			html +="<div class='col-xs-2'></div>";
			html +="<div class='col-xs-4 tipo_historia'>";
			html +="<figure class='col-xs-4'><img src='img/cuento_icon.png' alt=''></figure>";
			html +="<h5 class='col-xs-8'>"+resultado.historia[i].tipo+"</h5> ";
			html +="</div>";
			html +="<div class='col-xs-4 genero_historia'>";
			html +=" <figure class='col-xs-4'><img src='img/comedia_icon.png' alt=''></figure>";
			html +="<h5 class='col-xs-8'>"+resultado.historia[i].categoria+"</h5> ";
			html +="</div>";
			html +="<div class='col-xs-2'></div>";
			html +="</div>";
			html +="</div>";
			html +="</article>";

			$("#todoContenido").html(html);
		}
	}
	console.log(resultado);
})
.error(function(error){
	console.log("Error: "+ error);
})
break;


case "Ficcion":
$("#todoContenido").empty();

$.ajax({
	type: "GET",
	url: "includes/filtrarFiccion.php",
	data: {}
})
.done(function(){
	console.log("Solicitud enviada al API");
})
.success(function(result){
	resultado = JSON.parse(result);
	html = "";
	if(!resultado.error){
		for(i=0;i<resultado.historia.length;i++){ 
			html += "<article class='row'>";
			html += "<div class='cupos col-xs-4'>";
			html +="<div class='frente info col-xs-11 "+resultado.historia[i].categoria+"'>";
			html +="<h5>"+resultado.historia[i].cupos+" cupos disponibles</h5>";
			html +="</div>";
			html +="<div class='colaborar col-xs-12 "+resultado.historia[i].categoria+"'>";
			html +="<h5 class='frente col-xs-8'>Colaborar</h5>";
			html +="<a href='includes/validarContribucion.php?idHistoria="+resultado.historia[i].idHistoria+"'><figure class='col-xs-2'><img src='img/btn_mas.png' alt=''></figure></a>";
			html +="<div class='col-xs-2'></div>";
			html +="</div>";
			html +="</div>";
			html +="<div class='col-xs-4'></div>";
			html +="<div class='img_perfil col-xs-5'>";
			html +="<figure class='"+resultado.historia[i].categoria+"'><img src='"+resultado.historia[i].imagen+"' alt=''></figure>";
			html +="</div>";
			html +="<div class='frente plumas col-xs-4 "+resultado.historia[i].categoria+"'>";
			html += "<a id='"+resultado.historia[i].idHistoria+"' class='linkHist' href='#'><figure class='col-xs-2'><img src='img/pluma_icon.png' alt=''></figure>"+resultado.historia[i].plumas+" plumas</a>";
			html +="</div>";
			html +="<div class='info_historia col-xs-12 "+resultado.historia[i].categoria+"'>";
			html +="<div class='frente info col-xs-5'>";
			html +="<div id='estado_historia' class='col-xs-2'></div>";
			html +="<h5>Historia en curso</h5>";
			html +="</div>";
			html +="<div class='col-xs-2'></div>";
			html +="<div class='frente info col-xs-5'>";
			html +="<h5>tiempo restante: "+resultado.historia[i].tiempo+"</h5>";
			html +="</div>";
			html +="<div class='cont_info col-xs-12'>";
			html +="<h1>"+resultado.historia[i].titulo+", por: "+resultado.historia[i].creador+"</h1>";
			html +="<h3>"+resultado.historia[i].creador+":</h3>";
			html +="<p>"+resultado.historia[i].contenido+"</p>";
			html +="<div class='col-xs-10'></div>";
			html +="<a class='col-xs-2' href='visualizacion.php?idHistoria="+resultado.historia[i].idHistoria+"'>Ver más</a>";
			html +="</div>";
			html +="<div class='col-xs-12 clasificacion'>";
			html +="<div class='col-xs-2'></div>";
			html +="<div class='col-xs-4 tipo_historia'>";
			html +="<figure class='col-xs-4'><img src='img/cuento_icon.png' alt=''></figure>";
			html +="<h5 class='col-xs-8'>"+resultado.historia[i].tipo+"</h5> ";
			html +="</div>";
			html +="<div class='col-xs-4 genero_historia'>";
			html +=" <figure class='col-xs-4'><img src='img/comedia_icon.png' alt=''></figure>";
			html +="<h5 class='col-xs-8'>"+resultado.historia[i].categoria+"</h5> ";
			html +="</div>";
			html +="<div class='col-xs-2'></div>";
			html +="</div>";
			html +="</div>";
			html +="</article>";

			$("#todoContenido").html(html);
		}
	}
	console.log(resultado);
})
.error(function(error){
	console.log("Error: "+ error);
})
break;
case "Comedia":
$("#todoContenido").empty();

$.ajax({
	type: "GET",
	url: "includes/filtrarComedia.php",
	data: {}
})
.done(function(){
	console.log("Solicitud enviada al API");
})
.success(function(result){
	resultado = JSON.parse(result);
	html = "";
	if(!resultado.error){
		for(i=0;i<resultado.historia.length;i++){ 
			html += "<article class='row'>";
			html += "<div class='cupos col-xs-4'>";
			html +="<div class='frente info col-xs-11 "+resultado.historia[i].categoria+"'>";
			html +="<h5>"+resultado.historia[i].cupos+" cupos disponibles</h5>";
			html +="</div>";
			html +="<div class='colaborar col-xs-12 "+resultado.historia[i].categoria+"'>";
			html +="<h5 class='frente col-xs-8'>Colaborar</h5>";
			html +="<a href='includes/validarContribucion.php?idHistoria="+resultado.historia[i].idHistoria+"'><figure class='col-xs-2'><img src='img/btn_mas.png' alt=''></figure></a>";
			html +="<div class='col-xs-2'></div>";
			html +="</div>";
			html +="</div>";
			html +="<div class='col-xs-4'></div>";
			html +="<div class='img_perfil col-xs-5'>";
			html +="<figure class='"+resultado.historia[i].categoria+"'><img src='"+resultado.historia[i].imagen+"' alt=''></figure>";
			html +="</div>";
			html +="<div class='frente plumas col-xs-4 "+resultado.historia[i].categoria+"'>";
			html += "<a id='"+resultado.historia[i].idHistoria+"' class='linkHist' href='#'><figure class='col-xs-2'><img src='img/pluma_icon.png' alt=''></figure>"+resultado.historia[i].plumas+" plumas</a>";
			html +="</div>";
			html +="<div class='info_historia col-xs-12 "+resultado.historia[i].categoria+"'>";
			html +="<div class='frente info col-xs-5'>";
			html +="<div id='estado_historia' class='col-xs-2'></div>";
			html +="<h5>Historia en curso</h5>";
			html +="</div>";
			html +="<div class='col-xs-2'></div>";
			html +="<div class='frente info col-xs-5'>";
			html +="<h5>tiempo restante: "+resultado.historia[i].tiempo+"</h5>";
			html +="</div>";
			html +="<div class='cont_info col-xs-12'>";
			html +="<h1>"+resultado.historia[i].titulo+", por: "+resultado.historia[i].creador+"</h1>";
			html +="<h3>"+resultado.historia[i].creador+":</h3>";
			html +="<p>"+resultado.historia[i].contenido+"</p>";
			html +="<div class='col-xs-10'></div>";
			html +="<a class='col-xs-2' href='visualizacion.php?idHistoria="+resultado.historia[i].idHistoria+"'>Ver más</a>";
			html +="</div>";
			html +="<div class='col-xs-12 clasificacion'>";
			html +="<div class='col-xs-2'></div>";
			html +="<div class='col-xs-4 tipo_historia'>";
			html +="<figure class='col-xs-4'><img src='img/cuento_icon.png' alt=''></figure>";
			html +="<h5 class='col-xs-8'>"+resultado.historia[i].tipo+"</h5> ";
			html +="</div>";
			html +="<div class='col-xs-4 genero_historia'>";
			html +=" <figure class='col-xs-4'><img src='img/comedia_icon.png' alt=''></figure>";
			html +="<h5 class='col-xs-8'>"+resultado.historia[i].categoria+"</h5> ";
			html +="</div>";
			html +="<div class='col-xs-2'></div>";
			html +="</div>";
			html +="</div>";
			html +="</article>";

			$("#todoContenido").html(html);
		}
	}
	console.log(resultado);
})
.error(function(error){
	console.log("Error: "+ error);
})
break;
case "Drama":
$("#todoContenido").empty();

$.ajax({
	type: "GET",
	url: "includes/filtrarDrama.php",
	data: {}
})
.done(function(){
	console.log("Solicitud enviada al API");
})
.success(function(result){
	resultado = JSON.parse(result);
	html = "";
	if(!resultado.error){
		for(i=0;i<resultado.historia.length;i++){ 
			html += "<article class='row'>";
			html += "<div class='cupos col-xs-4'>";
			html +="<div class='frente info col-xs-11 "+resultado.historia[i].categoria+"'>";
			html +="<h5>"+resultado.historia[i].cupos+" cupos disponibles</h5>";
			html +="</div>";
			html +="<div class='colaborar col-xs-12 "+resultado.historia[i].categoria+"'>";
			html +="<h5 class='frente col-xs-8'>Colaborar</h5>";
			html +="<a href='includes/validarContribucion.php?idHistoria="+resultado.historia[i].idHistoria+"'><figure class='col-xs-2'><img src='img/btn_mas.png' alt=''></figure></a>";
			html +="<div class='col-xs-2'></div>";
			html +="</div>";
			html +="</div>";
			html +="<div class='col-xs-4'></div>";
			html +="<div class='img_perfil col-xs-5'>";
			html +="<figure class='"+resultado.historia[i].categoria+"'><img src='"+resultado.historia[i].imagen+"' alt=''></figure>";
			html +="</div>";
			html +="<div class='frente plumas col-xs-4 "+resultado.historia[i].categoria+"'>";
			html += "<a id='"+resultado.historia[i].idHistoria+"' class='linkHist' href='#'><figure class='col-xs-2'><img src='img/pluma_icon.png' alt=''></figure>"+resultado.historia[i].plumas+" plumas</a>";
			html +="</div>";
			html +="<div class='info_historia col-xs-12 "+resultado.historia[i].categoria+"'>";
			html +="<div class='frente info col-xs-5'>";
			html +="<div id='estado_historia' class='col-xs-2'></div>";
			html +="<h5>Historia en curso</h5>";
			html +="</div>";
			html +="<div class='col-xs-2'></div>";
			html +="<div class='frente info col-xs-5'>";
			html +="<h5>tiempo restante: "+resultado.historia[i].tiempo+"</h5>";
			html +="</div>";
			html +="<div class='cont_info col-xs-12'>";
			html +="<h1>"+resultado.historia[i].titulo+", por: "+resultado.historia[i].creador+"</h1>";
			html +="<h3>"+resultado.historia[i].creador+":</h3>";
			html +="<p>"+resultado.historia[i].contenido+"</p>";
			html +="<div class='col-xs-10'></div>";
			html +="<a class='col-xs-2' href='visualizacion.php?idHistoria="+resultado.historia[i].idHistoria+"'>Ver más</a>";
			html +="</div>";
			html +="<div class='col-xs-12 clasificacion'>";
			html +="<div class='col-xs-2'></div>";
			html +="<div class='col-xs-4 tipo_historia'>";
			html +="<figure class='col-xs-4'><img src='img/cuento_icon.png' alt=''></figure>";
			html +="<h5 class='col-xs-8'>"+resultado.historia[i].tipo+"</h5> ";
			html +="</div>";
			html +="<div class='col-xs-4 genero_historia'>";
			html +=" <figure class='col-xs-4'><img src='img/comedia_icon.png' alt=''></figure>";
			html +="<h5 class='col-xs-8'>"+resultado.historia[i].categoria+"</h5> ";
			html +="</div>";
			html +="<div class='col-xs-2'></div>";
			html +="</div>";
			html +="</div>";
			html +="</article>";

			$("#todoContenido").html(html);
		}
	}
	console.log(resultado);
})
.error(function(error){
	console.log("Error: "+ error);
})
break;
case "Fantasia":
$("#todoContenido").empty();

$.ajax({
	type: "GET",
	url: "includes/filtrarFantasia.php",
	data: {}
})
.done(function(){
	console.log("Solicitud enviada al API");
})
.success(function(result){
	resultado = JSON.parse(result);
	html = "";
	if(!resultado.error){
		for(i=0;i<resultado.historia.length;i++){ 
			html += "<article class='row'>";
			html += "<div class='cupos col-xs-4'>";
			html +="<div class='frente info col-xs-11 "+resultado.historia[i].categoria+"'>";
			html +="<h5>"+resultado.historia[i].cupos+" cupos disponibles</h5>";
			html +="</div>";
			html +="<div class='colaborar col-xs-12 "+resultado.historia[i].categoria+"'>";
			html +="<h5 class='frente col-xs-8'>Colaborar</h5>";
			html +="<a href='includes/validarContribucion.php?idHistoria="+resultado.historia[i].idHistoria+"'><figure class='col-xs-2'><img src='img/btn_mas.png' alt=''></figure></a>";
			html +="<div class='col-xs-2'></div>";
			html +="</div>";
			html +="</div>";
			html +="<div class='col-xs-4'></div>";
			html +="<div class='img_perfil col-xs-5'>";
			html +="<figure class='"+resultado.historia[i].categoria+"'><img src='"+resultado.historia[i].imagen+"' alt=''></figure>";
			html +="</div>";
			html +="<div class='frente plumas col-xs-4 "+resultado.historia[i].categoria+"'>";
			html += "<a id='"+resultado.historia[i].idHistoria+"' class='linkHist' href='#'><figure class='col-xs-2'><img src='img/pluma_icon.png' alt=''></figure>"+resultado.historia[i].plumas+" plumas</a>";
			html +="</div>";
			html +="<div class='info_historia col-xs-12 "+resultado.historia[i].categoria+"'>";
			html +="<div class='frente info col-xs-5'>";
			html +="<div id='estado_historia' class='col-xs-2'></div>";
			html +="<h5>Historia en curso</h5>";
			html +="</div>";
			html +="<div class='col-xs-2'></div>";
			html +="<div class='frente info col-xs-5'>";
			html +="<h5>tiempo restante: "+resultado.historia[i].tiempo+"</h5>";
			html +="</div>";
			html +="<div class='cont_info col-xs-12'>";
			html +="<h1>"+resultado.historia[i].titulo+", por: "+resultado.historia[i].creador+"</h1>";
			html +="<h3>"+resultado.historia[i].creador+":</h3>";
			html +="<p>"+resultado.historia[i].contenido+"</p>";
			html +="<div class='col-xs-10'></div>";
			html +="<a class='col-xs-2' href='visualizacion.php?idHistoria="+resultado.historia[i].idHistoria+"'>Ver más</a>";
			html +="</div>";
			html +="<div class='col-xs-12 clasificacion'>";
			html +="<div class='col-xs-2'></div>";
			html +="<div class='col-xs-4 tipo_historia'>";
			html +="<figure class='col-xs-4'><img src='img/cuento_icon.png' alt=''></figure>";
			html +="<h5 class='col-xs-8'>"+resultado.historia[i].tipo+"</h5> ";
			html +="</div>";
			html +="<div class='col-xs-4 genero_historia'>";
			html +=" <figure class='col-xs-4'><img src='img/comedia_icon.png' alt=''></figure>";
			html +="<h5 class='col-xs-8'>"+resultado.historia[i].categoria+"</h5> ";
			html +="</div>";
			html +="<div class='col-xs-2'></div>";
			html +="</div>";
			html +="</div>";
			html +="</article>";

			$("#todoContenido").html(html);
		}
	}
	console.log(resultado);
})
.error(function(error){
	console.log("Error: "+ error);
})
break;
case "Horror":
$("#todoContenido").empty();

$.ajax({
	type: "GET",
	url: "includes/filtrarHorror.php",
	data: {}
})
.done(function(){
	console.log("Solicitud enviada al API");
})
.success(function(result){
	resultado = JSON.parse(result);
	html = "";
	if(!resultado.error){
		for(i=0;i<resultado.historia.length;i++){ 
			html += "<article class='row'>";
			html += "<div class='cupos col-xs-4'>";
			html +="<div class='frente info col-xs-11 "+resultado.historia[i].categoria+"'>";
			html +="<h5>"+resultado.historia[i].cupos+" cupos disponibles</h5>";
			html +="</div>";
			html +="<div class='colaborar col-xs-12 "+resultado.historia[i].categoria+"'>";
			html +="<h5 class='frente col-xs-8'>Colaborar</h5>";
			html +="<a href='includes/validarContribucion.php?idHistoria="+resultado.historia[i].idHistoria+"'><figure class='col-xs-2'><img src='img/btn_mas.png' alt=''></figure></a>";
			html +="<div class='col-xs-2'></div>";
			html +="</div>";
			html +="</div>";
			html +="<div class='col-xs-4'></div>";
			html +="<div class='img_perfil col-xs-5'>";
			html +="<figure class='"+resultado.historia[i].categoria+"'><img src='"+resultado.historia[i].imagen+"' alt=''></figure>";
			html +="</div>";
			html +="<div class='frente plumas col-xs-4 "+resultado.historia[i].categoria+"'>";
			html += "<a id='"+resultado.historia[i].idHistoria+"' class='linkHist' href='#'><figure class='col-xs-2'><img src='img/pluma_icon.png' alt=''></figure>"+resultado.historia[i].plumas+" plumas</a>";
			html +="</div>";
			html +="<div class='info_historia col-xs-12 "+resultado.historia[i].categoria+"'>";
			html +="<div class='frente info col-xs-5'>";
			html +="<div id='estado_historia' class='col-xs-2'></div>";
			html +="<h5>Historia en curso</h5>";
			html +="</div>";
			html +="<div class='col-xs-2'></div>";
			html +="<div class='frente info col-xs-5'>";
			html +="<h5>tiempo restante: "+resultado.historia[i].tiempo+"</h5>";
			html +="</div>";
			html +="<div class='cont_info col-xs-12'>";
			html +="<h1>"+resultado.historia[i].titulo+", por: "+resultado.historia[i].creador+"</h1>";
			html +="<h3>"+resultado.historia[i].creador+":</h3>";
			html +="<p>"+resultado.historia[i].contenido+"</p>";
			html +="<div class='col-xs-10'></div>";
			html +="<a class='col-xs-2' href='visualizacion.php?idHistoria="+resultado.historia[i].idHistoria+"'>Ver más</a>";
			html +="</div>";
			html +="<div class='col-xs-12 clasificacion'>";
			html +="<div class='col-xs-2'></div>";
			html +="<div class='col-xs-4 tipo_historia'>";
			html +="<figure class='col-xs-4'><img src='img/cuento_icon.png' alt=''></figure>";
			html +="<h5 class='col-xs-8'>"+resultado.historia[i].tipo+"</h5> ";
			html +="</div>";
			html +="<div class='col-xs-4 genero_historia'>";
			html +=" <figure class='col-xs-4'><img src='img/comedia_icon.png' alt=''></figure>";
			html +="<h5 class='col-xs-8'>"+resultado.historia[i].categoria+"</h5> ";
			html +="</div>";
			html +="<div class='col-xs-2'></div>";
			html +="</div>";
			html +="</div>";
			html +="</article>";

			$("#todoContenido").html(html);
		}
	}
	console.log(resultado);
})
.error(function(error){
	console.log("Error: "+ error);
})
break;
case "Improvisar":
$("#todoContenido").empty();

$.ajax({
	type: "GET",
	url: "includes/filtrarImprovisar.php",
	data: {}
})
.done(function(){
	console.log("Solicitud enviada al API");
})
.success(function(result){
	resultado = JSON.parse(result);
	html = "";
	if(!resultado.error){
		for(i=0;i<resultado.historia.length;i++){ 
			html += "<article class='row'>";
			html += "<div class='cupos col-xs-4'>";
			html +="<div class='frente info col-xs-11 "+resultado.historia[i].categoria+"'>";
			html +="<h5>"+resultado.historia[i].cupos+" cupos disponibles</h5>";
			html +="</div>";
			html +="<div class='colaborar col-xs-12 "+resultado.historia[i].categoria+"'>";
			html +="<h5 class='frente col-xs-8'>Colaborar</h5>";
			html +="<a href='includes/validarContribucion.php?idHistoria="+resultado.historia[i].idHistoria+"'><figure class='col-xs-2'><img src='img/btn_mas.png' alt=''></figure></a>";
			html +="<div class='col-xs-2'></div>";
			html +="</div>";
			html +="</div>";
			html +="<div class='col-xs-4'></div>";
			html +="<div class='img_perfil col-xs-5'>";
			html +="<figure class='"+resultado.historia[i].categoria+"'><img src='"+resultado.historia[i].imagen+"' alt=''></figure>";
			html +="</div>";
			html +="<div class='frente plumas col-xs-4 "+resultado.historia[i].categoria+"'>";
			html += "<a id='"+resultado.historia[i].idHistoria+"' class='linkHist' href='#'><figure class='col-xs-2'><img src='img/pluma_icon.png' alt=''></figure>"+resultado.historia[i].plumas+" plumas</a>";
			html +="</div>";
			html +="<div class='info_historia col-xs-12 "+resultado.historia[i].categoria+"'>";
			html +="<div class='frente info col-xs-5'>";
			html +="<div id='estado_historia' class='col-xs-2'></div>";
			html +="<h5>Historia en curso</h5>";
			html +="</div>";
			html +="<div class='col-xs-2'></div>";
			html +="<div class='frente info col-xs-5'>";
			html +="<h5>tiempo restante: "+resultado.historia[i].tiempo+"</h5>";
			html +="</div>";
			html +="<div class='cont_info col-xs-12'>";
			html +="<h1>"+resultado.historia[i].titulo+", por: "+resultado.historia[i].creador+"</h1>";
			html +="<h3>"+resultado.historia[i].creador+":</h3>";
			html +="<p>"+resultado.historia[i].contenido+"</p>";
			html +="<div class='col-xs-10'></div>";
			html +="<a class='col-xs-2' href='visualizacion.php?idHistoria="+resultado.historia[i].idHistoria+"'>Ver más</a>";
			html +="</div>";
			html +="<div class='col-xs-12 clasificacion'>";
			html +="<div class='col-xs-2'></div>";
			html +="<div class='col-xs-4 tipo_historia'>";
			html +="<figure class='col-xs-4'><img src='img/cuento_icon.png' alt=''></figure>";
			html +="<h5 class='col-xs-8'>"+resultado.historia[i].tipo+"</h5> ";
			html +="</div>";
			html +="<div class='col-xs-4 genero_historia'>";
			html +=" <figure class='col-xs-4'><img src='img/comedia_icon.png' alt=''></figure>";
			html +="<h5 class='col-xs-8'>"+resultado.historia[i].categoria+"</h5> ";
			html +="</div>";
			html +="<div class='col-xs-2'></div>";
			html +="</div>";
			html +="</div>";
			html +="</article>";

			$("#todoContenido").html(html);
		}
	}
	console.log(resultado);
})
.error(function(error){
	console.log("Error: "+ error);
})
break;
}
})


$( ".linkHist" ).click(function( event ) {
	var idHis=this.getAttribute("data-plumaID");
	event.preventDefault();
	$.ajax({
		type: "POST",
		url: "includes/agregarPluma.php",
		data: { idHistoria: idHis}
	}).done(function(){
		console.log("Solicitud enviada al API");
	}).success(function(result){
		console.log("Resultado: "+result);
		location.reload(false);
	}).error(function(error){
		console.log("Error: "+ error);
			//
		})
});

$( ".linkCol" ).click(function( event ) {
	var idHis=this.getAttribute("data-colaboracionID");
	console.log(idHis);
	event.preventDefault();
	$.ajax({
		type: "POST",
		url: "includes/validarContribucion.php",
		data: { idHistoria: idHis}
	}).done(function(){
		console.log("Solicitud enviada al API");
	}).success(function(result){
		console.log("Resultado: "+result);
		var concaCon=JSON.parse(result);
		console.log("Resultado: "+concaCon.error);
		if(concaCon.error=="false"){
			alert("Tu solicitud sigue sin ser aprobada");
		}else{
			console.log("PUTA VIDA");
			alert("Has enviado una solicitud para colaborar en esta historia, se te notificará cuando el creador haya aceptado tu solicitud");
		}
	}).error(function(error){
		console.log("Error: "+ error);
			//
		})
});

$( "#dejarComent" ).submit(function( event ) {
	console.log("FUNCAComent");
	var idHis=$("#idHistoriaActual").val();
	var cont=$("#contenidoCom").val();
	event.preventDefault();
	$.ajax({
		type: "POST",
		url: "includes/agregarComentario.php",
		data: { idHistoriaActual: idHis, contenidoCom: cont }
	}).done(function(){
		console.log("Solicitud enviada al API");
	}).success(function(result){
		console.log("Resultado: "+result);
		location.reload(false);
	}).error(function(error){
		console.log("Error: "+ error);
			//
		})
});


$( "#crearHist" ).submit(function( event ) {
	console.log("FUNCREAR");
	var tituloCrear=$("#tituloCrear").val();
	var tipoCrear=$("#tipoCrear").val();
	var generoCrear=$("#generoCrear").val();
	var contenidoCrear=$("#contenidoCrear").val();
	event.preventDefault();
	$.ajax({
		type: "POST",
		url: "includes/crearHistoria.php",
		data: { titulo: tituloCrear, tipo: tipoCrear, genero:generoCrear, contenido:contenidoCrear }
	}).done(function(){
		console.log("Solicitud enviada al API");
	}).success(function(result){
		console.log("Resultado: "+result);
		alert("Has creado una historia, puedes verla en el menú principal");
		window.location.replace("home.php");

	}).error(function(error){
		console.log("Error: "+ error);

	})
});
$("#notificacion" ).click(function( event ) {
	console.log("FuncionNotificacion");
	event.preventDefault();
	$(".popUpNotificacion").show();
	$.ajax({
		type: "GET",
		url: "includes/NotificarAprobacion.php",
		data: {}
	}).done(function(){
		console.log("Solicitud enviada al API");
		//window.location.replace("includes/NotificarAprobacion.php");
	}).success(function(result){
		console.log("Wiiiiiiiiiiiiiiiii");
		resultado = JSON.parse(result);
		console.log("vivoo");
		html="";
		if(!resultado.error){
			//$(".contenedorNotif").empty();
			for(i=0;i<resultado.temp.length;i++){
				console.log(resultado.temp[i].idUsuario);
				html+="<div class='notifSolicitudAprovada'><p> El usuario "+resultado.temp[i].idUsuario+" ha aceptado tu participacion en la historia "+resultado.temp[i].idHistoria+"</p></div>";
			}
			console.log(html);
			$(".contenedorNotif").html(html);
		}
	}).error(function(error){
		console.log("Error: "+ error);
			//
		})
});

	//Codigo consultado en StackOverflow para ocultar al dar click fuera de el
	$(document).mouseup(function (e){
		var container = $(".popUpNotificacion");
  	  if (!container.is(e.target) // if the target of the click isn't the container...
  	      && container.has(e.target).length === 0) // ... nor a descendant of the container
  	  {
  	  	container.hide();
  	  }
  	});

	window.setInterval(function(){
		$.ajax({
			type: "POST",
			url: "includes/restarTiempo.php",
		}).done(function(){
			console.log("Solicitud enviada al API");
		}).success(function(result){
			console.log("Resultado: "+result);
			location.reload(false);
		}).error(function(error){
			console.log("Error: "+ error);
			//
		})
	},60000);


});

