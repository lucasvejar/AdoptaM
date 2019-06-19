<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

   function checkLoginState() {
		FB.getLoginStatus(function(response) {
			statusChangeCallback(response);
			var url = '<?= base_url('C_Inicio') ?>'
			window.location = url;
		});
	}

</script>


<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.3&appId=1103539123165940&autoLogAppEvents=1"></script>

<!-- Comienzo del contenido de la vista login --> 
	<div class="container my-5 mx-auto">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6 card loginCard my-5">
				<center>
				<h1 class="text-white mt-3 tituloLogin"><i class="fas fa-user"></i><b> Log in!</b></h1>
				<?php if (!$mensajeError==null): ?>
					<h4><?= $mensajeError ?></h4>
				<?php endif ?>
				<form class="form-inline my-3" method="post" action="<?= base_url('C_InicioSesion/InicioSesion') ?>">
					<div class="form-group mb-2 col-3 text-white ">
						<label class="mb-1 mr-5" for="usuario"><b>Email </b></label>
						<label class="mt-3 mr-5" for="contraseña"><b>Password </b></label>
					</div>
					<div class="form-group mb-2 col-6">
						<input type="text" class="form-control ml-5" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Ingrese su email..." required="required" >
						<input type="password" class="form-control mt-2 ml-5" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña..." required="required" >
					</div>
					<div class="posicionBoton text-white mx-auto">
						<button type="submit" class="btn btn-primary mb-1 mt-2">Iniciar Sesión</button>
						<div class="fb-login-button" data-width="" data-size="medium" data-button-type="login_with" data-auto-logout-link="true" data-use-continue-as="false"></div>
						<p><i><b>No esta registrado? </b><a href="<?= base_url('C_Registro') ?>" > Registrese aquí.</a></i></p>
					</div>
					<!-- Boton de inicio de sesion de facebook -->
					
				</form>
				</center>
			</div>
			<div class="col-3"></div>
		</div>
	</div>

