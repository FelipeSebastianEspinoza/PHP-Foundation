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
                <h4 style="margin: 0;" class="text-center">Redes Húmedas</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
              
<insertar>
<div class="titulo_boton">
  <a style='cursor: pointer;' onClick="muestra_extintor('nuevoextintor')" title="" class="success button">Añadir Red Húmeda</a>
</div>

<div id="nuevoextintor">
  <table>
  <thead>
    <tr>
      <th width="150">Seleccione el edificio en el cual se encuentra</th>
      <th width="100">Seleccione el piso en el cual se encuentra</th>
 
    </tr>
  </thead>
  <tbody>  
    <tr>
	<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">
	<?php 
		    $conn = mysqli_connect("localhost","root","","tesis");
			$result = mysqli_query($conn, 'SELECT id_edificio,nombre
			                               FROM edificio ;');
			 				   
		         echo' <tr><td><select class="form-control form-control-sm" id="lista1" name="id_edificio">';
                    while($row=mysqli_fetch_assoc($result)) { 
                        echo "<option value='$row[id_edificio]'>$row[nombre]</option>";  
				    } 
                echo'</td></select>';
			 ?>
		 
			
			 <td><div id="select2lista"></div></td> </tr>
			<table>
  <thead>
    <tr>
      <th width="250">Nombre</th>
	  <th width="250">Estado</th>
      <th width="650">Ubicación</th>
	  <th width="50"></th>
    </tr>
  </thead>
  <tbody>  
    <tr>
	 <input  type="hidden" id="id_piso" name="id_piso" class="form-control"   Required > 

    <td><input type="text" id="inputNombre" name="nombre" class="form-control" placeholder="Escriba el nombre del riesgo" Required ></td>
    
	 
	<td><input type="text" id="inputEstado" name="estado" class="form-control" placeholder="Escriba el estado" Required ></td>
	<td><textarea  type="text" id="inputUbicacion" rows="5" cols="55"name="ubicacion" class="form-control" placeholder="Escriba la descripción"  Required> </textarea> 	</td>
    <td><button onclick="TomarIdPiso()" class="success button" type="submit" name="submitredhumeda"  >Registrar</button></td>
  
 
  
    </form>
    </tr>
  </tbody>
</table>
</div>
 
<insertar>

				 
  <table>
  <thead>
    <tr>
      <th width="300">Nombre</th>
	  <th width="300">Estado</th>
	  <th width="600">Ubicación</th>
      <th width="100"></th>
    </tr>
  </thead> 
  <tbody>
   
  
  
  <?php  
 
			$conn = mysqli_connect("localhost","root","","tesis");
			$result = mysqli_query($conn, 'SELECT *
									  	   FROM red_humeda;');
		    while($row = mysqli_fetch_array($result)){
  
 echo'<form action="MRedHumeda.php" method="post">';	 
 echo '<input type="hidden" name="id_redhumeda" value='.$row["id_redhumeda"].' />'; 
      echo '<tr>';
 
	  
	  echo '<td>' ;
	  echo  utf8_encode($row["nombre"]);
      echo '</td>';
 
	  echo '<td>' ;
	  echo  utf8_encode($row["estado"]);
      echo '</td>';
	  
	  echo '<td>' ;
	  echo  utf8_encode($row["ubicacion"]);
      echo '</td>';
 
	   
	  echo '<td>' ;
	   if(isset($_SESSION['usuario'])){ 
     echo'<input type="submit" class="success button"value="Modificar"></input>';
	   }
      echo '</td>';
 
      echo '</tr>';
 echo'</form>';
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
 
if(isset($_POST['submitredhumeda'])){
 
    $campos = array("id_extintor"=> NULL ,
	"nombre"=>$_POST['nombre'],
	"estado"=>$_POST['estado'],
    "id_piso"=>$_POST['id_piso']); 
 
    $nuevo = new GuardarRedHumeda("tesis"); 
    $nuevo->NuevaRedHumeda($campos);
}
?>
 <script type="text/javascript">
function muestra_extintor(id){
if (document.getElementById){  
var el = document.getElementById(id);  
el.style.display = (el.style.display == 'none') ? 'block' : 'none';  
}
}
window.onload = function(){ 
muestra_extintor('nuevoextintor'); 
 
}
$(document).ready(function(){
		$('#lista1').val(1);
		recargarLista();
		$('#lista1').change(function(){
			recargarLista();
		});
	})
 
function recargarLista(){
		$.ajax({
			type:"POST",
			url:"datos_del_piso.php",
			data:"id_edificio=" + $('#lista1').val(),
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
 