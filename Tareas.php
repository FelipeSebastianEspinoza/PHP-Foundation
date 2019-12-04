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
    <title>Tareas pendientes</title>
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
            <div class="small-12 large-12 cell">
 
            <?php include 'Top-Bar.php'; ?>
 
            </br>
            <div class="row column">
                <hr>
                <h4 style="margin: 0;" class="text-center">Tareas Pendientes</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="  small-12 large-12 cell">  
            
 <!--Edificios-->
<?php  
$conn = mysqli_connect("localhost","root","","tesis");
$sql='SELECT x.id_extintor,x.nombre,x.fecha_venc,x.estado,x.id_piso,
			                                      e.id_edificio,e.nombre AS nombre2,p.id_piso,p.id_edificio
									  	   FROM extintor x,edificio e,piso p
										   WHERE x.id_piso=p.id_piso 
										   AND x.eliminar!="1"
										   AND  p.id_edificio=e.id_edificio 
										   AND x.estado = "Pendiente" 
										   OR x.estado=" Pendiente" 
										 
										   
 
'; 

$result =mysqli_query($conn,$sql);
$numeroderesultados= mysqli_num_rows($result);
if ($numeroderesultados>0) { ?>
 
<table id="example1" class="gridtable">
<caption>Extintores con estado Pendiente</caption>
<thead>
<tr>
<th width="400px">Nombre del extintor</th>
<th width="400px">Edificio</th>
<th width="50px">Modificar</th>
<th width="50px">Revisar Tabla</th>
</tr>
</thead> 
<tbody>
<?php while($row = mysqli_fetch_array($result)){ ?>
<tr>
<form class="formulario" action="MExtintores.php" method="post" id="usrform" enctype="multipart/form-data">
<input type="hidden" name="id_extintor" value='<?php echo $row["id_extintor"]?>'/>
<td>
<?php echo $row["nombre"]?>
</td>
<td>
<?php echo $row["nombre2"]?>
</td>
<td> 
<button  class="success button" type="submit" name=" ">Modificar</button>
</td> 
</form> 
<form class="formulario" action="Extintores.php" method="post" id="usrform" enctype="multipart/form-data">
<td> 
<button  class="success button" type="submit" name=" ">IR</button>
</td> 

</form> 
</tr>
<?php } ?>
 
 
  </tbody>
</table>
 
<?php }  ?>
 
<?php  
 
$sql='SELECT x.id_redhumeda,x.nombre,x.estado,x.id_piso,
			                               e.id_edificio,e.nombre AS nombre2,p.id_piso,p.id_edificio
									  	   FROM red_humeda x,edificio e,piso p
										   WHERE x.id_piso=p.id_piso 
										   AND x.eliminar!="1"
										   AND  p.id_edificio=e.id_edificio 
										   AND x.estado = "Pendiente" 
										   OR x.estado=" Pendiente" 
										 
										   
 
'; 

$result =mysqli_query($conn,$sql);
$numeroderesultados= mysqli_num_rows($result);
if ($numeroderesultados>0) { ?>
 
<table id="example2" class="gridtable">
<caption>Redes Húmedas con estado Pendiente</caption>
<thead>
<tr>
<th width="400px">Nombre de la red</th>
<th width="400px">Edificio</th>
<th width="50px">Modificar</th>
<th width="50px">Revisar Tabla</th>

</tr>
</thead> 
<tbody>
<?php while($row = mysqli_fetch_array($result)){ ?>
<tr>
<form class="formulario" action="MRedHumeda.php" method="post" id="usrform" enctype="multipart/form-data">
<input type="hidden" name="id_redhumeda" value='<?php echo $row["id_redhumeda"]?>'/>
<td>
<?php echo $row["nombre"]?>
</td>
<td>
<?php echo $row["nombre2"]?>
</td>
<td>
<button  class="success button" type="submit" name=" ">Modificar</button>
</td>
</form> 
<form class="formulario" action="RedHumeda.php" method="post" id="usrform" enctype="multipart/form-data">

<td> 
<button  class="success button" type="submit" name=" ">IR</button>
</td> 

</form> 
</tr>
<?php } ?>
 
 
  </tbody>
</table>
 
<?php } ?>
 
<?php  
 
$sql='SELECT estado,nombre,id_grifo FROM grifo WHERE estado = "Pendiente" 
OR estado = " Pendiente"
OR estado = "pendiente"
OR estado = " pendiente"
';
$result =mysqli_query($conn,$sql);
$numeroderesultados= mysqli_num_rows($result);
if ($numeroderesultados>0) { ?>
 
<table id="example3" class="gridtable">
<caption>Grifos con estado Pendiente</caption>
<thead>
<tr>
<th width="400px">Nombre del grifo</th>
<th width="50px">Modificar</th>
<th width="50px">Revisar Tabla</th>
</tr>
</thead> 
<tbody>
<?php while($row = mysqli_fetch_array($result)){ ?>
<tr>
<form class="formulario" action="MGrifo.php" method="post" id="usrform" enctype="multipart/form-data">
<input type="hidden" name="id_grifo" value='<?php echo $row["id_grifo"]?>'/>
<td>
<?php echo $row["nombre"]?>
</td>
<td>
<button  class="success button" type="submit" name=" ">Modificar</button>
</td>
</form> 
<form class="formulario" action="NGrifo.php" method="post" id="usrform" enctype="multipart/form-data">

 
<td> 
<button  class="success button" type="submit" name=" ">IR</button>
</td> 

</form> 
</tr>
<?php } ?>
 
 
  </tbody>
</table>
 
<?php } ?>
 
 
 
