<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
class C_Perfil extends CI_Controller {
    

    // Construct
    public function __construct()
    {
        parent::__construct();
        $this -> load -> model('M_Usuario','usuario');
    }


    public function index(){
        $data['usuario'] = $this->usuario->obtenerUno($this -> session -> userdata('dni_usuario'));
        $this -> load -> view('plantilla/header');
        $this -> load -> view('V_Perfil',$data);
        $this -> load -> view('plantilla/footer');
    }

}

?>