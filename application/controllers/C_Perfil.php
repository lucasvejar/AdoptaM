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
        $user = $this->usuario->obtenerUno($this -> session -> userdata('dni_usuario'));
        $data['usuario'] = $user;
        if ($user->imagenes != false) {
            $imagenes = array();
            foreach ($user->imagenes as $imagen) {
                $imagenes[] = $imagen->path;
            }
        } else {
           $imagenes = false;
        }
        $data['imagenes'] = $imagenes;
        $this -> load -> view('plantilla/header');
        $this -> load -> view('V_Perfil',$data);
        $this -> load -> view('plantilla/footer');
    }


    /*  Edita la informacion del usuario */
    public function guardarEdicion()
    {
        $registro = array(
            'dni_usuario' => $this -> input -> post('dni'),
            'nombre_usuario' => $this -> input -> post('nombre'),
            'apellido_usuario' => $this -> input -> post('apellido'),
            'email_usuario' => $this -> input -> post('email'),
            'telefono_usuario' => $this -> input -> post('telefono'),
            'domicilio_usuario' => $this -> input -> post('domicilio')
        );
        /*
        *	En este lugar se deberia verificar con la api del gobierno que los datos que ingrese sean validos??¡?¡?¡?
        *	Digo por lo de si quiere cambiar de domicilio y eso ¡?¡?¡?¿'¡'¡'????
        *
        */
        $respuesta = $this->usuario->updateUsuario($registro);
        if ($respuesta) {
            $respuesta = 'guardado';
        } else {
            $respuesta = 'no guardado';
        }

        echo json_encode($respuesta);
    }

    public function userImages()
    {
        $user = $this->usuario->obtenerUno($this->session->userdata('dni_usuario'));
        if ($user->imagenes != false) {
            $imagenes = array();
            foreach ($user->imagenes as $imagen) {
                $imagenes[] = $imagen->path;
            }
        } else {
           $imagenes = false;
        }
        echo json_encode($imagenes);
    }

}

?>