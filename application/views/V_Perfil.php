
<div class="container my-5">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div class="row">						
						<div class="col-3">
                        <?php if(sizeof($usuario->imagenes) > 0): ?>
							<img class="card-img-top" src="/AdoptaM/assets/img/<?= $usuario->imagenes[0]->path ?>" alt="Imagen">
                        <?php else: ?>
                            <img class="card-img-top" src="/AdoptaM/assets/img/añadirImagen" alt="Añada una imagen de su residencia">
                        <?php endif ?>
                        </div>
						<div class="col-9">				
							<h4 class="card-title"><?= $usuario->nombre_usuario." ".$usuario->apellido_usuario ?></h4>
							<div class="signup-form-container">
                                <!-- form start -->
                                <form role="form" id="register-form" autocomplete="off">
                                    <div class="form-header">
                                    <!-- form header -->
                                        <h3><i class="fas fa-user-edit"></i> Editar información </h3>      
                                    </div>
                                    <div class="form-body">
                                        <div class="form-group" >
                                            <label for="usuario"> Nombre</label><input class="form-group mx-4" type="text" value="<?= $usuario->nombre_usuario ?>" >  
                                        </div> 
                                        <div class="form-group" >
                                            <label for="usuario"> Apellido</label><input class="form-group mx-4" type="text" value="<?= $usuario->apellido_usuario ?>" >  
                                        </div> 
                                        <div class="form-group" >
                                            <label for="usuario"> Telefono</label><input class="form-group mx-4" type="text" value="<?= $usuario->telefono_usuario ?>" >  
                                        </div> 
                                        <div class="form-group" >
                                            <label for="usuario"> DNI    </label><input class="form-group mx-4" type="number" value="<?= $usuario->dni_usuario ?>" readonly >  
                                        </div> 
                                        <div class="form-group" >
                                            <label for="usuario"> Email</label><input class="form-group mx-4" type="email" value="<?= $usuario->email_usuario ?>" >  
                                        </div> 
                                        <div class="form-group" >
                                            <label for="usuario"> Domicilio</label><input class="form-group mx-4" type="text" value="<?= $usuario->domicilio_usuario ?>" >  
                                        </div>                    
                                    </div>
                                    <div class="form-footer">
                                    </div>
                                </form>  
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>