<?php
	$nombre= $_GET["Nombre"];
    $apellido=$_GET["Apellido"];
    $mail = $_GET["Mail"];
    $celular=$_GET["celular"];
	$numero = $_GET["Numreo"];
    $cantPersonas=$_GET["CantPer"];
    $fecha=$_GET["Fecha"];
    $sucursal=$_GET["Sucursal"];
    $hora=$_GET["Hora"];
    $servername = "127.0.0.1";
    $database = "PiazzaGauchaa2";
    $username = "alumno"; 
    $password = "alumnoipm";
    
    $conexion = mysqli_connect($servername, $username, $password, $database); 


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
                $resultado=mysqli_query($conexion,"insert into Reserva values(NULL, '$nombre', '$mail', '$numero','$fecha','$sucursal' ,'$hora');");
            }else{
                $resul1=mysqli_query($conexion,"insert into Cliente values(NULL,'$nombre','$apellido',NULL,'$numero',NULL)");
                $resul1=mysqli_query($conexion,"select IdCliente from Cliente where Nombre='$nombre' AND Apellido='$apellido' AND TelefonoCelular='$numero'");
                $array1=mysqli_fetch_assoc($resul1);
                $IdNuCliente=$array1["IdCliente"];
                $resultado=mysqli_query($conexion,"insert into Reserva values('$IdNuCliente', '$nombre', '$mail', '$numero','$fecha','$sucursal' ,'$hora');");
            
            }
        }else{
            $sql="SELECT * FROM Cliente where Nombre='$nombre' AND Apellido='$apellido'";
            $result->$conn->query($sql);
            if($result->nom_rows>0){
                $resultado = mysqli_query($conexion,"select IdCliente from Cliente where Nombre='$nombre' and Apellido='$apellido';");
                $array=mysqli_fetch_assoc($resultado);
                $IdCliente=$array["IdCliente"];
                $resultado=mysqli_query($conexion,"insert into Reserva values(NULL, '$nombre', '$mail', '$numero','$fecha','$sucursal' ,'$hora');");
            }else{
                $resul1=mysqli_query($conexion,"insert into Cliente values(NULL,'$nombre','$apellido',NULL,'$numero',NULL)");
                $resul1=mysqli_query($conexion,"select IdCliente from Cliente where Nombre='$nombre' AND Apellido='$apellido' AND TelefonoCelular='$numero'");
                $array1=mysqli_fetch_assoc($resul1);
                $IdNuCliente=$array1["IdCliente"];
                $resultado=mysqli_query($conexion,"insert into Reserva values('$IdNuCliente','$nombre', '$mail', '$numero','$fecha','$sucursal' ,'$hora');");
            }
        }
    }
    mysqli_close($conexion);
?>