<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<center>
    <h2>Manipulacion de Datos con PHP</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="buscar">Buscar:</label>
        <input type="text" name="nitoccbus" id="" placeholder="Buscar Cliente">
        <input type="submit" value="buscar">
        <hr>
        <label for="">Nit o CC:</label>
        <input type="text" name="nitocc" id="" placeholder="Ingrese el nit o CC del nuevo cliente">
        <br> <br>
        <label for="">Nombres: </label>
        <input type="text" name="nombres" id="" placeholder="Ingresa el nombre completo">
        <br> <br>
        <label for="">Direccion:</label>
        <input type="text" name="direccion" id="" placeholder="Ejemplo: Calle 47 #82-96A sur">
        <br><br>
        <label for="">Telefono:</label>
        <input type="number" name="telefono" id="" placeholder="Ingrese su numero de contacto">
        <br><br>
        <label for="">Fecha de Ingreso:</label>
        <input type="date" name="fechaingreso" id="">
        <br><br>
        <label for="">Cupo del credito:</label>
        <input type="number" name="cupodelcredito" id="" placeholder="$ valor en pesos">
        <br><br>
        <label for="">Subir Foto:</label>
        <input type="file" name="foto" id="">
        <br> <br>
        <label for="">Foto:</label>
        <img src="" alt="" width="50px" height="50px">
        <br> <br>
        <input type="submit" value="Guardar Nuevo Cliente" name="guardar">
        <input type="submit" value="Listar todos los Clientes" name="listar">
        <input type="submit" value="Actualizar Cliente" name="actualizar">
        <input type="submit" value="Eliminar Cliente" name="eliminar">
    </form>
</center>
    <?php
        if (isset($_POST["guardar"])) {
            include ("conexion.php");
            $nitocc = $_POST["nitocc"];
            $nombres = $_POST["nombres"];
            $direccion = $_POST["direccion"];
            $telefono = $_POST["telefono"];
            $fecha = $_POST["fechaingreso"];
            $cupo = $_POST["cupodelcredito"];
            //Manejo de archivos (La foto en este caso)
            $nombre_foto = $_FILES["foto"]["name"]; //Nombre de la Foto
            $ruta=$_FILES["foto"]["tmp_name"]; //Ruta o Path del Archivo
            $foto="fotos/".$nombre_foto; //Ruta y nombre del archivo
            copy($ruta, $foto); //Guarda el archivo en una ruta especifica


            //Verificar que no existan valores duplicados para el campo de Nit o CC
            $sqlbuscar = "SELECT nitocc FROM cliente WHERE nitocc = '$nitocc' ORDER BY nitocc ";
            if ($resultado = mysqli_query($conexion, $sqlbuscar)) {
                $nroregistros = mysqli_num_rows($resultado);
                if ($nroregistros>0) {
                    echo "<script>alert('Ya existe dicho id'); </script>";
                }else{
                   mysqli_query($conexion,"INSERT INTO cliente (nitocc,nombres,direccion,telefono,fechaingreso,cupodelcredito,foto) VALUES('$nitocc','$nombres','$direccion','$telefono','$fecha','$cupo','$foto') ");
            echo "Datos guardados correctamente"; 
                }
            }
        };
    ?>
</body>
</html>