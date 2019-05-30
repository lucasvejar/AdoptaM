<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class C_Adoptar extends CI_Controller {
    
    // Construct
    public function __construct()
    {
        parent::__construct();
    }


    public function index(){
        $this -> load -> view('plantilla/header');
        $this -> load -> view('V_Adopcion');
        $this -> load -> view('plantilla/footer');
    }

}

?>