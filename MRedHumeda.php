 <?php  
 
 session_start();
 if (!isset($_SESSION['usuario'])){
	echo "<script>
           window.location.replace('index.php');					
		  </script>";
}
 $id_redhumeda = $_POST["id_redhumeda"]; 				 
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
                <h4 style="margin: 0;" class="text-center">Red Húmeda</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
              
 

				 
  <table>
  <thead>
    <tr>
      <th width="300">Nombre</th>
	  <th width="300">Estado</th>
	  <th width="300">Imagen (Opcional)</th>
 
      <th width="600">Ubicación (Opcional)</th>
      <th width="100"></th>
    </tr>
  </thead> 
  
   
  <tbody>
   
  
  
  <?php  

			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT *
									  	   FROM red_humeda
										   WHERE id_redhumeda='.$id_redhumeda.';');
		    while($row = mysqli_fetch_array($result)){

  
 	  echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	   
      echo '<input type="hidden" name="id_redhumeda" value='.$row["id_redhumeda"].' />';
      $id_piso = $row["id_piso"] ; 
	  echo '<tr>';
	  
	  echo '<td>' ;
	  echo '<input type="text" id="nombre"name="nombre" class="form-control" value="'.$row["nombre"].'" Required>';
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
	 
 
  
	  echo '<td>' ;
	   ?> <textarea name="ubicacion" type="text"rows="5" cols="55"  Required><?php echo utf8_encode($row['ubicacion']) ?></textarea><?php
      echo '</td>';
	  
 
	  
	  echo '<td>' ;
 
      echo'<button onclick="TomarIdPiso()" class="success button" type="modificarredhumeda" name="modificarredhumeda">Registrar</button> ';
 
      echo '</td>';
 
      echo '</tr>';
    
				}
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
						 echo "<option value='$row3[id_edificio]'Selected>$row3[nombre]</option>";  
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
 <input type="hidden" name="id_redhumeda" value="<?php echo $id_redhumeda ?>"/> 		
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
 
if(isset($_POST['modificarredhumeda'])){
 
    $campos = array("id_redhumeda"=> $_POST['id_redhumeda'] ,
	"nombre"=>$_POST['nombre'],
	"ubicacion"=>$_POST['ubicacion'],
	"estado"=>$_POST['estado'],
	"id_piso"=>$_POST['id_piso']); 
 
    $nuevo = new GuardarRedHumeda("tesis");  
    $nuevo->ModificarRedHumeda($campos);
}
 if(isset($_POST['eliminararchivo1'])){
 
    $campos = array("id_redhumeda"=> $_POST['id_redhumeda']);  
 
    $nuevo = new GuardarRedHumeda("tesis"); 
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