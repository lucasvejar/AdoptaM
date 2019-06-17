<?php

class M_Adopcion extends CI_Model {
    
    public $id_adopcion;
    public $fecha_adopcion;
    public $detalle_adopcion;
    public $id_usuario;
    public $id_animal;
    public $estado;   //----> estados:     0-rechazado  1-espera  2-aceptado

    function init($row){
        $this->id_adopcion = $row->id_adopcion;
        $this->fecha_adopcion = $row->fecha_adopcion;
        $this->detalle_adopcion = $row->detalle_adopcion;
        $this->id_usuario = $row->id_usuario;
        $this->id_animal = $row->id_animal;
        $this->estado = $row->estado;        
    }

    function obtenerUno($id_adopcion)
    {
        $this-> db -> from('adopcion');
        $this-> db -> where('id_adopcion',$id_adopcion);
        $query = $this -> db -> get();

        if ($query->num_rows() == 1) {
            $row = $query->result();
            $object = new self();
            $object -> init($row[0]);
            return $object;
        } else {
            return false;
        }
        
    }

    function obtenerTodos()
    {
        $result = array();
        $this-> db -> from('adopcion');
        $query = $this -> db -> get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $object = new self();
                $object->init($row);
                $result[] = $object;
            }
            return $result;
        } else {
            return false;
        }
        
    }


    function ultimaAdopcion()
    {
        $this-> db -> from('adopcion');
        $this-> db -> order_by('fecha_adopcion DESC','id_adopcion DESC');
        $this-> db -> limit(1);
        $query = $this -> db -> get();

        if ($query->num_rows()==1) {
            $row = $query->result();
            $object = new self();
            $object->init($row[0]);
            return $object;
        } else {
            return false;
        }
    }

    //----> estados:     0-rechazado  1-espera  2-aceptado
    function crearAdopcion($id_animal,$id_usuario,$detalle_adopcion)
    {
        $data = array(
            'id_adopcion' => '',
            'fecha_adopcion' => date('Y-m-d'),
            'detalle_adopcion' => $detalle_adopcion,
            'id_usuario' => $id_usuario,
            'id_animal' => $id_animal,
            'estado' => 1      //----> se crean siempre con estado de 'espera' para ser aprobadas
        );
        return $this -> db -> insert('adopcion',$data);
    }


    //----> estados:     0-rechazado  1-espera  2-aceptado
    function cambiarEstado($id_adopcion,$estado)
    {
        $this->db->set('estado', $estado);
        $this->db->where('id_adopcion', $id_adopcion);
        return $this->db->update('adopcion');
    }

}


?>