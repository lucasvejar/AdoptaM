<div class="container my-5">
	<div class="row">
		<div class="col"></div>
		<div class="col">
			<center>
			<?php if (!$mensajeError==null): ?>
				<h4><?= $mensajeError ?></h4>
			<?php endif ?>
			<form method="post" action="<?= base_url('C_InicioSesion/InicioSesion') ?>">
				<div class="form-group">
					<label for="usuario">Email</label>
					<input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Ingrese su dirección de correo electrónico..." required="required" >
				</div>
				<div class="form-group">
					<label for="contraseña">Contraseña</label>
					<input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese contraseña..." required="required" >
				</div>
				<button type="submit" class="btn btn-primary">Iniciar Sesión</button>	
			</form>
			<a href="<?= base_url('C_Registro') ?>" >No esta registrado? Registrese aquí.</a>
			</center>
			</div>
		<div class="col"></div>
	</div>
</div>
