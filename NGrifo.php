  <?php  
 session_start();
if (!isset($_SESSION['usuario'])){
	echo "<script>
           window.location.replace('index.php');					
		  </script>";
}			 
 ?>
 
 <!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grifos</title> 
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="foundation-icons/foundation-icons.css" />
  </head>
 
 <body>
    <div class="off-canvas position-left" id="offCanvasLeftOverlap" data-off-canvas data-transition="overlap">
        <?php include 'BarraLateral.php'; ?>
    </div>
 
    <div class="off-canvas-content" data-off-canvas-content>
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell">
 
                <?php include 'Top-Bar.php'; ?>
 
            </br>
            <div class="row column">
                <hr>
                <h4 style="margin: 0;" class="text-center">Grifos</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
 
<insertar>
 	<a class="success button"href="Grifo.php">Añadir Grifo</a>		 
  <table>
  <thead>
    <tr>
      <th width="500">Imagen</th>
	  <th width="500">Nombre</th>
	  <th width="500">Descripción</th>
	  <th width="50">Modificar</th>
	  <th width="50">Eliminar</th>
    </tr>
  </thead> 
  <tbody>
 
  <?php  
			$conn = mysqli_connect("localhost","root","","tesis");
			$result = mysqli_query($conn, 'SELECT *
									  	   FROM grifo 
										   WHERE eliminar!="1";');
 							   
		    while($row = mysqli_fetch_array($result)){
  
 echo'<form action="MGrifo.php" method="post">';	 
 echo '<input type="hidden" name="id_grifo" value='.$row["id_grifo"].' />'; 
      echo '<tr>';
 
	  echo '<td>' ;
	  ?><embed class="thumbnail" src="imagenes\<?php
      echo $row["imagen"] ; 
	  ?>" type="image/png" /><?php
	  echo '</td>';

	  echo '<td>' ;
	  echo  utf8_encode($row["nombre"]);
      echo '</td>';
 
	  echo '<td>' ;
	  echo  utf8_encode($row["descripcion"]);
      echo '</td>';
 
	   
	  echo '<td>' ;
	   if(isset($_SESSION['usuario'])){ 
     echo'<input type="submit" class="success button"value="Modificar"></input>';
     echo '</td>';   
     echo'</form>';
 
 
       echo'<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
      echo '<input type="hidden" name="id_grifo" value='.$row["id_grifo"].' />';
      echo '<td>' ;    
      ?>  
      <button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminargrifo">Eliminar</button> 
      <?php 
	  echo '</td>' ;
      echo'</form>';
      echo '</tr>';
 
 
 
  }
 
				}
		  ?>
 
  </tbody>
</table>
 
                </div>
                </div>
          </div>
        </div>
      </div>
 
</br>	
<?php include 'Footer.php'; ?>
 
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
	
   <link rel="stylesheet" href="css/estilogeneral.css" />
   </div> 
  </body>
</html>

 
<?php
include("guardar.php");
 
if(isset($_POST['eliminargrifo'])){
  
    $campos = array("id_grifo"=>$_POST['id_grifo']); 
  
    $nuevo = new Grifo("tesis"); 
    $nuevo->EliminarGrifo($campos);
}
 
?>
 