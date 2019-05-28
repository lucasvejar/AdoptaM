<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_InicioSesion extends CI_Controller {


	// Construct
	public function __construct()
	{
		parent::__construct();
	}

	
	public function index()
	{
		$this->load->view('plantilla/header');
		$this -> load -> view('V_Inicio_Sesion');	
		$this->load->view('plantilla/footer');
		
	}




}

/* End of file C_InicioSesion.php */
/* Location: ./application/controllers/C_InicioSesion.php */