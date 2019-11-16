  <?php  
 
 session_start();
 if (!isset($_SESSION['usuario'])){
	echo "<script>
           window.location.replace('index.php');					
		  </script>";
}
  
 $id_accidente = $_POST["id_accidente"];
 if(!empty($_POST['id_edificio'])) { 
 $id_edificio2 = $_POST["id_edificio"];
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
                <h4 style="margin: 0;" class="text-center">Accidentes</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
              
 

				 
  <table>
  <thead>
    <tr>
      <th width="100">Fecha</th>
      <th width="100">Tipo</th>
	  <th width="100">Número</th>
      <th width="200">Persona</th>
      <th width="400">Descripción</th>
      <th width="150">Edificio</th>
	  <th width="150"> </th>
    </tr>
  </thead> 
  
   
  <tbody>
   
  
  
  <?php  
 
	
	
	
	
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT *
									  	   FROM accidente
										   WHERE id_accidente='.$id_accidente.';');
		    while($row = mysqli_fetch_array($result)){

       
 	  echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	   
      echo '<input type="hidden" name="id_accidente" value='.$row["id_accidente"].' />'; 
	  echo '<tr>';
	  
	  echo '<td>' ;
	  echo '<input type="date" id="fecha"name="fecha" class="form-control" value="'.$row["fecha"].'" Required>';
	  echo '</td>';
	  
	  echo '<td>';
	  echo '<input type="text" id="tipo"name="tipo" class="form-control" value="'.$row["tipo"].'" Required>';
	  echo '</td>';
	  
	  echo '<td>';
	  echo '<input type="text" id="numero"name="numero" class="form-control" value="'.$row["numero"].'" Required>';
	  echo '</td>';
	  
	  echo '<td>';
	  echo '<input type="text" id="persona"name="persona" class="form-control" value="'.$row["persona"].'" Required>';
	  echo '</td>';
	  
	  echo '<td>' ;
	   ?> <textarea name="descripcion" type="text"rows="5" cols="55"  Required><?php echo utf8_encode($row['descripcion']) ?></textarea><?php
      echo '</td>';
	   
	   
 
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
 
	   
	  echo '<td>' ;
      echo'<button class="success button" type="submit" name="submitmodificarriesgo">Registrar</button> ';
      echo '</td>';
 
      echo '</tr>';
      echo '</form>';
				}
		  ?>
 
   
  </tbody>
</table>

<?php
 $result = mysqli_query($conn, 'SELECT *
									  	   FROM accidente
										   WHERE id_accidente='.$id_accidente.';');
		    while($row = mysqli_fetch_array($result)){ 
?>
<table>
  <tbody> 
<tr>  
  
 <td>Diat</td>
        <td>
		<?php    
 		if(!empty($row["archivo1"])){
		?>	
	 	<a href="pdf/<?php  echo $row["archivo1"] ;?>" target="_blank"><img src="img/carpeta.png" alt="Archivo" style="width:42px;height:42px; " border="0"/></a>
		<?php	
		}else{
        ?> 
        <button type="" name=""><img src="img/sincarpeta.png" alt="" style="width:42px;height:42px; "></button>
        <?php
		} 
		?>
		</td>
	    <?php if(!empty($row["archivo1"])){	?>
 <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data"> 
 <input type="hidden" name="id_accidente" value="<?php echo $id_accidente ?>"/> 		
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
 <input type="hidden" name="id_accidente" value="<?php echo $id_accidente ?>"/> 	
 <td><input type="file" id="inputImagen" name="ARCHIVO" size="20" class="form-control" placeholder="Imagen" Required> </td>
 <td><button class="success button" type="" name="submitarchivo1">Subir</button></td> 
 </form>
</tr>  
<tr>  
 <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data"> 
 <input type="hidden" name="id_accidente" value="<?php echo $id_accidente ?>"/>  
 <td>Investigación</td>
        <td>
		<?php    
 		if(!empty($row["archivo2"])){
		?>	
	 	<a href="pdf/<?php  echo $row["archivo2"] ;?>" target="_blank"><img src="img/carpeta.png" alt="Archivo" style="width:42px;height:42px; " border="0"/></a>
		<?php	
		}else{
        ?> 
        <button type="" name=""><img src="img/sincarpeta.png" alt="" style="width:42px;height:42px; "></button>
        <?php
		} 
		?>
		</td>
	    <?php if(!empty($row["archivo2"])){	?>	
 <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data"> 
 <input type="hidden" name="id_accidente" value="<?php echo $id_accidente ?>"/> 
       <td><button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminararchivo2">Eliminar</button> </td>
 </form>
		<?php	
		}else{
        ?> 
		<td></td>
		<?php
		} 
		?>
 <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data"> 
 <input type="hidden" name="id_accidente" value="<?php echo $id_accidente ?>"/> 
 <td><input type="file" id="inputImagen" name="ARCHIVO" size="20" class="form-control" placeholder="Imagen" Required> </td>
 <td><button class="success button" type="" name="submitarchivo2">Subir</button></td> 
 </form>
</tr> 
<tr>  
 <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data"> 
 <input type="hidden" name="id_accidente" value="<?php echo $id_accidente ?>"/>  
 <td>Investigación</td>
        <td>
		<?php    
 		if(!empty($row["archivo3"])){
		?>	
	 	<a href="pdf/<?php  echo $row["archivo3"] ;?>" target="_blank"><img src="img/carpeta.png" alt="Archivo" style="width:42px;height:42px; " border="0"/></a>
		<?php	
		}else{
        ?> 
        <button type="" name=""><img src="img/sincarpeta.png" alt="" style="width:42px;height:42px; "></button>
        <?php
		} 
		?>
		</td>
	    <?php if(!empty($row["archivo3"])){	?>	
 <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data"> 
 <input type="hidden" name="id_accidente" value="<?php echo $id_accidente ?>"/> 
       <td><button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminararchivo3">Eliminar</button> </td>
</form>
		<?php	
		}else{
        ?> 
		<td></td>
		<?php
		} 
		?>
 <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data"> 
 <input type="hidden" name="id_accidente" value="<?php echo $id_accidente ?>"/> 	
 <td><input type="file" id="inputImagen" name="ARCHIVO" size="20" class="form-control" placeholder="Imagen" Required> </td>
 <td><button class="success button" type="" name="submitarchivo3">Subir</button></td> 
 </form>
</tr>
<tr>  
 <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data"> 
 <input type="hidden" name="id_accidente" value="<?php echo $id_accidente ?>"/>  
 <td>Investigación</td>
        <td>
		<?php    
 		if(!empty($row["archivo4"])){
		?>	
	 	<a href="pdf/<?php  echo $row["archivo4"] ;?>" target="_blank"><img src="img/carpeta.png" alt="Archivo" style="width:42px;height:42px; " border="0"/></a>
		<?php	
		}else{
        ?> 
        <button type="" name=""><img src="img/sincarpeta.png" alt="" style="width:42px;height:42px; "></button>
        <?php
		} 
		?>
		</td>
	    <?php if(!empty($row["archivo4"])){	?>	
 <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data"> 
 <input type="hidden" name="id_accidente" value="<?php echo $id_accidente ?>"/> 
       <td><button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminararchivo4">Eliminar</button> </td>
</form> 
		<?php	
		}else{
        ?> 
		<td></td>
		<?php
		} 
		?>
 <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data"> 
 <input type="hidden" name="id_accidente" value="<?php echo $id_accidente ?>"/> 
 <td><input type="file" id="inputImagen" name="ARCHIVO" size="20" class="form-control" placeholder="Imagen" Required> </td>
 <td><button class="success button" type="" name="submitarchivo4">Subir</button></td> 
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
 
    $campos = array("id_accidente"=> $_POST['id_accidente'] ,
	"fecha"=>$_POST['fecha'],
	"tipo"=>$_POST['tipo'],
	"numero"=>$_POST['numero'],
	"persona"=>$_POST['persona'],
	"descripcion"=>$_POST['descripcion'],
	"id_edificio"=>$_POST['id_edificio']); 
 
    $nuevo = new GuardarAccidente("tesis"); 
    $nuevo->ModificarAccidente($campos);
}
if(isset($_POST['submitarchivo1'])){
 
    $campos = array("id_accidente"=> $_POST['id_accidente'],"id_edificio"=>$_POST['id_edificio']);  
 
    $nuevo = new GuardarAccidente("tesis"); 
    $nuevo->Archivo1($campos);
}

if(isset($_POST['submitarchivo2'])){
 
    $campos = array("id_accidente"=> $_POST['id_accidente'],"id_edificio"=>$_POST['id_edificio']);  
 
    $nuevo = new GuardarAccidente("tesis"); 
    $nuevo->Archivo2($campos);
}

if(isset($_POST['submitarchivo3'])){
 
    $campos = array("id_accidente"=> $_POST['id_accidente'],"id_edificio"=>$_POST['id_edificio']);  
 
    $nuevo = new GuardarAccidente("tesis"); 
    $nuevo->Archivo3($campos);
}

if(isset($_POST['submitarchivo4'])){
 
    $campos = array("id_accidente"=> $_POST['id_accidente'],"id_edificio"=>$_POST['id_edificio']);  
 
    $nuevo = new GuardarAccidente("tesis"); 
    $nuevo->Archivo4($campos);
}
if(isset($_POST['eliminararchivo1'])){
 
    $campos = array("id_accidente"=> $_POST['id_accidente'],"id_edificio"=>$_POST['id_edificio']);  
 
    $nuevo = new GuardarAccidente("tesis"); 
    $nuevo->EliminarArchivo1($campos);
}
if(isset($_POST['eliminararchivo2'])){
 
    $campos = array("id_accidente"=> $_POST['id_accidente'],"id_edificio"=>$_POST['id_edificio']);  
 
    $nuevo = new GuardarAccidente("tesis"); 
    $nuevo->EliminarArchivo2($campos);
}
if(isset($_POST['eliminararchivo3'])){
 
    $campos = array("id_accidente"=> $_POST['id_accidente'],"id_edificio"=>$_POST['id_edificio']);  
 
    $nuevo = new GuardarAccidente("tesis"); 
    $nuevo->EliminarArchivo3($campos);
}
if(isset($_POST['eliminararchivo4'])){
 
    $campos = array("id_accidente"=> $_POST['id_accidente'],"id_edificio"=>$_POST['id_edificio']);  
 
    $nuevo = new GuardarAccidente("tesis"); 
    $nuevo->EliminarArchivo4($campos);
}
?>
 
 