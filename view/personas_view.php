<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <title>Document</title>
</head>
<body>

<?php
    require("model/paginacion.php"); //ESTE FUE EL UNICO include_once QUE TUVE QUE CAMBIAR A require PARA QUE EL CODIGO CORRA A LA PERFECCION

    if (isset($_POST['cr'])) {
        $nombre = $_POST['Nom'];
        $apellido = $_POST['Ape'];
        $direccion = $_POST['Dir'];

        $sql="INSERT INTO datos_usuarios (Nombre, Apellido, Direccion) VALUES (:nom, :ape, :dir)";
        $resultado = $base->prepare($sql);

            $resultado->execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":dir"=>$direccion));

        header("location:./index.php");
    }
?>


<form class="px-2 py-2 self-center mt-40 bg-amber-100 max-w-fit rounded-lg border-slate-900 border-solid" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"> 

    <table class="flex justify-around shadow-2xl pl-4 pb-3">
        <tr>
            <td class="text-lg underline ">ID</td>
            <td class="text-lg underline ">Nombre</td>
            <td class="text-lg underline ">Apellido</td>
            <td class="text-lg underline ">Direccion</td>
            <td class="">&nbsp;</td>
            <td class="">&nbsp;</td>
            <td class="">&nbsp;</td>
        </tr>
        
<?php
foreach($matrizPersona as $person):
?>

    <tr>
        <td><?php echo $person["ID"]?></td>
        <td><?php echo $person["Nombre"]?></td>
        <td><?php echo $person["Apellido"]?></td>
        <td><?php echo $person["Direccion"]?></td>

        <td class="px-3"><a href="/model/borrar.php?Idensin=<?php echo $person["ID"]?>"><input type="button" name="del" id="del" value="Borrar"></a></td>

        <td class="px-3"><a href="/model/editar.php?Idensin=<?php echo $person["ID"]?> & nom=<?php echo $person["Nombre"]?> & ape=<?php echo $person["Apellido"]?> & dir=<?php echo $person["Direccion"]?>"><input type="button" name="up" id="up" value="Actualizar"></a></td>
    </tr>

<?php
    endforeach;
?>

    <tr>
        <td><input type="text" name="Nom" size="10" class="rounded-xl"></td>
        <td><input type="text" name="Ape" size="10" class="rounded-xl"></td>
        <td><input type="text" name="Dir" size="10" class="rounded-xl"></td>
        <td><input type="submit" name="cr" size="10" class="bg-orange-400 text-white px-3 p-2 ml-2 my-4 rounded-full" id="cr" value="Insertar"></td>
    </tr>

    <tr><td>

    <?php
        for($i=1; $i<=$total_pags; $i++){
        echo "<a class='px-1' href='?pagina=" . $i . "'>" . $i . "</a>";
        }
    ?>

    </td></tr>

</table>
</form>
    
</body>
</html>