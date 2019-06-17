
<div class="container my-5 mx-auto">
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6 card loginCard my-5">
				<center>
				<h1 class="text-white mt-3 tituloLogin"><i class="fas fa-user-plus"></i><b> Sign Up!</b></h1>
                <div id="idInfo" ></div>  <!-- Div informativo -->
				<form class="form-inline my-3" >
                    <!-- Labels de los campos del formulario -->
					<div class="form-group mb-2 col-3 text-white ">
						<label class="mb-2 mr-5 mt-2" ><b>DNI </b></label>
						<label class="mb-3 mr-5 mt-2" ><b>Nombre </b></label>
                        <label class="mb-3 mr-5 mt-2" ><b>Apellido </b></label>
                        <label class="mb-3 mr-5 mt-2" ><b>Teléfono </b></label>
                        <label class="mb-3 mr-5 mt-2" ><b>Email </b></label>
                        <label class="mb-3 mr-5 mt-2" ><b>Password </b></label>
                        <label class="mb-3 mr-5 mt-2" ><b>Dirección </b></label>
                        <label class="mr-2 "><b>Fecha Nacimiento </b></label>
					</div>
                    <!-- Inputs del formulario -->
					<div class="form-group mb-2 col-6">
                        <input required type="text" class="form-control mx-2 mb-2" name="dni" id="dni" placeholder="Ingrese su DNI..." maxlength="8"  >
                        <div class="valid-feedback mx-2" id="dniValido"></div>
                        <input required type="text" class="form-control mx-2 mb-2" name="nombre" id="nombre" placeholder="Ingrese su nombre..." data-error="Ingrese el nombre correctamente!" >
                        <div class="valid-feedback mx-2 col" id="nomV" ></div>
                        <input required type="text" class="form-control mx-2 mb-2" name="apellido" id="apellido" placeholder="Ingrese su apellido..." >
                        <div class="valid-feedback mx-2" id="apeV"></div>
						<input type="text" class="form-control mx-2 mb-2" name="telefono" id="telefono" placeholder="Ingrese teléfono o celular..." maxlength="25" >
						<div class="valid-feedback mx-2" id="telefonoValido"></div>
                        <input required type="email" class="form-control mx-2 mb-2" name="email" id="email" placeholder="Ingrese su email..." >
					    <div class="valid-feedback mx-2" id="emailV"></div>
                        <input required type="password" class="form-control mx-2 mb-2" name="contraseña" id="contraseña" placeholder="Ingrese una contraseña..." >
					    <div class="valid-feedback mx-2" id="passV"></div>
                        <input required type="text" class="form-control mx-2 mb-2" name="direccionAdoptante" id="direccionAdoptante" placeholder="Ingrese su dirección..." >
                        <div class="valid-feedback mx-2" id="dirV"></div>  
                        <input required type="date" class="form-control mx-2 mb-2" name="fechaNac" id="fechaNac" >
					</div>
                    <!-- Boton para registrarse -->
					<div class="posicionBoton text-white mx-auto">
						<button type="button" class="btn btn-primary mb-1 mt-2" id="btnRegistrar" >Registrarse</button>
						<p><i><b>Gracias por registrarse!. </b></i></p>
					</div>
				</form>
				</center>
			</div>
			<div class="col-3"></div>
		</div>
	</div>




<!-- Script para validacion de formulario Regestrar --> 
<script>

    //----> valida que la direccion no sea numero y que la altura no sea nula
    function validoDireccion() {
        var direccion = $('#direccionAdoptante').val();
       if( /^[0-9a-zA-Z]+$/.test(direccion) ){
            console.log("direccion correcta");
            $('#dirV').html('Dirección válida');
            return true;
        } else {
            console.log("Ingrese correctamente la direccion o la altura");
            $('#dirV').html('Dirección inválida!');
            return false;
        } 
    }
    
    /*
    function validoAltura () {
        var nro = $('#alturaDireccion').val();
        if ( nro > 0 && nro < 9999 && /^[0-9]+$/.test(nro) ){
            console.log("altura bien puesta");
            $('#altV').html("Altura de la dirección válida");
            return true;
        } else {
            console.log("Ingrese correctamente la direccion o la altura");
            $('#altV').html("Altura de la dirección inválida!");
            return false;
        }
    }*/
    
    //-----> valida la existencia del dni 
    function validoDni() {
        var dni = $('#dni').val();
        console.log(" Entro a validoDNI() con el dni ---> "+dni);
        var valido = false;
        if (dni > 1000000 && dni< 99999999 && /^[0-9]+$/.test(dni)){
            console.log("el dni es valido man");
            valido = true;
        } else {
            $('#dniValido').html('El DNI es inválido');
            console.log("el dni es invalido");
            alert('Dni ingresado invalido');
        }
        return valido;
    }
    
    function validoNombre(){
        var nombre = $("#nombre").val();
        if ( /^[a-zA-Z]+$/.test(nombre) ) {
            console.log("la expresion paso por el true "+nombre);
            $('#nomV').html("Nombre válido!"); 
           return true;
        } else {
            console.log("la expresion paso por el false "+nombre);
            $('#nomV').html("Nombre inválido, ingrese solo letras");
            console.log('Ingrese correctamente el nombre o apellido');
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
            console.log("apellido invalido");
            alert('Apellido invalido');
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
            console.log('Ingrese correctamente el email');
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
            console.log('Ingrese correctamente el telefono o celular');
            alert('Ingrese correctamente el telefono o celular');
            $('#telefonoValido').html('El teléfono/celular es inválido!');
            return false;
        }
    }
    
    /* funcion para saltar a otra pagina */
    function goTo(url) {
        window.location.href = url;
    }
    

$(document).ready(function () {
    console.log('ready!');

    $("#btnRegistrar").off().click(function (event){
        event.preventDefault();
        if ( validoNombre() && validoApellido() && validoDni() && validoEmail() && validoTelefono() ) {
            console.log("goinggg onnn");
            $.ajax({
                    url: "<?= base_url('C_Registro/registrarse') ?>",     // The URL for the request
                    data: {              // The data to send (will be converted to a query string)
                        dni: $('#dni').val(),
                        nombre: $('#nombre').val(),
                        apellido: $('#apellido').val(),
                        email: $('#email').val(),
                        telefono: $('#telefono').val(),
                        password: $('#contraseña').val(),
                        domicilio: $('#direccionAdoptante').val(),
                        fechaNac: $('#fechaNac').val()
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
                        console.log( "The request is good! "+ json );
                        
                        $('#idInfo').fadeIn();
                        if (JSON.parse(json) == "No añadido") {
                            $('#idInfo').html("<div id='#alert' class='alert alert-danger' role='alert'><i class='fas fa-times-circle'></i> Ya existe un usuario con sus datos!.</div>");
                            $('#idInfo').fadeOut(5000);
                        } else {
                            $('#idInfo').html("<div id='#alert' class='alert alert-success' role='alert'><i class='fas fa-check-circle'></i> Usuario registrado exitosamente!.</div>");
                            $('#idInfo').fadeOut(5000);
                            var url = '<?= base_url('C_InicioSesion') ?>';
                            setTimeout(function(){
                                var url = '<?= base_url('C_InicioSesion') ?>';
                                goTo(url);
                            }, 8000);
                        }
            
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
            console.log('Bad SHIIIT');
            return false;
        }

        
    });

});


</script>