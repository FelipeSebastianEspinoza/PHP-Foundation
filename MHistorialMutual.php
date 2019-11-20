 <?php  
 session_start();
 if (!isset($_SESSION['usuario'])){
	echo "<script>
           window.location.replace('index.php');					
		  </script>";
}
 $id_historialmutual = $_POST["id_historialmutual"];
 
 ?>
 <!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial Mutual</title> 
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
                <h4 style="margin: 0;" class="text-center">Historial Mutual</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
 		 
  <table>
  <thead>
    <tr>
      <th>Nombre</th>
	  <th>Fecha</th>
      <th>Archivo (Opcional)</th>
	  <th>Descripción (Opcional)</th>
	  <th>Estado (Opcional)</th>
	  <th> </th>
    </tr>
  </thead> 
  <tbody>
 
  <?php  
 
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT *
									  	   FROM historialmutual
										   WHERE id_historialmutual='.$id_historialmutual.';');
		    while($row = mysqli_fetch_array($result)){

       
 	  echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	   
      echo '<input type="hidden" name="id_historialmutual" value='.$id_historialmutual.' />';
	  
	  echo '<tr>';

	  echo '<td>';
	  echo '<input type="text" id="nombre" name="titulo" class="form-control" value="'.$row["titulo"].'" Required>';
	  echo '</td>';
 
	  echo '<td>' ;
	  echo '<input type="date" id="fecha"name="fecha" class="form-control" value="'.$row["fecha"].'" Required>';
	  echo '</td>';
	  
 	  echo '<td>' ;
      echo '<input type="file" id="inputImagen" name="ARCHIVO" size="20" class="form-control" placeholder="Imagen" >';
      echo '</td>';
 
	  echo '<td>' ;
	   ?> <textarea name="descripcion" type="text"rows="5" cols="55"   ><?php echo utf8_encode($row['descripcion']) ?></textarea><?php
      echo '</td>';
	  
	  echo '<td>';
	  echo '<input type="text" id="estado" name="estado" class="form-control" value="'.$row["estado"].'"  >';
	  echo '</td>';
 
	  echo '<td>' ;
      echo'<button class="success button" type="submit" name="submitmodificarriesgo">Registrar</button> ';
      echo '</td>';
 
      echo '</tr>';
      echo '</form>';
				}
		  ?>
 
  </tbody>
</table>



<table>
  <tbody> 
  
  
  
  
  
 
 
 
<?php
 $result = mysqli_query($conn, 'SELECT *
							    FROM historialmutual
								WHERE id_historialmutual='.$id_historialmutual.';');
		    while($row = mysqli_fetch_array($result)){ 
?>
 
<table>
  <tbody> 
 
<tr>  
 
        <td>
		<?php    
 		if(!empty($row["archivo"])){
		?>	
	 	<a href="pdf/<?php  echo $row["archivo"] ;?>" target="_blank"><img src="img/carpeta.png" alt="Archivo" style="width:42px;height:42px; " border="0"/></a>
		<?php	
		}else{
        ?> 
        <button type="" name=""><img src="img/sincarpeta.png" alt="" style="width:42px;height:42px; "></button>
        <?php
		} 
		?>
		</td>
	    <?php if(!empty($row["archivo"])){	?>
        <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data"> 
        <input type="hidden" name="id_historialmutual" value="<?php echo $row["id_historialmutual"] ?>"/> 		
 
		<td><button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminararchivo1">Eliminar Archivo</button> </td>
        </form>
		<?php	
		}else{
        ?> 
		<td></td>
		<?php
		} 
		?>
 
</tr>  
 
  </tbody>
</table>
			<?php  } ?>
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
 
if(isset($_POST['submitmodificarriesgo'])){
 
    $campos = array("id_historialmutual"=> $_POST['id_historialmutual'],
    "titulo"=> $_POST['titulo'],
    "fecha"=> $_POST['fecha'],
    "descripcion"=> $_POST['descripcion'],
	"estado"=> $_POST['estado']); 
 
    $nuevo = new GuardarHistorialMutual("tesis"); 
    $nuevo->ModificarArchivoMutual($campos);
}

 
if(isset($_POST['eliminararchivo1'])){
 
     $campos = array("id_historialmutual"=> $_POST['id_historialmutual'] 
	  ); 
 
    $nuevo = new GuardarHistorialMutual("tesis"); 
    $nuevo->EliminarArchivoMutual($campos); 
}
 
?>