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
  <title>Zona de Seguridad</title>
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
  <h4 style="margin: 0;" class="text-center">Zona de Seguridad</h4>
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
    <th>Imagen</th>
    <th width="50">Modificar</th>
    <th width="50">Eliminar</th>
   </tr>
 </thead> 
 <tbody>
<?php  
$conn = mysqli_connect("localhost","root","","tesis");
$result = mysqli_query($conn, 'SELECT *
							   FROM zonadeseguridad
							   WHERE eliminar!="1";');
while($row = mysqli_fetch_array($result)){
 echo'<tr>';
 echo'<td>';
 echo utf8_encode($row["nombre"]);
 echo'</td>';
 echo'<td>';
 echo utf8_encode($row["descripcion"]);
 echo'</td>';
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
 echo'<form class="formulario" action="MZonadeSeguridad.php" method="post" id="usrform" enctype="multipart/form-data">';
 echo'<input type="hidden" name="id_zonadeseguridad" value='.$row["id_zonadeseguridad"].' />';
 echo'<td>';    
?>  
 <button  class="success button" type="submit" name="modificaraccidente">Modificar</button> 
<?php
 echo'</td>';
 echo'</form>';
 echo'<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
 echo'<input type="hidden" name="id_zonadeseguridad" value='.$row["id_zonadeseguridad"].' />';
 echo'<td>';
?>  
 <button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminarredhumeda">Eliminar</button> 
<?php
 echo'</td>';
 echo'</form>';
 echo'</tr>';
 }
?>
 </tbody>
</table>
</div>
</div>
				
<insertar>
<a class="success button"href="ZonadeSeguridad.php">Añadir Zona de Seguridad</a>	
 
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
 
 
if(isset($_POST['eliminarredhumeda'])){
  
 $campos = array("id_zonadeseguridad"=>$_POST['id_zonadeseguridad']); 
  
 $nuevo = new ZonadeSeguridad("tesis"); 
 $nuevo->Eliminar($campos);
}
?>
  
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