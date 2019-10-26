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
                <h4 style="margin: 0;" class="text-center">Extintores</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
              
<insertar>
<div class="titulo_boton">
  <a style='cursor: pointer;' onClick="muestra_extintor('nuevoextintor')" title="" class="success button">Añadir Extintor</a>
</div>

<div id="nuevoextintor">
  <table>
  <thead>
    <tr>
      <th width="150">Seleccione el edificio en el cual está el extintor</th>
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
      <th width="150">Nombre</th>
      <th width="100">Fecha de Carga</th>
      <th width="100">Fecha de Vencimiento</th>
      <th width="600">Ubicación</th>
      <th width="150">Estado</th>
    </tr>
  </thead>
  <tbody>  
    <tr>
	 <input  type="hidden" id="id_piso" name="id_piso" class="form-control"   Required > 
    <td><input type="text" id="inputNombre" name="nombre" class="form-control" placeholder="Escriba el nombre del riesgo" Required ></td>
    <td><input type="date" id="inputFechaCarga" name="fecha_carga" class="form-control"  Required ></td>
    <td><input type="date" id="inputFechaVenc" name="fecha_venc" class="form-control"  Required ></td>
	<td><textarea  type="text" id="inputUbicacion" rows="5" cols="55"name="ubicacion" class="form-control" placeholder="Escriba la descripción"  Required> </textarea> 	</td>
	<td><input type="text" id="inputEstado" name="estado" class="form-control" placeholder="Escriba el estado" Required ></td>
    <td><button onclick="TomarIdPiso()" class="success button" type="submit" name="submitextintor"  >Registrar</button></td>
    </form>
    </tr>
  </tbody>
</table>
</div>
 
<insertar>
 			 
  <table>
  <thead>
    <tr>
      <th width="200">Nombre</th>
	  <th width="200">Fecha de Carga</th>
	  <th width="200">Fecha Vencimiento</th>
	  <th width="300">Ubicación</th>
	  <th width="300">Edificio</th>
	  <th width="200">Estado</th>
	  <th width="50">Modificar</th>
	  <th width="50">Eliminar</th>
    </tr>
  </thead> 
  <tbody>
 
  <?php  
			$conn = mysqli_connect("localhost","root","","tesis");
			$result = mysqli_query($conn, 'SELECT x.id_extintor,x.nombre,x.fecha_carga,x.fecha_venc,x.ubicacion,x.estado,x.id_piso,
			                                      e.id_edificio,e.nombre AS nombre2,p.id_piso,p.id_edificio
									  	   FROM extintor x,edificio e,piso p
										   WHERE x.id_piso=p.id_piso 
										   AND eliminar!="1"
										   AND  p.id_edificio=e.id_edificio 
										   ;');
 						   
										   
		    while($row = mysqli_fetch_array($result)){
  
 echo'<form action="MExtintores.php" method="post">';	 
 echo '<input type="hidden" name="id_extintor" value='.$row["id_extintor"].' />'; 
      echo '<tr>';
 
	  echo '<td>' ;
	  echo  utf8_encode($row["nombre"]);
      echo '</td>';
	  echo '<td>' ;
	// echo  utf8_encode($row["fecha_carga"]); 
	  $date=date_create($row["fecha_carga"]);
	  echo date_format($date,"d/m/Y") ;
      echo '</td>';
	  echo '<td>' ;
	 // echo  utf8_encode($row["fecha_venc"]);
	  $date=date_create($row["fecha_venc"]);
	  echo date_format($date,"d/m/Y") ;
      echo '</td>';
	  echo '<td>' ;
	  echo  utf8_encode($row["ubicacion"]);
      echo '</td>';
	  echo '<td>' ;
	  echo  utf8_encode($row["nombre2"]);
      echo '</td>';
	  echo '<td>' ;
	  echo  utf8_encode($row["estado"]);
      echo '</td>';
	   
	  echo '<td>' ;
	   if(isset($_SESSION['usuario'])){ 
     echo'<input type="submit" class="success button"value="Modificar"></input>';
	   }
      echo '</td>';
      echo'</form>';
 
 
  echo'<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
  echo '<input type="hidden" name="id_extintor" value='.$row["id_extintor"].' />';
  echo '<td>' ;    
  
  ?>  
  <button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminarextintor">Eliminar</button> 
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
 
if(isset($_POST['submitextintor'])){
 
    $campos = array("id_extintor"=> NULL ,
	"nombre"=>$_POST['nombre'],
    "fecha_carga"=>$_POST['fecha_carga'],
    "fecha_venc"=>$_POST['fecha_venc'],
    "id_piso"=>$_POST['id_piso']); 
 
    $nuevo = new GuardarExtintor("tesis"); 
    $nuevo->NuevoExtintor($campos);
}
if(isset($_POST['eliminarextintor'])){
  
    $campos = array("id_extintor"=>$_POST['id_extintor']); 
  
    $nuevo = new GuardarExtintor("tesis"); 
    $nuevo->EliminarExtintor($campos);
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
 