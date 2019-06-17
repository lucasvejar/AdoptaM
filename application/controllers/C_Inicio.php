<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Inicio extends CI_Controller {


    // Construct
    public function __construct()
    {
        parent::__construct();
        $this -> load -> model('M_Animal','animal');
        $this -> load -> model('M_Adopcion','adopcion');
        $this -> load -> model('M_Usuario','usuario');
    }

    public function index(){
        $data['animales'] = $this->animal->obtenerTodos();
        $this -> load -> view('plantilla/header');
        $this -> load -> view('V_Inicio',$data);
        $this -> load -> view('plantilla/footer');
    }


    function adoptar()
    {
        $id_animal = $this -> input -> post('idAnimal');
        $id_usuario = $this -> session -> userdata('id_usuario');
        if ($this->adopcion->crearAdopcion($id_animal,$id_usuario,''))
        {
            $data['usuario'] = $this->usuario->obtenerUno($this->session->userdata('dni_usuario'));
            $data['adopcion'] = $this->adopcion->ultimaAdopcion();
            $this -> load -> view('plantilla/header');
            $this -> load -> view('V_Adopcion',$data);
        }else{
            $this -> load -> view('plantilla/header');
            $this -> load -> view('V_Inicio',$data);
        }
        $this -> load -> view('plantilla/footer');
    }

}

?>