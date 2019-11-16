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
    <title>Enfermedades Profesionales</title>
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
                <h4 style="margin: 0;" class="text-center">Enfermedades Profesionales</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
            
 
 	 
  <table id="example">
  <thead>
    <tr>
      <th>Nombre</th>
	  <th>Descripción</th>
	  <th>Modificar</th>
	  <th>Eliminar</th>
    </tr>
  </thead> 
  <tbody>
 
  <?php  
			$conn = mysqli_connect("localhost","root","","tesis");
			$result = mysqli_query($conn, 'SELECT *
									  	   FROM enfermedades_profesionales
										   WHERE eliminar!="1"
										   ;');
 						   
		    while($row = mysqli_fetch_array($result)){
 
      echo '<tr>';
 
	  echo '<td>' ;
	  echo  utf8_encode($row["nombre"]);
	  echo '</td>';

	  echo '<td>' ;
	  echo  utf8_encode($row["descripcion"]);
      echo '</td>'; 
 
 
  echo'<form class="formulario" action="MEnfermedadesProfesionales.php" method="post" id="usrform" enctype="multipart/form-data">';
  echo '<input type="hidden" name="id_enfermedad" value='.$row["id_enfermedad"].' />';
  echo '<td>' ;    
  
  ?>  
  <button  class="success button" type="submit" name="modificarextintor">Modificar</button> 
  <?php
  echo '</td>' ;
  echo'</form>';
 
  echo'<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
  echo '<input type="hidden" name="id_enfermedad" value='.$row["id_enfermedad"].' />';
  echo '<td>' ;    
  
  ?>  
  <button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminarenfermedades">Eliminar</button> 
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
  <a style='cursor: pointer;' onClick="muestra_oculta('nuevoprotocolo')" title="" class="success button">Añadir Enfermedad</a>
</div>

<div id="nuevoprotocolo">
  <table>
  <thead>
    <tr>
      <th width="100">Nombre</th>
      <th width="350">Descripción (Opcional)</th>
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
 
if(isset($_POST['submitprotocolo'])){
 
    $campos = array("id_enfermedad"=> NULL ,
	"nombre"=>$_POST['nombre'],"descripcion"=>$_POST['descripcion']); 
 
    $nuevo = new GuardarEnfermedad("tesis"); 
    $nuevo->NuevaEnfermedad($campos);
}
if(isset($_POST['eliminarenfermedades'])){
  
    $campos = array("id_enfermedad"=>$_POST['id_enfermedad']); 
  
    $nuevo = new GuardarEnfermedad("tesis"); 
    $nuevo->EliminarEnfermedad($campos);
}
 
?>
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
                columns: [0,1]
            }
       },
 
       {
           extend: 'excel',
                      footer: true,
           exportOptions: {
                columns: [0,1]
            }
       }     
		
		
		
        ]  
    } );
} );

</script>