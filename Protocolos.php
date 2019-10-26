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
                <h4 style="margin: 0;" class="text-center">Protocolos</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
              
<insertar>
<div class="titulo_boton">
  <a style='cursor: pointer;' onClick="muestra_oculta('nuevoprotocolo')" title="" class="success button">Añadir Protocolo</a>
</div>

<div id="nuevoprotocolo">
  <table>
  <thead>
    <tr>
      <th width="100">Nombre</th>
      <th width="350">Descripción</th>
      <th width="100">Registrar</th>
    </tr>
  </thead>
  <tbody>  
    <tr>
	<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">
	
    <td><input type="text" id="inputNombre" name="nombre" class="form-control" placeholder="Escriba el nombre del protocolo" Required >	</td>
    <td><textarea  type="text" id="inputDescripcion" rows="5" cols="55"name="descripcion" class="form-control" placeholder="Escriba la descripción"  Required> </textarea> 	</td>
    <td><button class="success button" type="submit" name="submitprotocolo">Registrar</button></td>
  
    </form>
    </tr>
  </tbody>
</table>
</div>



<script>
function muestra_oculta(id){
if (document.getElementById){  
var el = document.getElementById(id);  
el.style.display = (el.style.display == 'none') ? 'block' : 'none';  
}
}
window.onload = function(){ 
muestra_oculta('nuevoprotocolo'); 
}
</script>
<insertar>

				 
  <table>
  <thead>
    <tr>
      <th width="200">Nombre</th>
	  <th width="400">Descripción</th>
      <th width="50">Modificar</th>
	  <th width="50">Eliminar</th>
    </tr>
  </thead> 
  <tbody>
  <?php  
			$conn = mysqli_connect("localhost","root","","tesis");
			$result = mysqli_query($conn, 'SELECT *
									  	   FROM protocolo
										   WHERE eliminar!="1";');
		    while($row = mysqli_fetch_array($result)){

 echo'<form action="MProtocolos.php" method="post">';	 
 echo '<input type="hidden" name="id_protocolo" value='.$row["id_protocolo"].' />'; 
      echo '<tr>';
	  echo '<td>' ;
	  echo  utf8_encode($row["nombre"]);
	  echo '</td>';

	  echo '<td>' ;
	  echo  utf8_encode($row["descripcion"]);
      echo '</td>';
	   
	  echo '<td>' ;
	   if(isset($_SESSION['usuario'])){ 
     echo'<input type="submit" class="success button"value="Modificar"></input>';
	   }
      echo '</td>';
  echo'</form>';
 
 
  echo'<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
  echo '<input type="hidden" name="id_protocolo" value='.$row["id_protocolo"].' />';
  echo '<td>' ;    
 
  ?>  
  <button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminarprotocolo">Eliminar</button> 
  <?php
  echo '</td>' ;
  echo'</form>';
  echo '</tr>';
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
 
    $campos = array("id_protocolo"=> NULL ,
	"nombre"=>$_POST['nombre'],"descripcion"=>$_POST['descripcion']); 
 
    $nuevo = new GuardarProtocolo("tesis"); 
    $nuevo->NuevoProtocolo($campos);
}
if(isset($_POST['eliminarprotocolo'])){
  
    $campos = array("id_protocolo"=>$_POST['id_protocolo']); 
  
    $nuevo = new GuardarProtocolo("tesis"); 
    $nuevo->EliminarProtocolo($campos);
}
?>
 
 