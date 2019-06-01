
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
                                <form class="form bootstrap-form needs-validation"  novalidate role="form" id="register-form" autocomplete="off">
                                    <div class="form-header">
                                    <!-- form header -->
                                        <h3><i class="fas fa-user-edit"></i> Editar información </h3>      
                                    </div>
                                    <div class="form-body">
                                        <div class="form-group" >
                                            <label for="usuario"> Nombre</label><input id="nombre" class="form-group mx-4" type="text" value="<?= $usuario->nombre_usuario ?>"  > 
                                            <div class="valid-feedback mx-2 col" id="nomV" ></div> 
                                        </div> 
                                        <div class="form-group" >
                                            <label for="usuario"> Apellido</label><input id="apellido" class="form-group mx-4" type="text" value="<?= $usuario->apellido_usuario ?>"  >  
                                            <div class="valid-feedback mx-2 col" id="apeV" ></div>
                                        </div> 
                                        <div class="form-group" >
                                            <label for="usuario"> Telefono</label><input id="telefono" class="form-group mx-4" type="text" value="<?= $usuario->telefono_usuario ?>"  >  
                                            <div class="valid-feedback mx-2 col" id="telefonoValido" ></div>
                                        </div> 
                                        <div class="form-group" >
                                            <label for="usuario"> DNI    </label><input id="dni" class="form-group mx-4" type="number" value="<?= $usuario->dni_usuario ?>" readonly >  
                                        </div> 
                                        <div class="form-group" >
                                            <label for="usuario"> Email</label><input id="email" class="form-group mx-4" type="email" value="<?= $usuario->email_usuario ?>" >  
                                            <div class="valid-feedback mx-2 col" id="emailV" ></div>
                                        </div> 
                                        <div class="form-group" >
                                            <label for="usuario"> Domicilio</label><input id="domicilio" class="form-group mx-4" type="text" value="<?= $usuario->domicilio_usuario ?>"  >  
                                            <div class="valid-feedback mx-2 col" id="dirV" ></div>
                                        </div>                    
                                    </div>
                                    <div id="info">
                                      <!--  <div class="alert alert-info" role="alert">
                                            <i class="fas fa-edit"></i> Modifique su información personal!.
                                        </div> -->
                                    </div>
                                    <div class="form-footer">
                                        <button id="btnGuardarCambios" class="btn btn-primary">
                                            Guardar Cambios <i class="fas fa-edit"></i>
                                        </button>
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



<script>



$( document ).ready(function() {
    console.log( "ready!" );

    function validoNombre(){
        var nombre = $("#nombre").val();
        if ( /^[a-zA-Z]+$/.test(nombre) ) {
            console.log("la expresion paso por el true "+nombre);
            $('#nomV').html("Nombre válido!"); 
           return true;
        } else {
            console.log("la expresion paso por el false "+nombre);
            $('#nomV').html("Nombre inválido, ingrese solo letras");
            alert('Ingrese correctamente el nombre');
            return false;
        }
    }
    
    function validoApellido () {
        var apellido = $("#apellido").val();
        if ( /^[a-zA-Z]+$/.test(apellido) ){
            $('#apeV').html("Apellido válido!");
            console.log("apellido correcto!");
            return true;
        } else {
            $('#apeV').html("Apellido inválido, ingrese solo letras");
            alert("apellido invalido");
            return false;
        }
    }
    
    function validoEmail() {
        if ( /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/.test($('#email').val()) ){
            $('#emailV').html("E-mail válido!");
            console.log("email correcto");
            return true;
        } else {
            $('#emailV').html("E-mail inválido!");
            alert('Ingrese correctamente el email');
            return false;
        }
    }
    
    
    function validoTelefono() {
        if ( /^[0-9-()+]{3,20}/.test($('#telefono').val()) ){
            $('#telefonoValido').html('El teléfono/celular es válido!');
            console.log("el telefono esta bien bro");
            return true;
        } else {
            alert('Ingrese correctamente el telefono o celular');
            $('#telefonoValido').html('El teléfono/celular es inválido!');
            return false;
        }
    }


    function armarRegistro() {
        registro = {
            dni: $("#dni").val(),
            nombre: $('#nombre').val(),
            apellido: $('#apellido').val(),
            telefono: $('#telefono').val(),
            email: $('#email').val(),
            domicilio: $('#domicilio').val()
        }
        //console.log(registro);
        return registro;
    }

    function obtieneDatos() {
        console.log("algo paso por aca");
        if (validoApellido() && validoEmail() && validoNombre() && validoTelefono()) {
            var registro = armarRegistro();
            $.ajax({
                    url: "<?= base_url('C_Perfil/guardarEdicion') ?>",     // The URL for the request
                    data: {              // The data to send (will be converted to a query string)
                        dni: registro.dni,
                        nombre: registro.nombre,
                        apellido: registro.apellido,
                        email: registro.email,
                        telefono: registro.telefono,
                        domicilio: registro.domicilio
                    },
                    async: false,
                    type: "POST",         // Whether this is a POST or GET request
                    'beforeSend': function (data)
                    {
                        console.log('... cargando...');
                    },
                    'error': function (data) {
                        //si hay un error mostramos un mensaje
                        console.log('Tenemos problemas Houston ' + data);
                    },
                    'success': function (data) {
                        console.log(data);
                        var arr = JSON.parse(data);  
                        console.log(arr);
                    }
                    })
                    // Code to run if the request succeeds (is done);
                    // The response is passed to the function
                    .done(function( json ) {    
                        // si todo anda bien
                        console.log( "The request is good! "+ JSON.parse(json) );
                        $('#info').fadeIn();
                        if ( JSON.parse(json) == "guardado" ) {
                            $('#info').html("<div id='#alert' class='alert alert-success' role='alert'><i class='fas fa-check-circle'></i> Información modificada!.</div>");    
                            $('#info').fadeOut(4000);
                        } else {
                            $('#info').html("<div id='#alert' class='alert alert-danger' role='alert'><i class='fas fa-times-circle'></i> La información no fue modificada, hubo inconvenientes!.</div>");
                            $('#info').fadeOut(4000);
                        }
                       // $('#info').fadeIn();
                       // $('#info').html("<div id='#alert' class='alert alert-info' role='alert'><i class='fas fa-edit'></i> Modifique su información personal!.</div>");
                        
                    })
                    // Code to run if the request fails; the raw request and
                    // status codes are passed to the function
                    .fail(function( xhr, status, errorThrown ) {
                        alert( "Sorry, there was a problem!" );
                        console.log( "Error: " + errorThrown );
                        console.log( "Status: " + status );
                        console.dir( xhr );
                    })
                    // Code to run regardless of success or failure;
                    .always(function( xhr, status ) {
                        console.log( "The request is complete!" );
            });    
        } else {
            console.log("Datos erroneos!");
        }
        
    }


    //----< Accion on clikc del boton para guardar cambios   >--------//
    $("#btnGuardarCambios").off().click(function(event) {
        event.preventDefault();
        obtieneDatos();
    });
});

    

</script>

