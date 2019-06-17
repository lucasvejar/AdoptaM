<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php'; 


class C_Conexion extends REST_Controller {
    
    // Construct
    public function __construct()
    {
        parent::__construct();
    }


    /*
    *	Function name:
    *	Date:
    *	Input args:
    *	Output args:
    *	Description:   Este metodo pide los animales a el modulo Rescatista (Horacio)
    *
    */
    public function pedirAnimales_get()
    {
        $response =json_decode(
            file_get_contents('http://192.168.1.41/rescatistaAnimales/index.php/rescatista_REST/animales')
        );
        $data['animales'] = $response->listaAnimales;
        $this -> load -> view('plantilla/header');
        $this -> load -> view('V_Inicio',$data);
        $this -> load -> view('plantilla/footer');
    }


    /*
    *	Function name:
    *	Date:
    *	Input args:
    *	Output args:
    *	Description:   Es para Horacio (rescatista) le envio el adoptante para  validar la casa y todo eso
    *
    */
    public function darAdoptante_get($id)
    {
        //$idUsuario = $this->get('id_usuario');
        $this -> load -> model('M_Usuario','usuario');
        $data['adoptante'] = $this->usuario->obtenerPorID($id);
        $this->response($data['adoptante'],200);
    }

    
    /*
    *	Function name:
    *	Date:
    *	Input args:
    *	Output args:
    *	Description:   Este metodo pide las campañas a Lia (el modulo gobierno)
    *
    */
    public function solicitarCampaña_get()
    {
        $data['campañas'] = json_decode(
            file_get_contents('http://192.168.43.6/gobierno/index.php/api-campanas')
        );
        echo '<pre>';
        echo print_r($data['campañas']);
        echo '</pre>';

        /*
        PEDIR COSAS AL SERVIDOR

		$respuesta = curl_init();
	    curl_setopt($respuesta,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
	    curl_setopt($respuesta, CURLOPT_URL, "http://localhost/rescatistaAnimales/index.php/Rescatista_REST/getAdoptante/".$idAdoptante);
	    curl_exec($respuesta);
	    curl_close($respuesta);
	    */

    }


    //--- NO SIRVE
    function solicitarAdopcion_post()
    {
        $this -> load -> model('M_Animal','animal');
        $data['animales'] = $this->animal->obtenerTodos();
        $this->response($data['animales'],200);
    }


    //----> NO SIRVE
    public function enviarSolicitud_post($id_animal)
    {
        $data['id'] = $id_animal;
        $this -> load -> model('M_Adopcion','adopcion');
        if ($this->adopcion->crearAdopcion($this->session->userdata('id_usuario'),$id,'detalle loco')){
            $adopcion = $this->adopcion->obtenerUno(1);
            $this->response($adopcion,200);
        }
    }


    /*
    *	Function name:
    *	Date:
    *	Input args:
    *	Output args:
    *	Description:   le paso todas las adopciones a horacio para que las valide
    *
    */
    function mostrarAdopciones_get()
    {
        $this -> load -> model('M_Adopcion','adopcion');
        $adopciones = $this->adopcion->obtenerTodos();
        $this->response($adopciones,200);
    }


    /*
    *	Function name:
    *	Date:
    *	Input args:
    *	Output args:
    *	Description:   modifica las cosas que me manda horacio y las guardo
    *
    */
    function modificarAdopciones_get()
    {
        $id_adopcion = $this -> input -> post('id_adopcion');
        $estado = $this -> input -> post('estado');
        $this -> load -> model('M_Adopcion','adopcion');
        // 0 rechazado, 1 espera, 2 aceptado
        if ($estado == 2) {
            $this->adopcion->cambiarEstado($id_adopcion,$estado);
        } else {
            
        }    
    }


}

?>