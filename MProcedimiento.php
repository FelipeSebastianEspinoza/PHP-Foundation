  <?php  
 
 session_start();
 if (!isset($_SESSION['usuario'])){
	echo "<script>
           window.location.replace('index.php');					
		  </script>";
}
 $id_procedimiento = $_POST["id_procedimiento"]; 	
 $id_edificio = $_POST["id_edificio"]; 	 
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
                <h4 style="margin: 0;" class="text-center">Procedimiento</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
              
 

				 
  <table>
  <thead>
    <tr>
      <th width="300">Reglamento interno</th>
	  <th width="300">Elementos de protección personal</th>
      <th width="300">Vestimenta</th>
	  <th width="300">Herrammientas</th>
    </tr>
  </thead> 
 
  <tbody>
 
  <?php  
 
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT *
									  	   FROM procedimiento
										   WHERE id_procedimiento='.$id_procedimiento.';');
		    while($row = mysqli_fetch_array($result)){
 
 	  echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	   
      echo '<input type="hidden" name="id_procedimiento" value='.$row["id_procedimiento"].' />'; 
	  echo '<input type="hidden" name="id_edificio" value='.$row["id_edificio"].' />'; 
	  echo '<tr>';
	  ?>
	 <td> 
	 <textarea name="reglamento_interno" type="text"rows="5" cols="55"  Required><?php echo utf8_encode($row['reglamento_interno']) ?></textarea> 
    </td> 
     <?php
	  ?>
	 <td> 
	 <textarea name="elementos_de_proteccion_personal" type="text"rows="5" cols="55"  Required><?php echo utf8_encode($row['elementos_de_proteccion_personal']) ?></textarea> 
    </td> 
     <?php
	  ?>
	 <td> 
	 <textarea name="vestimenta" type="text"rows="5" cols="55"  Required><?php echo utf8_encode($row['vestimenta']) ?></textarea> 
    </td> 
     <?php
	  ?>
	 <td> 
	 <textarea name="herramientas" type="text"rows="5" cols="55"  Required><?php echo utf8_encode($row['herramientas']) ?></textarea> 
    </td> 
     <?php
 
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
 
    $campos = array("id_procedimiento"=> $_POST['id_procedimiento'] ,
	"reglamento_interno"=>$_POST['reglamento_interno'],"elementos_de_proteccion_personal"=>$_POST['elementos_de_proteccion_personal']
	,"vestimenta"=>$_POST['vestimenta'],"herramientas"=>$_POST['herramientas']
	,"id_edificio"=>$_POST['id_edificio'] ); 
 
    $nuevo = new GuardarProcedimiento("tesis"); 
    $nuevo->ModificarProcedimiento($campos);
}
 
?>
 
 