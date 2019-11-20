  <?php  
 session_start();
if (!isset($_SESSION['usuario'])){
	echo "<script>
           window.location.replace('index.php');					
		  </script>";
}			
 $id_grifo = $_POST["id_grifo"]; 			 
 ?>
 <!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Grifo</title>
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
                <h4 style="margin: 0;" class="text-center">Modificar Grifo</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
 
 
          
		  
		  <div class="row">

</div>
  <div class="row">
<div class="grid-x grid-margin-x expanded callout">
  <div class="large-8 cell">
<!--
<img id="mapa" src="img/mapa.jpg" class="img-fluid" alt="..."
style="width:678px;
       height:100%;
	   max-height:1012px;
	   min-height:506px;">
 -->
<img id="mapa" src="img/mapa.jpg" class="img-fluid" alt="..."
style="width:678px;
       height:506px;
	    position: relative; ">
 
  

 
</div>
<div class="large-3 cell">

 <?php  
 
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT *
									  	   FROM grifo
										   WHERE id_grifo='.$id_grifo.';');
		    while($row = mysqli_fetch_array($result)){
 
 	  echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	   
      echo '<input type="hidden" name="id_grifo" value='.$row["id_grifo"].' />'; 
 
			 
	  ?>

<p>"De click en el mapa en el lugar que quiera añadir un grifo"</p>
	<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">
	<table style="width:400px">
   <tr>
   <td>
    Nombre: <input type="text" id="nombre" name="nombre" value="<?php echo $row["nombre"]; ?>"Required>
   </td>
  </tr> <tr>
   <td>
    Estado: <input type="text" id="estado" name="estado" value="<?php echo $row["estado"]; ?>"Required>
   </td>
 </tr>
 <tr>
  <td>
   Cordenadas X: <input type="text" id="posx" name="posx" value="<?php echo $row["posx"]; ?>"Required> 
   Cordenadas Y:  <input type="text" id="posy" name="posy" value="<?php echo $row["posy"]; ?>"Required> 
    <?php  
	$posicionoriginalx= $row["posx"];
	$posicionoriginaly= $row["posy"];
	
	?>
	</td>
	
  </tr>
 
  <tr>
	 <td> 
	   <embed class="thumbnail" src="imagenes\<?php
      echo $row["imagen"] ; 
	  ?>" type="image/png" /><?php
	   echo '<input type="file" id="inputImagen" name="ARCHIVO" size="20" class="form-control" placeholder="Imagen" >'; 
	  echo '</td>'; ?>
 </tr>
   </table>
   </br>			
Seleccione la resolución de su pantalla si la posición que eligio previamente no coincidió con lo seleccionado al momento de crear el grifo.
 <select name="resolucion">

<option value='R0' selected>Predeterminado</option> 
<option value='R1'>1024x768->100%</option>
<option value='R2'>1366x768->125%</option>
 
        
</select>

 <center></br><button class="success button" type="submit" name="submitmodificargrifo">Registrar</button>
			<?php  }?>
 
    </form>
 
</div> 
 </div>    
  
 
</div>
		  
 
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

<script>
$(document).ready(function () {//puede comentarse las lineas o poniendo el tamaño 0 si no se quiere que aparezca un punto
      $(mapa).click(function (ev) {
          mouseX = ev.pageX;
          mouseY = ev.pageY
          console.log(mouseX + ' ' + mouseY);  
          document.getElementById("posx").value = mouseX;
		  document.getElementById("posy").value = mouseY;
          var color = '#000000';
          var size = '5px';
          $("body").append(
          $('<div></div>')
              .css('position', 'absolute')
              .css('top', mouseY + 'px')
              .css('left', mouseX + 'px')
              .css('width', size)
              .css('height', size)
              .css('background-color', color));
      });
  });
</script>

 <?php
include("guardar.php");
 
if(isset($_POST['submitmodificargrifo'])){
 
	$campos = array("id_grifo"=> $_POST['id_grifo'] ,
	"nombre"=>$_POST['nombre'],"estado"=>$_POST['estado'],
	"posx"=>$_POST['posx'],"posy"=>$_POST['posy'],
	"descripcion"=>$_POST['descripcion'],"resolucion"=>$_POST['resolucion'] 
	 );  
	
 
 
    $nuevo = new Grifo("tesis"); 
    $nuevo->ModificarGrifo($campos);
}
?>