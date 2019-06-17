<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_InicioSesion extends CI_Controller {


	// Construct
	public function __construct()
	{
		parent::__construct();
		$this -> load -> model('M_Usuario','usuario');
		$this -> load -> library('form_validation');
	}

	
	public function index($mensajeError = null)
	{
		$data['mensajeError'] = $mensajeError;
		$this->load->view('plantilla/header');
		$this -> load -> view('V_Inicio_Sesion',$data);	
		$this->load->view('plantilla/footer');
		
	}


	public function InicioSesion(){
		$user = $this -> input -> post('usuario');
		$pass = $this -> input -> post('contraseña');
		$usuario = $this->usuario->IniciarSesion($user,$pass);
		if ($usuario) {
			$this->session->set_userdata($usuario);
			redirect(base_url('C_Inicio'));
			//redirect(base_url('C_Conexion/pedirAnimales'));
		} else {				
			$this->index("Usuario o contraseña incorrecta. Intente nuevamente!");
		}
	}


	function cerrarSesion()
	{
		foreach ($this->session->all_userdata() as $key => $value) {
			$this->session->unset_userdata($key);
		}
		redirect(base_url());
	}



}

/* End of file C_InicioSesion.php */
/* Location: ./application/controllers/C_InicioSesion.php */