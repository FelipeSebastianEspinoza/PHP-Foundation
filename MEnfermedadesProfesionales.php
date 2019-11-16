  <?php  
 
 session_start();
 if (!isset($_SESSION['usuario'])){
	echo "<script>
           window.location.replace('index.php');					
		  </script>";
}
 $id_enfermedad = $_POST["id_enfermedad"]; 				 
 ?>
 <!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation for Sites</title>
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
                <h4 style="margin: 0;" class="text-center">Enfermedades Profesionales</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
 	 
  <table>
  <thead>
    <tr>
      <th width="200">Nombre</th>
	  <th width="400">Descripción (Opcional)</th>
      <th width="150">Modificar</th>
    </tr>
  </thead> 
 
  <tbody>
 
  <?php  
 
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT *
									  	   FROM enfermedades_profesionales
										   WHERE id_enfermedad='.$id_enfermedad.';');
		    while($row = mysqli_fetch_array($result)){

  
 	  echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	   
      echo '<input type="hidden" name="id_enfermedad" value='.$row["id_enfermedad"].' />'; 
	  echo '<tr>';
	  echo '<td>' ;
 
	  echo '<input type="text" id="nombre"name="nombre" class="form-control" value="'.$row["nombre"].'" Required>';
	  echo '</td>';

	  echo '<td>' ;
	   ?> <textarea name="descripcion" type="text"rows="5" cols="55"  Required><?php echo utf8_encode($row['descripcion']) ?></textarea><?php
      echo '</td>';
	   
	  echo '<td>' ;
	   if(isset($_SESSION['usuario'])){ 
      echo'<button class="success button" type="submit" name="submitprotocolo">Registrar</button> ';
	   }
      echo '</td>';
 
      echo '</tr>';
 
      echo '</form>';
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
 
if(isset($_POST['submitprotocolo'])){
 
    $campos = array("id_enfermedad"=> $_POST['id_enfermedad'] ,
	"nombre"=>$_POST['nombre'],"descripcion"=>$_POST['descripcion']); 
 
    $nuevo = new GuardarEnfermedad("tesis"); 
    $nuevo->ModificarEnfermedad($campos);
}
?>
 