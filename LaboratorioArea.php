  <?php  
 $link = new PDO('mysql:host=localhost;dbname=tesis', 'root', '');  
 //$id_area = $_POST["id_area"]; 
 //$id_piso = $_POST["id_piso"]; 
 //$id_edificio = $_POST["id_edificio"];
  session_start();
 if (isset($_SESSION['usuario'])){
 
 
   if(!empty($_POST['id_piso'])) {//si no esta vacio
$_SESSION['id_piso']=$_POST['id_piso'];
$id_piso=$_POST['id_piso'];

$_SESSION['id_laboratorio']=$_POST['id_laboratorio'];
$id_laboratorio=$_POST['id_laboratorio'];

$_SESSION['id_edificio']=$_POST['id_edificio'];
$id_edificio=$_POST['id_edificio'];
}else{
	 $_POST['id_piso']=$_SESSION['id_piso'];
     $id_piso=$_POST['id_piso'];
	 
	  $_POST['id_laboratorio']=$_SESSION['id_laboratorio'];
     $id_laboratorio=$_POST['id_laboratorio'];
	 
	  $_POST['id_edificio']=$_SESSION['id_edificio'];
     $id_edificio=$_POST['id_edificio'];
}
 
}else{
	$id_piso=$_POST['id_piso'];
    $id_edificio = $_POST["id_edificio"];
	$id_laboratorio = $_POST["id_laboratorio"]; 
}
 
 ?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
  <?php
header("Cache-Control: no-cache, must-revalidate");  
header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");  
?>
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
<?php
$conn = mysqli_connect("localhost","root","","tesis");
$result = mysqli_query($conn, 'SELECT * FROM laboratorio 
                                   WHERE id_laboratorio ='.$id_laboratorio.';');
while($row = mysqli_fetch_array($result)){  
echo'<form action="MLaboratorio.php" method="post">'; 	  
echo' <h4 style="margin: 0;" class="text-center">'.$row["nombre"].'</h4>'; 
									   
?>
<hr>
</div>
<div class="callout">
<div class="grid-x grid-margin-x">

 
<div class="show-for-large large-3 cell">  
<?php
echo '<input type=image class="thumbnail"
 
  style=" max-width: 400px;
  max-height: 400px;
  width: auto;
  display: block;
  margin: 0 auto;"  
  
  src="data:image/png;base64,'.base64_encode( $row["imagen"] ).'"/>';
									   
?>
</div>

<div class="medium-2 large-1 cell">
 

</div>

<div class="medium-10 large-8 cell ">

 
 
<?php
   
  echo'<table>';
                echo'<thead>';
                echo'<tr>';
                echo'<th width="20">Encargado: </th>';
                echo'<th style="font-weight: normal;"width="50">'.$row["encargado"].'</th>';
               
                echo'<tr>';
                if(isset($_SESSION['usuario'])){
                echo'</tr>';
                echo'<tr>';
                echo'</tr>'; 
				}
				echo'<tr>';
                echo'<th width="50">Descripción: </th>';
				echo'<th class="column text-center medium-text-left" style="font-weight: normal;"width="1200";>';
		 
	 
				//echo'<textarea rows="10" cols="10" readonly>';
				echo utf8_encode($row["descripcion"]);
				//echo'</textarea>';
	 
				echo'</th>';
				echo'</tr>'; 
                
				echo'<tr>';
                echo'<th width="50">Reglamento: </th>';
				echo'<th class="column text-center medium-text-left" style="font-weight: normal;"width="1200";>';
		 
			    echo'<p rows="10" cols="10">';
				echo utf8_encode($row["reglamento"]);
			    echo'</p>';
		 
				echo'</th>';
				echo'</tr>'; 

				
			    echo'<tr>';
                echo'<th width="50">Equipamiento: </th>';
				echo'<th class="column text-center medium-text-left" style="font-weight: normal;"width="1200";>';
		 
				//echo'<textarea rows="10" cols="10" readonly>';
				echo utf8_encode($row["equipamiento"]);
				//echo'</textarea>';
	 
				echo'</th>';
				echo'</tr>'; 
				
                echo'</thead>';
                echo'</table>';
 
				if(isset($_SESSION['usuario'])){
		  ?>
		  <input type="hidden" name="id_edificio" value="<?php echo $id_edificio ?>"/>
		  <input type="hidden" name="id_piso" value="<?php echo $id_piso ?>"/>
		  <input type="hidden" name="id_laboratorio" value="<?php echo $id_laboratorio ?>"/>
		  <?php
		  
		  
		    echo'<input type="submit" class="success button"value="Modificar"></input>';
            echo'</form>';	
		 		
 
		    echo'<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
            echo'<input type="hidden" name="id_piso" value="<?php echo $id_piso ?>"/>';
	        echo '<input type="hidden" name="id_edificio" value='.$id_edificio.' />';
            echo '<input type="hidden" name="id_laboratorio" value='.$row["id_laboratorio"].' />';
            ?>  
            <button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="submitquitarlaboratorio">Eliminar</button> 
            <?php 
            echo '</form>';		
				
				}else{
					  echo '</form>';	
				}
 				
}				 					   
?>
 
 
 



</br>
 <form action="piso.php" method="post"> 
 <input type="hidden" name="id_edificio" value="<?php echo $id_edificio ?>"/>
 <input type="hidden" name="id_piso" value="<?php echo $id_piso ?>"/>
 <input type="submit" class="button primary"value="Volver a Áreas"></input>
 </form>
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
if(isset($_POST['submitquitarlaboratorio'])){
	
 $campos = array("id_edificio"=>$_POST['id_edificio'],
 "id_laboratorio"=>$_POST['id_laboratorio']);  
 
 $nuevo = new GuardarLaboratorio("tesis"); 
 $nuevo->EliminarLaboratorio($campos);  
}
?>
 