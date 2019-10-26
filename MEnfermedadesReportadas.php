  <?php  
 
 session_start();
 if (!isset($_SESSION['usuario'])){
	echo "<script>
           window.location.replace('index.php');					
		  </script>";
}
 $id_enfermedad_reportada = $_POST["id_enfermedad_reportada"]; 				 
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
 
                <div class="top-bar" id="realEstateMenu">
                    <div class="top-bar-left">
                        <ul class="menu menu-hover-lines">
                            <li class="active"><a href="MapaPrueba.php">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Products</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="top-bar-right">
                        <ul class="menu">
			 		        <?php 
			         			if(isset($_SESSION['usuario'])){
						        	echo '<li><a class="button secondary" data-open="offCanvasLeftOverlap">Menú</a></li>';          
						            echo '<li><a href="cerrar_session.php">Cerrar Sesión</a></li>';
					        	}else{
					        		echo '<li><a href="index.php" class="button secondary">Login</a></li>';
					        	}
						    ?>
                        </ul>
                    </div>
                </div>
 
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
      <th width="200">Fecha</th>
	  <th width="200">Persona</th>
	  <th width="200">Edificio</th>
      <th width="200">Enfermedad</th>
      <th width="100">Modificar</th>
    </tr>
  </thead> 
 
  <tbody>
 
  <?php  
 
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT *
									  	   FROM enfermedades_reportadas
										   WHERE id_enfermedad_reportada='.$id_enfermedad_reportada.';');
		    while($row = mysqli_fetch_array($result)){

  
 	  echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	   
      echo '<input type="hidden" name="id_enfermedad_reportada" value='.$row["id_enfermedad_reportada"].' />'; 
	  echo '<tr>';
	  
	  echo '<td>' ;
	  echo '<input type="date" id="fecha"name="fecha" class="form-control" value="'.$row["fecha"].'" Required>';
	  echo '</td>';

 	  echo '<td>' ;
	  echo '<input type="text" id="persona"name="persona"  value="'.$row["persona"].'" Required>';
	  echo '</td>';
	  
      	  $id_edificio2=$row["id_edificio"];
	     $id_enfermedad2=$row["id_enfermedad"];
		 
		 
	   $result = mysqli_query($conn, 'SELECT id_edificio,nombre
			                               FROM edificio ;');
			 	 		   
		         echo'<td><select  id="lista1" name="id_edificio">';
                    while($row3=mysqli_fetch_assoc($result)) { 
              
					if( $id_edificio2 == $row3[id_edificio]){
						 echo "<option value='$row3[id_edificio]'Selected>$row3[nombre]</option>";  
					}else{
						 echo "<option value='$row3[id_edificio]'>$row3[nombre]</option>";  
					}	
				 
				    } 
                echo'</td></select>';
	   
	   
	    $result = mysqli_query($conn, 'SELECT id_enfermedad,nombre
			                               FROM enfermedades_profesionales ;');
			 	 		   
		         echo'<td><select  id="lista1" name="id_enfermedad">';
                    while($row3=mysqli_fetch_assoc($result)) { 
              
					if( $id_enfermedad2 == $row3[id_enfermedad]){
						 echo "<option value='$row3[id_enfermedad]'Selected>$row3[nombre]</option>";  
					}else{
						 echo "<option value='$row3[id_enfermedad]'>$row3[nombre]</option>";  
					}	
				 
				    } 
                echo'</td></select>';
 
	   
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
 
    $campos = array("id_enfermedad_reportada"=> $_POST['id_enfermedad_reportada'] ,
	"fecha"=>$_POST['fecha'],"persona"=>$_POST['persona'],"id_edificio"=>$_POST['id_edificio']
	,"id_enfermedad"=>$_POST['id_enfermedad']); 
 
    $nuevo = new GuardarReporteEnfermedad("tesis"); 
    $nuevo->ModificarReporteEnfermedad($campos);
}
?>
 