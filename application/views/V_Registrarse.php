<div class="container my-5">
	<div class="row">
		<div class="col"></div>
		<div class="col">
			
		<!--	<form method="post" action=" /* base_url('C_InicioSesion/registrarse') */">
                <div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre..." required="required" >
				</div>
                <div class="form-group">
					<label for="apellido">Apellido</label>
					<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su apellido..." required="required" >
				</div>
                <div class="form-group">
					<label for="nombre">DNI</label>
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre..." required="required" >
				</div>
                <div class="form-group">
					<label for="telefono">Teléfono/Celular:</label>
					<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su teléfono o celular..." >
				</div>
                <div class="form-group">
					<label for="domicilio">Domicilio</label>
					<input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Ingrese su domicilio..." required="required" >
				</div>
				<div class="form-group">
					<label for="usuario">Email</label>
					<input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="Ingrese su dirección de correo electrónico..." required="required" >
				</div>
				<div class="form-group">
					<label for="contraseña">Contraseña</label>
					<input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese una contraseña..." required="required" >
				</div>
                <center><button type="submit" class="btn btn-primary">Registrarse</button></center>	
			</form>   -->

            <form class="form bootstrap-form needs-validation"  novalidate >
					<div class="form-group">
                        <input required type="text" class="form-control mx-2" name="dni" id="dni" placeholder="Ingrese su DNI..." maxlength="8" onchange="validoDni();" >
                        <div class="valid-feedback mx-2" id="dniValido"></div>
					</div>
					<div class="form-group row">
                        <div class="form-group col" >
                            <input required type="text" class="form-control mx-2" name="nombre" id="nombre" placeholder="Ingrese su nombre..." data-error="Ingrese el nombre correctamente!" onchange="validoNombre();">
                            <div class="valid-feedback mx-2 col" id="nomV" ></div>
                        </div>
					</div>
					<div class="form-group">
						<input required type="text" class="form-control mx-2" name="apellido" id="apellido" placeholder="Ingrese su apellido..." onchange="validoApellido();">
                        <div class="valid-feedback mx-2" id="apeV"></div>
                    </div>
					<div class="form-group">
						<input type="text" class="form-control mx-2" name="telefono" id="telefono" placeholder="Ingrese teléfono o celular..." maxlength="25" onchange="validoTelefono();">
						<div class="valid-feedback mx-2" id="telefonoValido"></div>
					</div>
					<div class="form-group">
						<input required type="email" class="form-control mx-2" name="email" id="email" placeholder="Ingrese su email..." onchange="validoEmail();">
						<div class="valid-feedback mx-2" id="emailV"></div>
					</div>
                    <div class="form-group">
						<input required type="password" class="form-control mx-2" name="contraseña" id="contraseña" placeholder="Ingrese una contraseña..." onchange="">
						<div class="valid-feedback mx-2" id="passV"></div>
					</div>
					<div class="row">
                        <div class="col">
                          <input required type="text" class="form-control " name="direccionAdoptante" id="direccionAdoptante" placeholder="Dirección del adoptante..." onchange="validoDireccion();">
                          <div class="valid-feedback mx-2" id="dirV"></div>
                        </div>
                        <div class="col">
                            <input required type="text" class="form-control " name="alturaDireccion" id="alturaDireccion"  maxlength="4" placeholder="altura de la dirección" onchange="validoAltura();">
                            <div class="valid-feedback mx-2" id="altV"></div>
                        </div>
                    </div>
                    <div class="form-group">
                    <center>
                        <button type="submit" class="btn btn-primary mx-2">Iniciar Sesión</button>
                    </center>
                    </div>
				</form>
            
			
			</div>
		<div class="col"></div>
	</div>
</div>




<!-- Script para validacion de formulario Regestrar --> 
<script>

    //----> valida que la direccion no sea numero y que la altura no sea nula
    function validoDireccion() {
        var direccion = $('#direccionAdoptante').val();
        if( /^[0-9a-zA-Z]+$/.test(direccion) && isNaN(direccion) ){
            console.log("direccion correcta");
            $('#dirV').html('Dirección válida');
            return true;
        } else {
            console.log("Ingrese correctamente la direccion o la altura");
            $('#dirV').html('Dirección inválida!');
            return false;
        }
    }
    
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
    }
    
    //-----> valida la existencia del dni 
    function validoDni() {
        var dni = $('#dni').val();
        console.log(" Entro a validoDNI() con el dni ---> "+dni);
        var valido = false;
        if (dni > 1000000 && dni< 99999999 && /^[0-9]+$/.test(dni)){
            console.log("el dni es valido man");
        } else {
            $('#dniValido').html('El DNI es inválido');
            console.log("el dni es invalido");
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
            $('#telefonoValido').html('El teléfono/celular es inválido!');
            return false;
        }
    }
    
    
</script>