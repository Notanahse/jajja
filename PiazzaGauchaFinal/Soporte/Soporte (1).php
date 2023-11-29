    <?php
	$nombre= $_GET["Nombre"];
    $mail = $_GET["Mail"];
	$queja = $_GET["Queja"];
    $servername = "127.0.0.1";
    $database = "PiazzaGauchaa2";
    $username = "alumno"; 
    $password = "alumnoipm";
    
    $conexion = mysqli_connect($servername, $username, $password, $database); // se crea la conexion


    if (!$conexion) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
    else{
        $sql="SELECT * FROM Cliente where Nombre='$nombre' AND mail='$mail'";
        $result->$conexion->query($sql);
        if($result->nom_rows>0){
            $result=mysqli_query($conexion,"Select IdCliente from Cliente where Nombre='$nombre' and mail='$mail'");
            $array=mysqli_fetch_assoc($result);
            $IdCliente=$array["IdCliente"];
            $resultado=mysqli_query($conexion,"insert into Soporte values(NUll,'$queja','$IdCliente')");
        }else{
            $resultado=mysqli_query($conexion,"insert into Cliente values(NULL,'$nombre',NULL,NULL, '$mail');");
		$resultado = mysqli_query($conexion,"select IdCliente from Cliente where Nombre='$nombre' and mail='$mail';");
        $nombre=mysqli_fetch_assoc($resultado);
        $IdNuCliente=$nombre["IdCliente"];
        $resultado=mysqli_query($conexion,"insert into Soporte values(NUll,'$queja','$IdNuCliente')");

        }

        
        echo $nombre;
        while($fila=mysqli_fetch_assoc($resultado)){ // recorremos cada fila obtenida y mostramos el nombre y el apellido
            ?>
            <p><?php echo $fila['nombre']. " " .$fila['apellido']?></p>
            <?php
        }
    }
    mysqli_close($conexion);
?>
