<?php

include_once "conectar.php";
$base = conectar::connecting();

$tamañopag = 3;

if(isset($_GET["pagina"])){
    if($_GET["pagina"] == 1){
        header("location:index.php");
    }else{
        $pag = $_GET["pagina"];
    }
}else{
    $pag = 1;
};

    $empezardesde = ($pag-1) * $tamañopag;

    $sql="SELECT * FROM datos_usuarios";
    $res=$base->prepare($sql);
    $res->execute(array());

    $n_filas = $res->rowCount();
    $total_pags=ceil($n_filas/$tamañopag);

?>