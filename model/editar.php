<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1 align='center'>Pagina de actualizacion</h1>

    <?php

    include_once ("conectar.php");
    $base = conectar::connecting();

    if (!isset($_POST["bot_actualizar"])) {
        $Id=$_GET["Idensin"];
        $nom=$_GET["nom"];
        $ape=$_GET["ape"];
        $dir=$_GET["dir"];
    } else {
        $Id=$_POST["Idensin"];
        $nom=$_POST["nom"];
        $ape=$_POST["ape"];
        $dir=$_POST["dir"];

        $sql=("UPDATE datos_usuarios SET Nombre=:miNom, Apellido=:miApe, Direccion=:miDir WHERE ID=:miId");
        $resultado = $base->prepare($sql);

            $resultado->execute(array(":miId"=>$Id, ":miNom"=>$nom, ":miApe"=>$ape,":miDir"=>$dir));

        header("location:../index.php");
    }
    ?>

    <br>
    <br>

    <p>&nbsp;</p>
    <form name="form1" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <table width="25%" border="0" align="center">
    <tr>
        <td></td>
        <td><label for="id"></label>
        <input type="hidden" name="Idensin" id="Id" value="<?php echo $Id ?>"></td>
    </tr>
    <tr>
        <td>Nombre: </td>
        <td><label for="nom"></label>
        <input type="text" name="nom" id="nom" value="<?php echo $nom ?>"></td>
    </tr>
    <tr>
        <td>Apellido: </td>
        <td><label for="ape"></label>
        <input type="text" name="ape" id="ape" value="<?php echo $ape ?>"></td>
    </tr>
    <tr>
        <td>Direccion: </td>
        <td><label for="dir"></label>
        <input type="text" name="dir" id="dir" value="<?php echo $dir ?>"></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
    </table>
    </form>
    <p>&nbsp;</p>
    
</body>
</html>