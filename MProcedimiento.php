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
    <title>Procedimiento</title>
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
                <h4 style="margin: 0;" class="text-center">Procedimiento</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
 
 
  <?php  
 
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT *
									  	   FROM procedimiento
										   WHERE id_procedimiento='.$id_procedimiento.';');
		    while($row = mysqli_fetch_array($result)){
 
 	  echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	   
      echo '<input type="hidden" name="id_procedimiento" value='.$row["id_procedimiento"].' />'; 
	  echo '<input type="hidden" name="id_edificio" value='.$row["id_edificio"].' />'; 
			 
	  ?>
	 
  
 
 <table>
<thead>
 <tr>
  <th>Nombre</th>
  <th>Archivo (Opcional)</th>
  <th>Nombre del Archivo (Opcional)</th>
  <th>Descripción (Opcional)</th>
  <th width="100">Registrar</th>
 </tr>
</thead>
<tbody>  
 <tr>
 <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">
 <input type="hidden" name="id_historialyarchivos" value="<?php echo $id_historialyarchivos ?>"/>
 <input type="hidden" name="id_edificio" value="<?php echo $id_edificio ?>"/> 

 
 <td><input type="text" id="inputNombre" name="titulo" class="form-control" value="<?php echo utf8_encode($row['titulo']) ?>" Required ></td>
 <td><input type="file" id="inputImagen" name="ARCHIVO" size="20" class="form-control" placeholder="Imagen" > </td>
 <td><input type="text" id="inputNombreArchivo" name="nombre_de_archivo" class="form-control" value="<?php echo utf8_encode($row['nombre_de_archivo']) ?>"   ></td>
 <td><textarea  type="text" id="inputDescripcion" rows="5" cols="55"name="descripcion" class="form-control" placeholder="Escriba la descripción"  Required><?php echo utf8_encode($row['descripcion']) ?></textarea> 	</td>
 <td><button class="success button" type="submit" name="submitprocedimiento">Registrar</button></td>
 </form>
 </tr>
</tbody>
</table>
 
 <?php } ?>
 
 
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
 
if(isset($_POST['submitprocedimiento'])){
 
    $campos = array("id_procedimiento"=> $_POST['id_procedimiento']  
	 ,"nombre_de_archivo"=>$_POST['nombre_de_archivo']
	,"titulo"=>$_POST['titulo'],"descripcion"=>$_POST['descripcion']
	,"id_edificio"=>$_POST['id_edificio'] ); 
 
    $nuevo = new GuardarProcedimiento("tesis"); 
    $nuevo->ModificarProcedimiento($campos);
}
 
?>
 
 