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
				window.location.replace("index.php");
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
		console.log("ID Historia: "+this.id);
		var idHis=this.id;
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
	
});

