<?php

class M_Imagen extends CI_Model {

    /* Atributos*/
    public $id_imagen;
    public $path;
    public $id_usuario;


    
    public function init($row){
        $this->id_imagen =  $row->id_imagen;
        $this->path = $row->path;
        $this->id_usuario = $row->id_usuario;
    }


    public function obtenerImagenes($id_usuario)
    {
        $result = array();
        $this->db->from('imagen');
        $this-> db -> where('id_usuario',$id_usuario);
        $query = $this->db->get();
        if ($query->num_rows > 0) {
            foreach ($query->result() as $row) {
                $new_object - new self();
                $new_object->init($row);
                $result[] = $new_object;
                return $result;
            }
        } else {
            return false;
        }
    }



}

?>