  <?php  
 
 session_start();
 if (!isset($_SESSION['usuario'])){
	echo "<script>
           window.location.replace('index.php');					
		  </script>";
}
 $id_unidad = $_POST["id_unidad"]; 	
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
                <h4 style="margin: 0;" class="text-center">Unidad</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
              
 

				 
  <table>
  <thead>
    <tr>
      <th width="200">Nombre</th>
	  <th width="400">Total funcionarios</th>
      <th width="150">Funcionarios que aporta</th>
	  <th width="150">Fecha Actualización</th>
	  <th width="150">Estado</th> 
    </tr>
  </thead> 
  
   
  <tbody>
   
  
  
  <?php  
 
	
	
	
	
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT *
									  	   FROM unidad
										   WHERE id_unidad='.$id_unidad.';');
		    while($row = mysqli_fetch_array($result)){

  
 	  echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	   
      echo '<input type="hidden" name="id_unidad" value='.$row["id_unidad"].' />'; 
	  echo '<input type="hidden" name="id_edificio" value='.$row["id_edificio"].' />'; 
	  echo '<tr>';
	  
	  echo '<td>' ;
	  echo '<input type="text" id="nombre"name="nombre" class="form-control" value="'.$row["nombre"].'" Required>';
	  echo '</td>';
 
	  echo '<td>' ;
	  echo '<input type="text" id="func_aporta_edi"name="func_aporta_edi" class="form-control" value="'.$row["func_aporta_edi"].'" Required>';
	  echo '</td>';

	  echo '<td>' ;
	  echo '<input type="date" id="fecha_act"name="fecha_act" class="form-control" value="'.$row["fecha_act"].'" Required>';
	  echo '</td>';
	  
	  echo '<td>' ;
	  echo '<input type="text" id="estado"name="estado" class="form-control" value="'.$row["estado"].'" Required>';
	  echo '</td>';
	  
	  
	  
	  echo '<td>' ;
	  echo '<input type="text" id="total_func"name="total_func" class="form-control" value="'.$row["total_func"].'" Required>';
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
 
    $campos = array("id_unidad"=> $_POST['id_unidad'] ,
	"nombre"=>$_POST['nombre'],"total_func"=>$_POST['total_func']
	,"func_aporta_edi"=>$_POST['func_aporta_edi'],"fecha_act"=>$_POST['fecha_act']
	,"estado"=>$_POST['estado'],"id_edificio"=>$_POST['id_edificio'] ); 
 
    $nuevo = new GuardarUnidad("tesis"); 
    $nuevo->ModificarUnidad($campos);
}
 
?>
 
 