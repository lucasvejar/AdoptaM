<?php

class M_Imagen extends CI_Model {

    /* Atributos*/
    public $id_imagen;
    public $path;
    public $id_usuario;


    
    function init($row){
        $this->id_imagen =  $row->id_imagen;
        $this->path = $row->path;
        $this->id_usuario = $row->id_usuario;
    }



    function obtenerImagen($id_imagen)
    {
        $this-> db -> from('imagen');
        $this-> db -> where('id_imagen',$id_imagen);
        $query = $this -> db -> get();
        if ($query->num_rows() ==1) {
            $new_object = new self();
            $new_object->init($query->result());
            return $new_object;
        } else {
            return false;
        }
    }


    public function obtenerImagenes($id_usuario)
    {
        $result = array();
        $this->db->from('imagen');
        $this-> db -> where('id_usuario',$id_usuario);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $new_object = new self();
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