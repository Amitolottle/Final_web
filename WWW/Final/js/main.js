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

