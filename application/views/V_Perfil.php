
<div class="container my-3">
	<div class="row">
		<div class="col">
			<div class="card cartaPerfil">
				<div class="card-body">
					<div class="row">	
                        <!-- Div que contiene la imagen -->					
						<div class="col-6">
                        <center>
                        <?php if($usuario->imagenes != false): ?>
                            <script>
                            //--------> Esta variable tiene los paths para usar en el carrusel
                                var imagenes = JSON.parse('<?= json_encode($imagenes) ?>');   
                                console.log('Bueno esto es: ' + imagenes);
                                var index = 0; //---> indice que va a ir cambiando depende cambie el carrusel
                            </script>
                            <div id="imagenCasa">
                                <img class="card-img-top imgCasa" src="/AdoptaM/assets/img/<?= $usuario->imagenes[0]->path ?>" alt="Imagen">
                            </div>
                            <div>
                                <button type="button" class="btn btn-dark btn-small mt-2" id="previous" ><i class="fas fa-chevron-left" > </i></button>
                                <button type="button" class="btn btn-dark btn-small mt-2" id="upload" data-toogle="modal" data-target="#modalImagen" ><i class="fas fa-folder-plus"></i> Añadir imagen</button>
                                <button type="button" class="btn btn-dark btn-small mt-2" id="next" ><i class="fas fa-chevron-right"></i></button>
                            </div>
                        <?php else: ?>
                            <img class="card-img-top imgCasa border border-secondary" src="/AdoptaM/assets/img/mas.png" alt="Añada una imagen de su residencia">
                            <button type="button" class="btn btn-dark btn-small mt-2" id="upload" data-toogle="modal" data-target="#modalImagen" ><i class="fas fa-folder-plus"></i> Añadir imagen</button>
                        <?php endif ?>
                        </center>
                        </div>
                        <!-- Div que contiene el formulario -->
						<div class="col-6">				
							<h3 class="card-title tituloLogin"><i class="fas fa-user-edit"></i> Editar información </h3>
							<div class="signup-form-container">
                                <!-- form start -->
                                <form class="form bootstrap-form needs-validation"  novalidate role="form" id="register-form" autocomplete="off">
                                    <div class="form-header">
                                        <!-- form header -->
                                        <div id="info"></div>   <!-- Este div se muestra -->
                                    </div>
                                    <div class="form-body">
                                        <div class="form-group mb-0" >
                                            <label for="usuario"> Nombre</label><input id="nombre" class="form-group mx-4" type="text" value="<?= $usuario->nombre_usuario ?>"  > 
                                            <div class="valid-feedback mx-2 col" id="nomV" ></div> 
                                        </div> 
                                        <div class="form-group mb-0" >
                                            <label for="usuario"> Apellido</label><input id="apellido" class="form-group mx-4" type="text" value="<?= $usuario->apellido_usuario ?>"  >  
                                            <div class="valid-feedback mx-2 col " id="apeV" ></div>
                                        </div> 
                                        <div class="form-group mb-0" >
                                            <label for="usuario"> Telefono</label><input id="telefono" class="form-group mx-4" type="text" value="<?= $usuario->telefono_usuario ?>"  >  
                                            <div class="valid-feedback mx-2 col" id="telefonoValido" ></div>
                                        </div> 
                                        <div class="form-group mb-0" >
                                            <label for="usuario"> DNI    </label><input id="dni" class="form-group mx-5" type="number" value="<?= $usuario->dni_usuario ?>" readonly >  
                                        </div> 
                                        <div class="form-group mb-0" >
                                            <label for="usuario"> Email</label><input id="email" class="form-group mx-4" type="email" value="<?= $usuario->email_usuario ?>" >  
                                            <div class="valid-feedback mx-2 col" id="emailV" ></div>
                                        </div> 
                                        <div class="form-group mb-0" >
                                            <label for="usuario"> Domicilio</label><input id="domicilio" class="form-group mx-4" type="text" value="<?= $usuario->domicilio_usuario ?>"  >  
                                            <div class="valid-feedback mx-2 col" id="dirV" ></div>
                                        </div>                    
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


<!-- Modal para añadir imagen -->
<div class="modal fade" id="modalImagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal"><i class="fas fa-upload" ></i> Elija una imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label > Por favor seleccione una imagen de su domicilio...</label>
        <input type="file" id="inputImagen">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="subirImagen" >Subir Imagen</button>
      </div>
    </div>
  </div>
</div>


<!-- Script para editar y validar la edicion -->
<script>

$( document ).ready(function() {
    console.log( "ready!" );
 
    /*     VALIDACIONES    */

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

    /*     OBTIENE DATOS DEL FORMULARIO   */

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


    //-------<  Funcion para mover el carrusel de imagenes >-----------------//
    function inicializarCarrusel() {
        console.log('inicializar carrusel');
        $.ajax({
                    url: "<?= base_url('C_Perfil/userImages') ?>",     // The URL for the request
                    data: {              // The data to send (will be converted to a query string)
                        
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
                        var arr = JSON.parse(data);  
                        console.log(arr);
                    }
                    })
                    // Code to run if the request succeeds (is done);
                    // The response is passed to the function
                    .done(function( json ) {    
                        // si todo anda bien
                        console.log( "The request is good! "+ json );
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
    }


    //----< Accion on clikc del boton para guardar cambios   >--------//
    $("#btnGuardarCambios").off().click(function(event) {
        event.preventDefault();
        obtieneDatos();
    });

    //---------<  Accion boton subir imagen  >---------------//
    $('#upload').off().click(function (e) { 
        e.preventDefault();
        console.log('Bueno amiguitos');
        $('#modalImagen').modal('show');
    }); 

    //-------< Accion boton previous  >------------------------------//
    $('#previous').off().click(function (e) { 
        e.preventDefault();
        if (index != 0) {
            index--;   //---> le decremento porque no es cero
        } else {
            index = imagenes.length -1;   //---> es cero por eso le seteo la ultima posicion para que de la vuelta al array
        }
        $('#imagenCasa').html('<img class="card-img-top imgCasa" src="/AdoptaM/assets/img/'+imagenes[index]+'" alt="Imagen">');
    });


    //-------< Accion boton next  >------------------------------//
    $('#next').off().click(function (e) { 
        e.preventDefault();
        if (index != imagenes.length -1) {  
            index++;  //---> le incremento el indice porque no llego al ultimo del array
        } else {
            index = 0;  //---> llego a la ultima posicion entonces lo seteo a 0 para que arranque de vuelta la rueda
        }
        $('#imagenCasa').html('<img class="card-img-top imgCasa" src="/AdoptaM/assets/img/'+imagenes[index]+'" alt="Imagen">');
    });


    //-------< Accion onClick boton SubirImagen >-------------//
    $("#subirImagen").off().click(function (e) { 
        e.preventDefault();
        var data = $('#inputImagen').val();
        console.log(" Esto es lo que guarda eso: "+data);
        $('#modalImagen').modal('hide');
    });




});

    

</script>

