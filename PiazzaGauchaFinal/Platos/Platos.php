<html>
<head>
 <link rel="stylesheet" type="text/css"   href="./Platos.css">
</head>
<body>
<nav id="navBar">
  <a href="../Principal/index.html">
    <img id="Logo" src="../Logos/LogoManualBlanco.png">
   </a>
<p id="Menu"><a href=""><div class="contenedor" id="derecha">

    <button class="dropdown"><a href="../Platos/Platos.php">Menú</a></button>

    <div class="dropdown-menu">
      <a class="dropdown-item" href="../Platos/Platos.php#pizzas">Pizzas</a>
      <a class="dropdown-item" href="../Platos/Platos.php#pastas">Pastas</a>
      <a class="dropdown-item" href="../Platos/Platos.php#carne">Carne</a>
      <a class="dropdown-item" href="../Platos/Platos.php#otros">Otros</a>

  </div>
</div> </a></p>

<p id="Lugares"><a href=""><div class="contenedor" id="derecha">
  <button class="dropdown"><a href="../Lugares/Lugares.html">Lugares</button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="../Lugares/Lugares.html#belgrano">Belgrano</a>
    <a class="dropdown-item" href="../Lugares/Lugares.html#palermo">Palermo</a>
    <a class="dropdown-item" href="../Lugares/Lugares.html#pilar">Pilar</a>
    <a class="dropdown-item" href="../Lugares/Lugares.html">Nuñez</a>
    <a class="dropdown-item" href="../Lugares/Lugares.html#colghan">Colghan</a> 
    <a class="dropdown-item" href="../Lugares/Lugares.html">Urquiza</a> 
  </div>
</div> </a></p>
<p id="Reservas"><a ></a><div class="contenedor" id="derecha">
  <button  class="dropdown"><a href="../Reservas/Reservas.html"> Reservas</a></button>  
</div></p>
<p id="Delivery"><a href=""></a><div class="contenedor" id="derecha">

  <button class="dropdown"><a href="../Delivery/delivrypizzagaucha .html">Delivery</a></button>
  </div>
</div> </p>
<p id="Soporte"><a href=""></a><div class="contenedor" id="derecha">

  <button class="dropdown"><a href="../Soporte/soportePiazzaGaucha .html">Soporte</a></button>

</div></p>
</nav>

  <?php
    $servername = "127.0.0.1";
    $database = "PiazzaGauchaa2";
    $username = "alumno"; 
    $password = "alumnoipm";
     $conexion = mysqli_connect($servername, $username, $password, $database); // se crea la conexion


    if (!$conexion) {
        die("Conexion fallida: " . mysqli_connect_error());
    }
    else{
      $resultado=mysqli_query($conexion,"Select * from Producto;");
      ?>
      <h4 class="titulos" id="pizzas">Pizzas</h4>
            <?php
      while($fila=mysqli_fetch_assoc($resultado)){
        
        $array3=$fila["NombreProducto"];
        $aux=mysqli_query($conexion,"select NombreProducto,Imagen, Descripcion, Categoria_idCategoria from Producto where NombreProducto='$array3'");
        $fila2=mysqli_fetch_assoc($aux);      
        if($fila2["Categoria_idCategoria"]==1){
        ?><div class="imagendisplay">
          <img class="imagen" src=<?php echo $fila2["Imagen"]?>>
          <h3 class="txtimagen"> <?php echo $fila2["NombreProducto"].": ".$fila2["Descripcion"]?> </h3>
          </div>
      <?php
  }
}
?>
            <h4 class="titulos" id="pastas">Pastas</h4>
            <?php
$resultado=mysqli_query($conexion,"Select * from Producto;");
      while($fila=mysqli_fetch_assoc($resultado)){
        
            $array3=$fila["NombreProducto"];
            $aux=mysqli_query($conexion,"select NombreProducto,Imagen, Descripcion, Categoria_idCategoria from Producto where NombreProducto='$array3'");
            $fila2=mysqli_fetch_assoc($aux);      
            if($fila2["Categoria_idCategoria"]==2){
            ?><div class="imagendisplay">
              <img class="imagen" src=<?php echo $fila2["Imagen"]?>>
              <h3 class="txtimagen"> <?php echo $fila2["NombreProducto"].": ".$fila2["Descripcion"]?> </h3>
              </div>
          <?php
      }
    }
    ?>
            <h4 class="titulos" id="carne">Carne</h4>
            <?php
    $resultado1=mysqli_query($conexion,"Select * from Producto;");
      while($fila3=mysqli_fetch_assoc($resultado1)){
        
            $array3=$fila3["NombreProducto"];
            $aux=mysqli_query($conexion,"select NombreProducto,Imagen, Descripcion, Categoria_idCategoria from Producto where NombreProducto='$array3'");
            $fila4=mysqli_fetch_assoc($aux);      
            if($fila3["Categoria_idCategoria"]==3){
            ?><div class="imagendisplay">
              <img class="imagen" src=<?php echo $fila4["Imagen"]?>>
              <h3 class="txtimagen"> <?php echo $fila4["NombreProducto"].": ".$fila4["Descripcion"]?> </h3>
              </div>
          <?php
      }
    }
  }
      ?>
              <h4 class="titulos" id="otros">Otros</h4>
            <?php
$resultado=mysqli_query($conexion,"Select * from Producto;");
      while($fila=mysqli_fetch_assoc($resultado)){
        
            $array3=$fila["NombreProducto"];
            $aux=mysqli_query($conexion,"select NombreProducto,Imagen, Descripcion, Categoria_idCategoria from Producto where NombreProducto='$array3'");
            $fila2=mysqli_fetch_assoc($aux);      
            if($fila2["Categoria_idCategoria"]!=2 && $fila2["Categoria_idCategoria"]!=1 && $fila2["Categoria_idCategoria"]!=3 ){
            ?><div class="imagendisplay">
              <img class="imagen" src=<?php echo $fila2["Imagen"]?>>
              <h3 class="txtimagen"> <?php echo $fila2["NombreProducto"].": ".$fila2["Descripcion"]?> </h3>
              </div>
          <?php
      }
    }
    ?>
    
</body>
<footer class="finishline">
  <h3 class="finishl">En todas nustras redes como:  PiazzaGaucha</h3>
  <h3 class="finishl"><a href="">Trabaja con nosotros</a></h3>
  <h3 class="finishl">Telefono: +54 9 011 1345626</h3>
  <h3 class="finishl">Mail: PiazzaGaucha@gmal.com </h3>
</footer>
