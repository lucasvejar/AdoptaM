<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Campanias extends CI_Controller {
   
    // Construct
    public function __construct()
    {
        parent::__construct();
    }


    public function index(){
        $var = array(
            ''
        );
        $data['campañas'] = $var;
        $this -> load -> view('plantilla/header');
        $this -> load -> view('V_Campaña',$data);
        $this -> load -> view('plantilla/footer');
    }

}

?>