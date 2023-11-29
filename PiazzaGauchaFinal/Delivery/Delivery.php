<?php
	$nombre= $_GET["Nombre"];
    $apellido=$_GET["Apellido"];
    $direccion = $_GET["Direccion"];
	$numero = $_GET["Numero"];
    $orden = $_GET["Orden"];
    $servername = "127.0.0.1";
    $database = "PiazzaGauchaa2";
    $username = "alumno"; 
    $password = "alumnoipm";
    $titular=["Nombre titular"];
    $numeroTarj=["Número tarjeta"];
    $codSeg=["Código de seguridad"];
    $fechaVen=["Fecha de venimiento"];
    
    $conexion = mysqli_connect($servername, $username, $password, $database); // se crea la conexion


    if (!$conexion) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
    else{
        if(isset($_GET["titular"])){
            $sql="SELECT * FROM Cliente where Nombre='$nombre' AND Apellido='$apellido'";
            $result->$conexion->query($sql);
            if($result->nom_rows>0){
                $resultado = mysqli_query($conexion,"select IdCliente from Cliente where Nombre='$nombre' and Apellido='$apellido';");
                $array=mysqli_fetch_assoc($resultado);
                $IdCliente=$array["IdCliente"];
                $resultado=mysqli_query($conexion,"insert into Orden values(NULL, '$nombre', '$direccion', '$numero','$orden','$IdCliente','$titular','$numeroTarj','$codSeg','$fechaVen');");
            }else{
                $resul1=mysqli_query($conexion,"insert into Cliente values(NULL,'$nombre','$apellido',NULL,'$numero',NULL)");
                $resul1=mysqli_query($conexion,"select IdCliente from Cliente where Nombre='$nombre' AND Apellido='$apellido' AND TelefonoCelular='$numero'");
                $array1=mysqli_fetch_assoc($resul1);
                $IdNuCliente=$array1["IdCliente"];
                $resultado=mysqli_query($conexion,"insert into Orden values('$IdNuCliente', '$nombre', '$direccion', '$numero','$orden','','$titular','$numeroTarj','$codSeg','$fechaVen');");
                
            }
        }else{
            $sql="SELECT * FROM Cliente where Nombre='$nombre' AND Apellido='$apellido'";
            $result->$conn->query($sql);
            if($result->nom_rows>0){
                $resultado = mysqli_query($conexion,"select IdCliente from Cliente where Nombre='$nombre' and Apellido='$apellido';");
                $array=mysqli_fetch_assoc($resultado);
                $IdCliente=$array["IdCliente"];
                $resultado=mysqli_query($conexion,"insert into Order values(NULL,'$nombre', '$direccion', '$numero','$orden','$IdCliente',NULL,NULL,NULL,NULL)");
            }else{
                $resul1=mysqli_query($conexion,"insert into Cliente values(NULL,'$nombre','$apellido',NULL,'$numero',NULL)");
                $resul1=mysqli_query($conexion,"select IdCliente from Cliente where Nombre='$nombre' AND Apellido='$apellido' AND TelefonoCelular='$numero'");
                $array1=mysqli_fetch_assoc($resul1);
                $IdNuCliente=$array1["IdCliente"];
                $resultado=mysqli_query($conexion,"insert into Order values('$IdNuCliente','$nombre', '$direccion', '$numero','$orden','NULL',NULL,NULL,NULL,NULL)");
            }
        }
        //seleccionamos todas las filas que haya en usuarios
		//$resultado1 = mysqli_query($conexion,"select * from usuarios;  ");
        
        /*echo $nombre;
        while($fila=mysqli_fetch_assoc($resultado)){ // recorremos cada fila obtenida y mostramos el nombre y el apellido
            ?>
            <p><?php echo $fila['nombre']. " " .$fila['apellido']?></p>
            <?php
        }*/
    }
    mysqli_close($conexion);
?>
