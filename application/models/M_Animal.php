<?php

class M_Animal extends CI_Model {


    /* Atributos */
    public $id_animal;
    public $raza_animal;
    public $especie_animal;
    public $sexo_animal;
    public $descripcion_animal;
    public $castrado;
    public $edad;


    function init($row){
        $this->id_animal = $row->id_animal;
        $this->raza_animal = $row->raza_animal;
        $this->especie_animal = $row->especie_animal;
        $this->sexo_animal = $row->sexo_animal;
        $this->descripcion_animal = $row->descripcion_animal;
        $this->castrado = $row->castrado;
        $this->edad = $this->calculaEdad($row->fecha_nacimiento);   //----> Calcula la edad y se la asigna
    }


    function obtenerUno($id_animal)
    {
        $this-> db -> from('animal');
        $this-> db -> where('id_animal',$id_animal);
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
        $this-> db -> from('animal');
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



    //----> La funcion calcula la edad del animal
    function calculaEdad()
    {
        $fecha_nacimiento = $this -> fechaNacimiento;  
        $hoy = date('Y-m-d');               
        $diff = abs(strtotime($hoy) - strtotime($fecha_nacimiento));  
        $anios = floor($diff / (365*60*60*24));      
        $meses = floor(($diff - $anios * 365*60*60*24) / (30*60*60*24));
        $dias = floor(($diff - $anios * 365*60*60*24 - $meses*30*60*60*24)/ (60*60*24));
        if ($anios>0) {
            return ($anios==1)?$anios." año":$anios." años";
        } else {
            if ($meses>0) {
                return ($meses==1)?$meses." mes":$meses." meses";
            } else {
                return ($dias==1)?$dias." día":$dias." días";
            }
        }
    }


}

?>