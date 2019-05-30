<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';


class C_Prueba extends REST_Controller {

    
    // Construct
    public function __construct()
    {
        parent::__construct();
    }

    function index_get()
    {
        //$data = $this->response('asdfa');
        //$data = json_decode('');
       // echo $data;
        $user = json_decode(
            file_get_contents('http://192.168.1.2/CodeIgniter-3.1.10/index.php/api/')
        );
        echo '<pre>';
        echo print_r($user);
        echo '</pre>';
    }

    function animal_post()
    {
        $data = array(
            'marcaAutomovil' => 'Ford',
            'modeloAutomovil' => 'asdsa',
            'patenteAutomovil' => 'ASD815'
         );
       // $this-> response('http://192.168.1.2/CodeIgniter-3.1.10/index.php/api/agregarAutomovil/'+$data);
    }
    
}

?>