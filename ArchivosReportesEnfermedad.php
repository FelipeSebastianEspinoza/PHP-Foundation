  <?php  
 session_start();
if (!isset($_SESSION['usuario'])){
	echo "<script>
           window.location.replace('index.php');					
		  </script>";
}	
 if (isset($_SESSION['usuario'])){
if(!empty($_POST['id_enfermedad_reportada'])) { 
$id_enfermedad_reportada=$_POST['id_enfermedad_reportada'];	
$_SESSION['id_enfermedad_reportada']=$_POST['id_enfermedad_reportada'];
}else{
	 $_POST['id_enfermedad_reportada']=$_SESSION['id_enfermedad_reportada'];
     $id_enfermedad_reportada=$_POST['id_enfermedad_reportada'];
}
}else{
	$id_enfermedad_reportada=$_POST['id_enfermedad_reportada'];
}  
	
 ?>
 
 <!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivos y Reportes</title>
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
                <h4 style="margin: 0;" class="text-center">Archivos y Reportes</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
 
<tabla>
<?php  
$conn = mysqli_connect("localhost","root","","tesis");
$result = mysqli_query($conn, 'SELECT *
                               FROM historialyarchivos  
                               WHERE id_enfermedad_reportada='.$id_enfermedad_reportada.'
                               AND eliminar!="1" ;');
while($row = mysqli_fetch_array($result)){
?>	
 <table>
  <thead>
    <tr>
      <th>
    <?php 
	  $date = date_create($row["fecha"]);
	   ?><p><?php
	  echo "  Fecha " . date_format($date,"d/m/Y") ;  
	   ?></p><?php
	   echo  utf8_encode($row["titulo"]); 
    ?>	
	  </th>
	  <th width="10px">
	  
	<?php  
	  echo'<form class="formulario" action="MArchivosReportesEnfermedad.php" method="post" id="usrform" enctype="multipart/form-data">';
echo '<input type="hidden" name="id_historialyarchivos" value='.$row["id_historialyarchivos"].' />';
  
  
?>  
<button  class="success button" type="submit" name="modificarextintor">Modificar</button> 
<?php
 
echo'</form>';
//

echo'<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
echo '<input type="hidden" name="id_historialyarchivos" value='.$row["id_historialyarchivos"].' />';
    
?>  
<button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminarenfermedades" style="width:88px;">Eliminar</button> 
<?php
 
echo'</form>';
	?>   
	  </th>
    </tr>
  </thead> 
  <tbody>
 
<?php 
if(!empty($row["descripcion"])){
    echo '<tr>';
	echo '<td>';
    echo utf8_encode($row["descripcion"]);
    echo '</td>';
	echo '<td></td>';
    echo '</tr>';
}
if(!empty($row["archivo"])){
    echo '<tr>';
	echo '<td>';
		echo "Archivo : ";
	?>
	<a href="pdf/<?php  echo $row["archivo"] ;?>" target="_blank"><img src="img/carpeta.png" alt="Archivo" border="0"style="width:30px;height:30px; "/></a>
    <?php
	echo '</td>';
	echo '<td></td>';
    echo '</tr>';
}

//
 
 
 
?>	
 
  </tbody>
</table>
</br>
<?php 	
}
?>		
</tabla>		


			   </div>
               </div>

<insertar>
</br>	
<div class="titulo_boton">
  <a style='cursor: pointer;' onClick="muestra_oculta('nuevoprotocolo')" title="" class="success button">Añadir Reporte</a>
</div>

<div id="nuevoprotocolo">
  <table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Fecha</th>
      <th>Archivo (Opcional)</th>
      <th>Descripción (Opcional)</th>
      <th width="100">Registrar</th>
    </tr>
  </thead>
  <tbody>  
    <tr>
	<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">
	 <input type="hidden" name="id_historialyarchivos" value="<?php echo $id_historialyarchivos ?>"/>
  	 <input type="hidden" name="id_enfermedad_reportada" value="<?php echo $id_enfermedad_reportada ?>"/>  
    <td><input type="text" id="inputNombre" name="titulo" class="form-control" placeholder=" " Required ></td>
	<td><input type="date" id="inputFecha" name="fecha" class="form-control" placeholder=" " Required >	</td>
	 <td><input type="file" id="inputImagen" name="ARCHIVO" size="20" class="form-control" placeholder="Imagen"  > </td>
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
 
    $campos = array("id_historialyarchivos"=> NULL ,
	"titulo"=>$_POST['titulo'],
	"fecha"=>$_POST['fecha'],
	"descripcion"=>$_POST['descripcion'],
	"id_enfermedad_reportada"=>$_POST['id_enfermedad_reportada']); 
 
    $nuevo = new GuardarReporteEnfermedad("tesis"); 
    $nuevo->NuevoArchivoYReporte($campos);
}
if(isset($_POST['eliminarenfermedades'])){
  
    $campos = array("id_historialyarchivos"=>$_POST['id_historialyarchivos']); 
  
    $nuevo = new GuardarReporteEnfermedad("tesis"); 
    $nuevo->EliminarArchivoYReporte($campos);
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