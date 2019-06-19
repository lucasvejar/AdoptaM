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
            file_get_contents('http://192.168.1.43/rescatistaAnimales/index.php/rescatista_REST/animales/1')
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
    public function solicitarCampana_get()
    {
        $data['campañas'] = json_decode(
            file_get_contents('http://192.168.1.38/gobierno/index.php/api_campanas')
        );
       /* echo '<pre>';
        echo print_r($data['campañas']);
        echo '</pre>';  */
        $this -> load -> view('plantilla/header');
        $this -> load -> view('V_Campaña',$data);
        $this -> load -> view('plantilla/footer');
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
    function modificarAdopciones_post()
    {
        $id_adopcion = $this -> input -> post('id_adopcion');
        $estado = $this -> input -> post('estado');
        $this -> load -> model('M_Adopcion','adopcion');
        // 0 rechazado, 1 espera, 2 aceptado
        $this->adopcion->cambiarEstado($id_adopcion,$estado); 
    }


    /*
    *	Function name:
    *	Date:
    *	Input args:
    *	Output args:
    *	Description:   el metodo le da cosas a Facu para que pueda hacer el grafico de tortas
    *
    */
    function infoGobierno_get()
    {
        $this -> load -> model('M_Animal','animal');
        $this -> load -> model('M_Adopcion','adopcion');
        $totalAdoptados = $this->adopcion->totalAdoptados();
        $totalAnimles = $this->animal->totalAnimales();
        
        $data['noAdoptados'] = $totalAnimles[0]->totalAnimales - $totalAdoptados[0]->totalAdoptados;
        $data['adoptados'] = $totalAdoptados[0]->totalAdoptados;
        $this->response($data,200);
    }


}

?>