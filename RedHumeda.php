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
    <title>Redes Húmedas</title>
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
                <h4 style="margin: 0;" class="text-center">Redes Húmedas</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
            
 
 
  <table id="example">
  <thead>
    <tr>
      <th>Nombre</th>
	  <th>Estado</th>
	  <th>Edificio</th>
	  <th>Ubicación</th>
      <th>Imagen</th>
      <th width="50">Modificar</th>
      <th width="50">Eliminar</th>
    </tr>
  </thead> 
  <tbody>
 
  <?php  
			$conn = mysqli_connect("localhost","root","","tesis");
			$result = mysqli_query($conn, 'SELECT r.id_redhumeda,r.nombre,r.estado,r.id_piso,r.ubicacion,r.imagen,
			                                      p.id_piso,p.id_edificio,
												  e.id_edificio,e.nombre AS nombre2
									  	   FROM red_humeda r,piso p,edificio e
										   WHERE r.id_piso=p.id_piso
										   AND r.eliminar!="1" 
										   AND p.id_edificio=e.id_edificio  
										   ;');
 						   
										   
		    while($row = mysqli_fetch_array($result)){

            echo '<tr>';
 
	        echo '<td>' ;
	        echo utf8_encode($row["nombre"]);
            echo '</td>';
	        echo '<td>' ;
	        echo utf8_encode($row["estado"]);
            echo '</td>';
	        echo '<td>' ;
	        echo utf8_encode($row["nombre2"]);
            echo '</td>';
            echo '<td>' ;
	        echo utf8_encode($row["ubicacion"]);
            echo '</td>';
			
		?>	
        <td>
		<?php    
 		if(!empty($row["imagen"])){
		?>	
		<a href="javascript:void(0);" NAME="Error Handling"  title="Imagen" onClick=window.open("imagenes/<?php echo $row["imagen"] ;?>","Ratting","width=450,height=450,left=400,top=100,toolbar=0,status=0,");><img src="img/imagen.png" alt="Archivo" border="0"style="width:30px;height:30px; "/></a>
		<?php	
		}else{
        ?> 
        <button type="" name=""><img src="img/sincarpeta.png" alt="" style="width:30px;height:30px; "></button>
        <?php
		} 
		?>
		</td>
	    <?php

            echo '<form class="formulario" action="MRedHumeda.php" method="post" id="usrform" enctype="multipart/form-data">';
            echo '<input type="hidden" name="id_redhumeda" value='.$row["id_redhumeda"].' />';
            echo '<input type="hidden" name="id_edificio" value='.$row["id_edificio"].' />';
            echo '<td>' ;    
            ?>  
            <button  class="success button" type="submit" name="modificaraccidente">Modificar</button> 
            <?php
            echo '</td>' ;
            echo '</form>';
 
            echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
            echo '<input type="hidden" name="id_redhumeda" value='.$row["id_redhumeda"].' />';
            echo '<input type="hidden" name="id_edificio" value='.$row["id_edificio"].' />';
            echo '<td>';
			
            ?>  
            <button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminarredhumeda">Eliminar</button> 
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
      <th width="250">Imagen (Opcional)</th>
	  <th width="250">Estado</th>
      <th width="650">Ubicación (Opcional)</th>
	  <th width="50"></th>
    </tr>
  </thead>
  <tbody>  
    <tr>
	 <input  type="hidden" id="id_piso" name="id_piso" class="form-control"   Required > 

    <td><input type="text" id="inputNombre" name="nombre" class="form-control" placeholder="Escriba el nombre del riesgo" Required ></td>
    <td><input type="file" id="inputImagen" name="ARCHIVO" size="20" class="form-control" placeholder="Imagen"  > </td>
	<td><input type="text" id="inputEstado" name="estado" class="form-control" placeholder="Escriba el estado" Required ></td>
	<td><textarea  type="text" id="inputUbicacion" rows="5" cols="55"name="ubicacion" class="form-control" placeholder="Escriba la descripción"  > </textarea> 	</td>
    <td><button onclick="TomarIdPiso()" class="success button" type="submit" name="submitredhumeda"  >Registrar</button></td>
  
 
  
    </form>
    </tr>
  </tbody>
</table>
</div>
 
<insertar>
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
   
   
 
   
   <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.20/css/jquery.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="datatables/Buttons-1.6.1/css/buttons.dataTables.css"/>
 


<script type="text/javascript" src="datatables/JSZip-2.5.0/jszip.js"></script>
<script type="text/javascript" src="datatables/pdfmake-0.1.36/pdfmake.js"></script>
<script type="text/javascript" src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="datatables/DataTables-1.10.20/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="datatables/Buttons-1.6.1/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="datatables/Buttons-1.6.1/js/buttons.html5.js"></script>
   
 
   
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
if(isset($_POST['eliminarredhumeda'])){
  
    $campos = array("id_redhumeda"=>$_POST['id_redhumeda']); 
  
    $nuevo = new GuardarRedHumeda("tesis"); 
    $nuevo->EliminarRedHumeda($campos);
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
     <script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
		
        // 'pdfHtml5','excelHtml5'
		{
           extend: 'pdf',
           footer: true,
           exportOptions: {
                columns: [0,1,2,3]
            }
       },
 
       {
           extend: 'excel',
                      footer: true,
           exportOptions: {
                columns: [0,1,2,3]
            }
       }     
		
		
		
        ]  
    } );
} );

</script>