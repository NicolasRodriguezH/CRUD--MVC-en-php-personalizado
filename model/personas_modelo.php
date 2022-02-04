<?php

    class personas_model{
        private $db;
        private $personas;
        public function __construct()
        {
            include_once "conectar.php";
            $this->db=conectar::connecting();
            $this->personas=array();
        }

        public function get_personas(){
            include_once "paginacion.php"; //debo crearlo
            $consulta = $this->db->query("SELECT * FROM datos_usuarios LIMIT $empezardesde, $tamañopag"); //estas var las creo en paginacion.php
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $this->personas[] = $fila;
            }
            return $this->personas;
        }
    }

?>