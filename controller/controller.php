<?php

//llamada al modelo
include_once "./model/personas_modelo.php";

    $persona = new personas_model;
    $matrizPersona = $persona->get_personas();

//llamada a la vista
include_once "./view/personas_view.php";

?>