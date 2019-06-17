<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Campanias extends CI_Controller {
   
    // Construct
    public function __construct()
    {
        parent::__construct();
    }


    public function index(){
        $campaña = array(
            'id_campaña'=>1,
            'tipo_campaña'=>'vacuna',
            'fecha_inicio'=>'15/05/2016',
            'fecha_fin'=>'18/02/16'
        );
        $var = array($campaña,$campaña,$campaña,$campaña,$campaña,$campaña);
        $data['campañas'] = $var;
        $this -> load -> view('plantilla/header');
        $this -> load -> view('V_Campaña',$data);
        $this -> load -> view('plantilla/footer');
    }

}

?>