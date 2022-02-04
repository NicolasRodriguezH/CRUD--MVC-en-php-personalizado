<?php

    include_once "conectar.php";
    $base = conectar::connecting();
    $id = $_GET["Idensin"];
    $base->query("DELETE FROM datos_usuarios WHERE ID = $id");
    header("location:index.php"); //REVISAR CUAL RUTA FUNCIONA MEJOR, ABAJO HAY OTRO HEADER CON LOCATION DIFERENTE..

?>

<?php

    class borrar_model{

        private $db;
        private $personas;

        public function __construct()
        {
            include_once "conectar.php";
            $this->db=conectar::connecting();
            $this->personas=array();
        }
        public function getPersonas()
        {
            $id = $_GET['Idensin'];
            $consulta = $this->db->query("DELETE FROM datos_usuarios WHERE ID = '$id'");
        }

    }

    header("location:../index.php");
?>