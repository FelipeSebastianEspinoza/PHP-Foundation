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
    <title>Reportes de Enfermedades</title>
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
                <h4 style="margin: 0;" class="text-center">Enfermedades Reportadas</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
            
 
 	 
  <table id="example">
  <thead>
    <tr>
      <th>ID</th>
	  <th>Fecha reporte</th>
	  <th>Fecha término</th>
	  <th>Periodo de reposo hasta hoy</th>
	  <th>Enfermedad</th>
	  <th>Persona</th>
	  <th>Edificio</th>
	  <th>Historial y Archivos</th>
	  <th>Modificar</th>
	  <th>Eliminar</th>
    </tr>
  </thead> 
  <tbody>
 
  <?php  
			$conn = mysqli_connect("localhost","root","","tesis");
			$result = mysqli_query($conn, 'SELECT r.fecha_termino,r.id_enfermedad_reportada,r.fecha,r.persona,r.id_edificio,r.id_enfermedad,
                                           n.id_enfermedad,n.nombre AS nombre2,
                                           e.id_edificio,e.nombre									   
						                   FROM enfermedades_profesionales n,
								           enfermedades_reportadas r,
								           edificio e 
						                   WHERE n.id_enfermedad=r.id_enfermedad  
								           AND r.eliminar!="1"
							               AND r.id_edificio=e.id_edificio
										   ;');
 						   
										   
		    while($row = mysqli_fetch_array($result)){
 
            echo '<tr>';
            echo '<td>'.$row["id_enfermedad_reportada"].'</td>';
		    $date=date_create($row["fecha"]);
		    echo '<td>';
	        echo date_format($date,"d/m/Y") ;
			echo '</td>';
            $date2=date_create($row["fecha_termino"]);
			$date2=date_format($date2,"d/m/Y");
			if( $date2  =='30/11/-0001'){
            echo '<td>';
	        echo "Vigente";
			echo '</td>';
			echo '<td>';
			$datetime1 = new DateTime($row["fecha"]);
			$hoyfecha=getdate();
			$datetime2=strftime( "%Y-%m-%d", time() );
            $datetime2 = new DateTime($datetime2);
			$interval = $datetime1->diff($datetime2);
            echo floor(($interval->format('%a') / 7)) . ' semanas '
            . ($interval->format('%a') % 7) . ' días';
			echo '</td>';
			}else if($row["fecha_termino"]!=null){
		    echo '<td>';
			echo  $date2  ;
			echo '</td>';
			echo '<td>';
	        echo "Terminado";
			echo '</td>';	
			}else {
		    echo '<td>';
	        echo "Vigente";
			echo '</td>';
			echo '<td>';
			$datetime1 = new DateTime($row["fecha"]);
			$hoyfecha=getdate();
			$datetime2=strftime( "%Y-%m-%d", time() );
            $datetime2 = new DateTime($datetime2);
			$interval = $datetime1->diff($datetime2);
            echo floor(($interval->format('%a') / 7)) . ' semanas '
            . ($interval->format('%a') % 7) . ' días';
			echo '</td>';
			}
			echo '<td>' ;
			  if($row["nombre2"]=="Sin Asignar"){
		    echo '<font color="red">';
		    echo utf8_encode($row["nombre2"]);
		    echo '</font>';
	        }else{
	         echo  utf8_encode($row["nombre2"]);  
	        } 
	        echo '</td>';
	        echo '<td>' ;
	        echo  utf8_encode($row["persona"]);
	        echo '</td>';
	        echo '<td>';
	        echo  utf8_encode($row["nombre"]);
            echo '</td>';
			
			
		    echo '<td>' ;
		    echo '<form class="formulario" action="ArchivosReportesEnfermedad.php" method="post" id="usrform" enctype="multipart/form-data">';
            echo '<input type="hidden" name="id_enfermedad_reportada" value='.$row["id_enfermedad_reportada"].' />';
	    	?>	
		    <center><button   type="submit" name=""><img src="img/carpeta2.png" alt="Archivo" border="0"style="width:45px;height:45px; cursor:pointer;"/></button>  </center>
		    <?php	
            echo '</form>';
            echo '</td>';
			
			
 
  echo'<form class="formulario" action="MEnfermedadesAsignadas.php" method="post" id="usrform" enctype="multipart/form-data">';
  echo '<input type="hidden" name="id_enfermedad_reportada" value='.$row["id_enfermedad_reportada"].' />';
  echo '<td>' ;    
  ?>  
  <button  class="success button" type="submit" name="modificarextintor">Modificar</button> 
  <?php
  echo '</td>' ;
  echo'</form>';
 
  echo'<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
  echo '<input type="hidden" name="id_enfermedad_reportada" value='.$row["id_enfermedad_reportada"].' />';
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
  <a style='cursor: pointer;' onClick="accidentes_ocultos('nuevoaccidente')" title="" class="success button">Añadir Reporte</a>
</div>
 
<div id="nuevoaccidente">
  <table>
  <thead>
    <tr>
      <th width="80">Fecha</th>
      <th width="300">Edificio</th>
      <th width="250">Persona</th>
	  <th width="250">Enfermedad</th>
	  <th width="100"> </th>
    </tr>
  </thead>
  <tbody>  
    <tr>
	<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">
	
    <td><input type="date" id="inputFecha" name="fecha" class="form-control" placeholder="" Required >	</td>
 
	<?php 
    $conn = mysqli_connect("localhost","root","","tesis");
    $result = mysqli_query($conn, 'SELECT id_edificio, nombre 
	                               FROM edificio
                                   WHERE 1');
			    if($result==null){
				    echo'';
			    }else{
                    
                    
                    echo'<td><select class="form-control form-control-sm" name="id_edificio">';
 
                    while($row=mysqli_fetch_assoc($result)) { 
                        echo "<option value='$row[id_edificio]'>$row[nombre]</option>";  
				    } 
				 }	 
                echo'</select></td>';
 
		?>
		
		  <td><input type="text" id="inputPersona" name="persona" class="form-control" placeholder="" Required >	</td>
		<?php 
    $conn = mysqli_connect("localhost","root","","tesis");
    $result = mysqli_query($conn, 'SELECT id_enfermedad, nombre 
	                               FROM enfermedades_profesionales
                                   WHERE 1');
			    if($result==null){
				    echo'';
			    }else{
 
                    echo'<td><select class="form-control form-control-sm" name="id_enfermedad">';
 
                    while($row=mysqli_fetch_assoc($result)) { 
                        echo "<option value='$row[id_enfermedad]'>$row[nombre]</option>";  
				    } 
				 }	 
                echo'</select></td>';
 
		?>
		
		
		
 
	<td><button class="success button" type="submit" name="submitaccidente">Registrar</button></td>
      
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

 
if(isset($_POST['submitaccidente'])){
 
    $campos = array("id_enfermedad_reportada"=> NULL ,
	"fecha"=>$_POST['fecha'],
	"persona"=>$_POST['persona'],
    "id_edificio"=>$_POST['id_edificio'],
    "id_enfermedad"=>$_POST['id_enfermedad']); 
 
    $nuevo = new GuardarReporteEnfermedad("tesis"); 
    $nuevo->NuevoReporteEnfermedad2($campos);
}
if(isset($_POST['eliminarenfermedades'])){
 
    $campos = array("id_enfermedad_reportada"=>$_POST['id_enfermedad_reportada']); 
  
    $nuevo = new GuardarReporteEnfermedad("tesis"); 
    $nuevo->EliminarReporteEnfermedad($campos);
}
 
?>
 <script type="text/javascript">
 
function accidentes_ocultos(id){
if (document.getElementById){  
var el = document.getElementById(id);  
el.style.display = (el.style.display == 'none') ? 'block' : 'none';  
}
}
 
window.onload = function(){ 
accidentes_ocultos('nuevoaccidente');
 
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
                columns: [0,1,2,3,4,5,6]
            }
       },
 
 
       {
           extend: 'excel',
                      footer: true,
           exportOptions: {
                columns: [0,1,2,3,4,5,6]
            }
       }     
 
		
        ]  
    } );
} );

</script>