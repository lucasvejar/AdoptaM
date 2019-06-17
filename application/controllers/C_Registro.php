<?php

defined('BASEPATH') OR exit('No direct script access allowed');
 
class C_Registro extends CI_Controller {
    

    // Construct
    public function __construct()
    {
        parent::__construct();
        $this -> load -> model('M_Usuario','usuario');
    }

    
    public function index(){
        $this -> load -> view('plantilla/header');
        $this -> load -> view('V_Registrarse');
        $this -> load -> view('plantilla/footer');
    }


    function registrarse()
	{	
		$user = array(
            'id_usuario' => '',
            'dni_usuario' => $this->input->post('dni'),
            'password' => md5($this->input->post('password')),
            'nombre_usuario' => $this->input->post('nombre'),
            'apellido_usuario' => $this->input->post('apellido'),
            'email_usuario' => $this->input->post('email'),
            'telefono_usuario' => $this->input->post('telefono'),
            'domicilio_usuario' => $this->input->post('domicilio'),
            'fecha_nacimiento' => $this->input->post('fechaNac')
        );

        if ($this->usuario->existeUsuario($user['dni_usuario'],$user['email_usuario'])) {
            $response = 'No añadido';
        } else {
            if ($this->usuario->guardarUsuario($user)) {
                $response = "Añadido";
            } else {
                $response = "No añadido";
            }
        }
        
        echo json_encode($response);
	}


}

?>