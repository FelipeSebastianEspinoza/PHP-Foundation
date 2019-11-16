 <?php  
 
 session_start();
 if (!isset($_SESSION['usuario'])){
	echo "<script>
           window.location.replace('index.php');					
		  </script>";
}
  
 $id_unidad = $_POST["id_unidad"];
 
 ?>
 <!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unidad de Análisis</title> 
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
                <h4 style="margin: 0;" class="text-center">Unidad de Análisis</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
 		 
  <table>
  <thead>
    <tr>
      <th>Nombre</th>
	  <th>Estado del Protocolo</th>
      <th>Fecha Actualización</th>
      <th>Descripción</th>
	  <th> </th>
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
	  echo '<input type="hidden" name="id_protocolo" value='.$row["id_protocolo"].' />'; 
	  echo '<tr>';

	  echo '<td>';
	  echo '<input type="text" id="nombre" name="nombre" class="form-control" value="'.$row["nombre"].'" Required>';
	  echo '</td>';
 
	  echo '<td>';
	  echo '<input type="text" id="estado"name="estado" class="form-control" value="'.$row["estado"].'" Required>';
	  echo '</td>';
	  
	  echo '<td>' ;
	  echo '<input type="date" id="fecha_act"name="fecha_act" class="form-control" value="'.$row["fecha_act"].'" Required>';
	  echo '</td>';
 
	  echo '<td>' ;
	   ?> <textarea name="descripcion" type="text"rows="5" cols="55"  Required><?php echo utf8_encode($row['descripcion']) ?></textarea><?php
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
  
  
  
  
  
   <caption>Subir nuevo archivo</caption>
<tr>  
 <td width="140px"></td>
 <td width="120px"  >Nombre: (Opcional)</td>
  <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">
  	<?php  
	  echo '<td width="320px">';
	  echo '<input type="text" id="nombre" name="nombre" class="form-control" value=""  >';
	  echo '</td>';  
	?>
	 
  
 <input type="hidden" name="id_unidad" value="<?php echo $id_unidad ?>"/> 	
 <td><input type="file" id="inputImagen" name="ARCHIVO" size="20" class="form-control" placeholder="Imagen" Required> </td>
 <td><button class="success button" type="" name="submitarchivo1">Subir</button></td> 
 </form>
</tr>  
 
  </tbody>
</table>
 
 
 
<?php
 $result = mysqli_query($conn, 'SELECT *
							    FROM unidad_anexos
								WHERE id_unidad='.$id_unidad.';');
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
        <input type="hidden" name="id_unidad_anexos" value="<?php echo $row["id_unidad_anexos"] ?>"/> 		
        <input type="hidden" name="id_unidad" value="<?php echo $id_unidad?>"/>
		<td><button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminararchivo1">Eliminar</button> </td>
        </form>
		<?php	
		}else{
        ?> 
		<td></td>
		<?php
		} 
		?>
 <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data"> 
 <input type="hidden" name="id_unidad_anexos" value="<?php echo $row["id_unidad_anexos"]?> "/>
 <input type="hidden" name="id_unidad" value="<?php echo $id_unidad ?> "/> 	
 <td><input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo  utf8_encode($row["nombre"]); ?>"  > </td>  
 <td><input type="file" id="inputImagen" name="ARCHIVO" size="20" class="form-control" placeholder="Imagen" > </td>
 <td><button class="success button" type="" name="submitarchivomodificar">Actualizar</button></td> 
 </form>
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
 
    $campos = array("id_unidad"=> $_POST['id_unidad'],
    "nombre"=> $_POST['nombre'],
    "fecha_act"=> $_POST['fecha_act'],
    "descripcion"=> $_POST['descripcion'],
    "estado"=> $_POST['estado'],
	"id_protocolo"=>$_POST['id_protocolo']); 
 
    $nuevo = new GuardarUnidad("tesis"); 
    $nuevo->ModificarUnidad($campos);
}



if(isset($_POST['submitarchivo1'])){
 
    $campos = array("id_unidad"=> $_POST['id_unidad'],
	"nombre"=> $_POST['nombre'],
	);  
 
    $nuevo = new GuardarUnidad("tesis"); 
    $nuevo->Archivo1($campos);
}
if(isset($_POST['submitarchivomodificar'])){
 
    $campos = array("id_unidad"=> $_POST['id_unidad'],"id_unidad_anexos"=> $_POST['id_unidad_anexos'],
    "nombre"=> $_POST['nombre'] ); 
 
    $nuevo = new GuardarUnidad("tesis"); 
    $nuevo-> Archivo2($campos);
 
}
if(isset($_POST['eliminararchivo1'])){
 
     $campos = array("id_unidad"=> $_POST['id_unidad'],
	 "id_unidad_anexos"=> $_POST['id_unidad_anexos']); 
 
    $nuevo = new GuardarUnidad("tesis"); 
    $nuevo->EliminarArchivo1($campos);
}
 
?>