<?php  
 
$sql='SELECT * FROM historialmutual WHERE 
estado = "Pendiente" 
OR estado = " Pendiente"
OR estado = "pendiente"
OR estado = " pendiente"
';
$result =mysqli_query($conn,$sql);
$numeroderesultados= mysqli_num_rows($result);
if ($numeroderesultados>0) { ?>
 
<table id="example4" class="gridtable">
<caption>Historial de Mutual</caption>
<thead>
<tr>
<th width="400px">Nombre del historial</th>
<th width="50px">Modificar</th>
<th width="50px">Revisar Tabla</th>
</tr>
</thead> 
<tbody>
<?php while($row = mysqli_fetch_array($result)){ ?>
<tr>
<form class="formulario" action="MHistorialMutual.php" method="post" id="usrform" enctype="multipart/form-data">
<input type="hidden" name="id_historialmutual" value='<?php echo $row["id_historialmutual"]?>'/>
<td>
<?php echo $row["titulo"]?>
</td>
<td>
<button  class="success button" type="submit" name=" ">Modificar</button>
</td>
</form> 
<form class="formulario" action="Mutual.php" method="post" id="usrform" enctype="multipart/form-data">

  
<td> 
<button  class="success button" type="submit" name=" ">IR</button>
</td> 

</form> 
</tr>
<?php } ?>
 
 
  </tbody>
</table>
 
<?php } ?>
<?php  
$conn = mysqli_connect("localhost","root","","tesis");
$sql='SELECT estado,nombre,id_unidad FROM unidad WHERE estado = "Pendiente" 
OR estado = " Pendiente"
OR estado = "pendiente"
OR estado = " pendiente"
';

$result =mysqli_query($conn,$sql);
$numeroderesultados= mysqli_num_rows($result);
if ($numeroderesultados>0) { ?>
 
<table id="example5" class="gridtable">
<caption>Unidades de Análisis </caption>
<thead>
<tr>
<th width="400px">Nombre de la unidad </th>
<th width="50px">Modificar</th>
<th width="50px">Revisar Tabla</th>
</tr>
</thead> 
<tbody>
<?php while($row = mysqli_fetch_array($result)){ ?>
<tr> 
<form class="formulario" action="MUnidadDeAnalisis.php" method="post" id="usrform" enctype="multipart/form-data">
<input type="hidden" name="id_unidad" value='<?php echo $row["id_unidad"]?>'/>
<td> 
<?php echo $row["nombre"]?>
</td>
<td> 
<button  class="success button" type="submit" name=" ">Modificar</button>
</td>  
</form> 
<form class="formulario" action="UnidadDeAnalisis.php" method="post" id="usrform" enctype="multipart/form-data">
<td> 
<button  class="success button" type="submit" name=" ">IR</button>
</td> 

</form> 
</tr>
<?php } ?>
 
 
  </tbody>
</table>
 
<?php }  ?>
 
 
 
 
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

 
  
  
<style>
 
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
   margin-top: -18px;
}
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>
     <script>
 
$(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
		
        // 'pdfHtml5','excelHtml5'
		{
           extend: 'copy',
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
$(document).ready(function() {
    $('#example2').DataTable( {
        dom: 'Bfrtip',
        buttons: [ 
		
        // 'pdfHtml5','excelHtml5'
		{
           extend: 'copy',
           footer: true,
           exportOptions: {
                columns: [0]
            }
       },
 
       {
           extend: 'excel',
                      footer: true,
           exportOptions: {
                columns: [0]
            }
       }     
		
		
		
        ]  
    } );
} );
$(document).ready(function() {
    $('#example3').DataTable( {
        dom: 'Bfrtip',
        buttons: [ 
		
        // 'pdfHtml5','excelHtml5'
		{
           extend: 'copy',
           footer: true,
           exportOptions: {
                columns: [0]
            }
       },
 
       {
           extend: 'excel',
                      footer: true,
           exportOptions: {
                columns: [0]
            }
       }     
		
		
		
        ]  
    } );
} );
$(document).ready(function() {
    $('#example4').DataTable( {
        dom: 'Bfrtip',
        buttons: [ 
		
        // 'pdfHtml5','excelHtml5'
		{
           extend: 'copy',
           footer: true,
           exportOptions: {
                columns: [0]
            }
       },
 
       {
           extend: 'excel',
                      footer: true,
           exportOptions: {
                columns: [0]
            }
       }     
		
		
		
        ]  
    } );
} );
$(document).ready(function() {
    $('#example5').DataTable( {
        dom: 'Bfrtip',
        buttons: [ 
		
        // 'pdfHtml5','excelHtml5'
		{
            extend: 'copy',
           footer: true,
           exportOptions: {
                columns: [0]
            }
       },
 
       {
           extend: 'excel',
                      footer: true,
           exportOptions: {
                columns: [0]
            }
       }     
		
		
		
        ]  
    } );
} );
</script>