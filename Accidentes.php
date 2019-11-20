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
    <title>Accidentes</title>
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
            
  
  
   <?php  
			$conn = mysqli_connect("localhost","root","","tesis");
			$result = mysqli_query($conn, 'SELECT e.id_edificio,e.nombre,a.id_accidente,a.fecha,a.tipo,a.numero, 
                                       a.persona,a.descripcion,a.id_edificio,a.archivo1,a.archivo2,a.archivo3,a.archivo4				
						        FROM accidente a,edificio e 
						        WHERE a.eliminar!="1" 
								AND e.id_edificio=a.id_edificio   
										   ;');
	                             
										   ?>
  <div class="row column">
  <table id="example" class="scroll" >
    <thead>
      <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Tipo</th>
        <th>Código</th>
        <th>Nombres_Apellidos</th>
        <th>Descripción</th>
        <th>Edificio</th>
        <th>Diat</th>
        <th>Invest..</th>
        <th>InformeP</th>
        <th>InformeC</th>
        <th>Modificar</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
	<?php while($row = mysqli_fetch_array($result)){ ?>
      <tr>
        <td><?php echo $row["id_accidente"];?></td>
        <td><?php $date = date_create($row["fecha"]); echo date_format($date,"d/m/Y") ;?></td>
        <td><?php echo $row["tipo"];?></td>
        <td><?php echo $row["numero"];?></td>
        <td><?php echo $row["persona"];?></td>
        <td style="display:block; width:300px;"><?php echo $row["descripcion"];?></td>
        <td ><?php echo $row["nombre"];?></td>
		
        <td>
		<?php    
 		if(!empty($row["archivo1"])){
		?>	
	 	<a href="pdf/<?php  echo $row["archivo1"] ;?>" target="_blank"><img src="img/carpeta.png" alt="Archivo" border="0"style="width:30px;height:30px; "/></a>
		<?php	
		}else{
        ?> 
        <button type="" name=""><img src="img/sincarpeta.png" alt="" style="width:30px;height:30px; "></button>
        <?php
		} 
		?>
		</td>
        <td>
		<?php    
 		if(!empty($row["archivo2"])){
		?>	
	 	<a href="pdf/<?php  echo $row["archivo2"] ;?>" target="_blank"><img src="img/carpeta.png" alt="Archivo" border="0" style="width:30px;height:30px; "/></a>
		<?php	
		}else{
        ?> 
        <button type="" name=""><img src="img/sincarpeta.png" alt="" style="width:30px;height:30px; "></button>
        <?php
		} 
		?>
		</td>
        
		        <td>
		<?php    
 		if(!empty($row["archivo3"])){
		?>	
	 	<a href="pdf/<?php  echo $row["archivo3"] ;?>" target="_blank"><img src="img/carpeta.png" alt="Archivo" border="0" style="width:30px;height:30px; "/></a>
		<?php	
		}else{
        ?> 
        <button type="" name=""><img src="img/sincarpeta.png" alt="" style="width:30px;height:30px; "></button>
        <?php
		} 
		?>
		</td>
        
		        <td>
		<?php    
 		if(!empty($row["archivo4"])){
		?>	
	 	<a href="pdf/<?php  echo $row["archivo4"] ;?>" target="_blank"><img src="img/carpeta.png" alt="Archivo" border="0"style="width:30px;height:30px; "/></a>
		<?php	
		}else{
        ?> 
        <button type="" name=""><img src="img/sincarpeta.png" alt="" style="width:30px;height:30px; "></button>
        <?php
		} 
		?>
		</td>
        
		
 
		<td>
		<?php 
		
		echo '<form class="formulario" action="MAccidentes.php" method="post" id="usrform" enctype="multipart/form-data">';
        echo '<input type="hidden" name="id_accidente" value='.$row["id_accidente"].' />';
        echo '<input type="hidden" name="id_edificio" value='.$row["id_edificio"].' />';
   
        ?>  
        <button  class="success button" type="submit" name="modificaraccidente">Modificar</button> 
        <?php
 
        echo '</form>';

		?>
		</td>
        <td>
		<?php
		
		    echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
            echo '<input type="hidden" name="id_accidente" value='.$row["id_accidente"].' />';
            echo '<input type="hidden" name="id_edificio" value='.$row["id_edificio"].' />';
            ?>  
            <button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminaraccidente">Eliminar</button> 
            <?php
            echo'</form>';
		?>
		</td>
      </tr>
	<?php }?>
    </tbody>
    <tfoot>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tfoot>
  </table>
</div>
  
  
 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
                </div>
                </div>
				
<insertar>
<div class="titulo_boton">
  <a style='cursor: pointer;' onClick="accidentes_ocultos('nuevoaccidente')" title="" class="success button">Añadir Accidente</a>
</div>
<?php
 
?>
<div id="nuevoaccidente">
  <table>
  <thead>
    <tr>
      <th width="100">Fecha</th>
      <th width="100">Tipo</th>
      <th width="100">Código</th>
	  <th width="300">Persona</th>
      <th width="600">Descripción</th>
	  <th width="200">Edificio</th>
	  <th width="100"> </th>
    </tr>
  </thead>
  <tbody>  
    <tr>
	<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">
	
    <td><input type="date" id="inputFecha" name="fecha" class="form-control" placeholder="" Required >	</td>
    <td><input type="text" id="inputTipo" name="tipo" class="form-control" placeholder="" Required >	</td>
    <td><input type="text" id="inputNumero" name="numero" class="form-control" placeholder="" Required >	</td>
    <td><input type="text" id="inputPersona" name="persona" class="form-control" placeholder="Escriba el nombre" Required >	</td>
    <td><textarea  type="text" id="inputDescripcion" rows="5" cols="55"name="descripcion" class="form-control" placeholder="Escriba la descripción"  Required> </textarea> 	</td>
    
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
	
	
<td><button class="success button" type="submit" name="submitaccidente">Registrar</button></td>
	    </tr>
     
	</form>
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
 
    $campos = array("id_accidente"=> NULL ,
	"fecha"=>$_POST['fecha'],
	"numero"=>$_POST['numero'],
	"persona"=>$_POST['persona'],
    "descripcion"=>$_POST['descripcion'],
    "id_edificio"=>$_POST['id_edificio']	); 
 
    $nuevo = new GuardarAccidente("tesis"); 
    $nuevo->NuevoAccidente($campos);
}
if(isset($_POST['eliminaraccidente'])){
  
    $campos = array("id_accidente"=>$_POST['id_accidente']); 
  
    $nuevo = new GuardarAccidente("tesis"); 
    $nuevo->EliminarAccidente($campos);
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