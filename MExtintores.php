 <?php  
 
 session_start();
 if (!isset($_SESSION['usuario'])){
	echo "<script>
           window.location.replace('index.php');					
		  </script>";
}
 $id_extintor = $_POST["id_extintor"]; 				 
 ?>
 <!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Extintor</title>
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
                <h4 style="margin: 0;" class="text-center">Exintores</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
              
 

				 
  <table>
  <thead>
    <tr>
      <th width="200">Nombre</th>
      <th width="150">Fecha de Carga</th>
	  <th width="150">Fecha de Vencimiento</th>
	  <th width="150">Estado</th>
	  <th width="250">imagen</th>
    </tr>
  </thead> 
  
   
  <tbody>
   
  
  
  <?php  

			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT *
									  	   FROM extintor
										   WHERE id_extintor='.$id_extintor.';');
		    while($row = mysqli_fetch_array($result)){

  
 	  echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	   
      echo '<input type="hidden" name="id_extintor" value='.$row["id_extintor"].' />';
      $id_piso = $row["id_piso"] ; 
	  echo '<tr>';
	  
	  echo '<td>' ;
	  echo '<input type="text" id="nombre"name="nombre" class="form-control" value="'.$row["nombre"].'" Required>';
	  echo '</td>';
	  
	  echo '<td>' ;
	  echo '<input type="date" id="fecha_carga"name="fecha_carga" class="form-control" value="'.$row["fecha_carga"].'" Required>';
	  echo '</td>';
	  
	  echo '<td>' ;
	  echo '<input type="date" id="fecha_venc"name="fecha_venc" class="form-control" value="'.$row["fecha_venc"].'" Required>';
	  echo '</td>';
 
      echo '<td>' ;
	  echo '<input type="text" id="estado"name="estado" class="form-control" value="'.$row["estado"].'" Required>';
	  echo '</td>';
	  
	  
	        	  echo '<td>' ;
 if(!empty($row["imagen"])){
	   ?><embed class="thumbnail" src="imagenes\<?php
      echo $row["imagen"] ; 
	  ?>" type="image/png" /> 
 
	 <?php 
 }
	 echo '<input type="file" id="inputImagen" name="ARCHIVO" size="20" class="form-control" placeholder="Imagen" >';
	 echo '</td>';
	?>  
<table>
<thead>
    <tr>
	  <th width="250">Ubicación (Opcional)</th>
      <th width="250">Comentario (Opcional)</th>
	   <th width="800"> </th>
    </tr>
  </thead> 
  
   
  <tbody>
 	 <td> 
	    <textarea name="ubicacion" type="text"rows="5" cols="55"  Required><?php echo utf8_encode($row['ubicacion']) ?></textarea> 
     </td> 
 	 <td> 
	    <textarea name="comentario" type="text"rows="5" cols="55"  Required><?php echo utf8_encode($row['comentario']) ?></textarea> 
     </td>
	 
	  <td> 
 
     <button onclick="TomarIdPiso()" class="success button" type="submitmodificarextintor" name="submitmodificarextintor">Registrar</button>  
 
   </td> 
	 
 </tbody>
</table>
 <?php
 
      echo '</tr>';
    
				}
				//include("desconexion.php");
		  ?>
 
   
  </tbody>
</table>

 


<?php 
		    $conn = mysqli_connect("localhost","root","","tesis");
			$result = mysqli_query($conn, 'SELECT e.id_edificio
			                               FROM edificio e, piso p 
										   WHERE p.id_piso='.$id_piso.' 
										   AND p.id_edificio=e.id_edificio;');
	 
		       
                   while($row2=mysqli_fetch_assoc($result)) { 
                     $id_edificio2 = $row2["id_edificio"] ; 
                
				    } 
 
			 ?>

  
 <?php 
 
		    $conn = mysqli_connect("localhost","root","","tesis");
			$result = mysqli_query($conn, 'SELECT id_edificio,nombre
			                               FROM edificio ;');
			 	 		   
		         echo' <tr><td><select class="form-control form-control-sm" id="lista1" name="id_edificio">';
                    while($row3=mysqli_fetch_assoc($result)) { 
              
					if( $id_edificio2 == $row3[id_edificio]){
						 echo "<option value='$row3[id_edificio]'Selected> $row3[nombre] </option>";  
					}else{
						 echo "<option value='$row3[id_edificio]'>$row3[nombre]</option>";  
					}	
				 
				    } 
                echo'</td></select>';
		       
			 
			 ?>
		 
			
			 <td><div id="select2lista"></div></td> </tr>
 <input  type="hidden" id="id_piso" name="id_piso" class="form-control"   > 

 
  <?php    echo '</form>';  ?>
		  
		  
		  
		  
		  
                </div>
                </div>
 <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data"> 
 <input type="hidden" name="id_extintor" value="<?php echo $id_extintor ?>"/> 		
 <td><button onclick="return confirm('Quitar Imagen?');"class="alert button" type="submit" name="eliminararchivo1">Quitar imagen</button> </td>
 </form>
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
 
if(isset($_POST['submitmodificarextintor'])){
 
    $campos = array("id_extintor"=> $_POST['id_extintor'] ,
	"nombre"=>$_POST['nombre'],
	"fecha_carga"=>$_POST['fecha_carga'],
    "fecha_venc"=>$_POST['fecha_venc'],
	"ubicacion"=>$_POST['ubicacion'],
	"comentario"=>$_POST['comentario'],
	"estado"=>$_POST['estado'],
	"id_piso"=>$_POST['id_piso']); 
  
    $nuevo = new GuardarExtintor("tesis"); 
    $nuevo->ModificarExtintor($campos);
}
 if(isset($_POST['eliminararchivo1'])){
 
    $campos = array("id_extintor"=> $_POST['id_extintor']);  
 
    $nuevo = new GuardarExtintor("tesis"); 
    $nuevo->EliminarArchivo1($campos);
}
?>
 
 <script>
 $(document).ready(function(){
	 
		recargarLista();
		$('#lista1').change(function(){
			recargarLista();
		});
	})
 
function recargarLista(){
		 var select1 = document.getElementById("lista1");
		 select2=(select1.value);
		 select3= <?php echo $id_piso;  ?>;
         console.log(select2);
		$.ajax({
			type:"POST",
			url:"Mdatos_del_piso.php",
			//data:"id_edificio=" + $('#lista1').val(), 
 
              data: {"id_edificio": select2,"id_piso": select3},
			  
			success:function(r){
				$('#select2lista').html(r);
 
			}
		});
	}
	
	
 
function TomarIdPiso() {
 var select = document.getElementById("lista2");
  console.log(select.value);
 document.getElementById("id_piso").value = select.value;
}
	
	
	
	
	
	
 </script>