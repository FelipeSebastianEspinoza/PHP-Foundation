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
                <h4 style="margin: 0;" class="text-center">Accidentes</h4>
                <hr>
            </div>
            <div class="callout">
		        <div class="grid-x grid-margin-x">
                <div class="show-for-large large-12 cell">  
<?php
if(isset($_SESSION['usuario'])){?>
<div class="titulo_boton">
  <a style='cursor: pointer;' onClick="accidentes_ocultos('nuevoaccidente')" title="" class="success button">Añadir Accidente</a>
</div>
<?php
}
?>
<div id="nuevoaccidente">
  <table>
  <thead>
    <tr>
      <th width="100">Fecha</th>
      <th width="100">Tipo</th>
      <th width="100">Número</th>
	  <th width="300">Persona</th>
      <th width="600">Descripción</th>
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
    <td><button class="success button" type="submit" name="submitaccidente">Registrar</button></td>
  
    </form>
    </tr>
  </tbody>
</table>
</div>        
 
  <div class="top-bar">
<div class="row">
 
 <form action="" method="post">
<ul class="menu">
<li><h5 style="padding-top:5px;padding-right:40px;padding-left:40px;">Buscar</h5></li>
<li><input type="search" name="Busqueda" id="myInput" placeholder="Nombre"></li>
<li><h5 style="padding-top:5px;padding-right:40px;padding-left:40px;">
Haga click en el nombre de la columna para ordenar de manera ascendente o descendente

</h5></li>
 
</form>
</ul>
</div>
</div>
 
				<?php
 
		 	     
				$link = mysql_connect('localhost', 'root','');
	            if(!$link){
		         echo'No Se Pudo Establecer Conexion Con El Servidor: '. mysql_error();
	            }else{
		         $base = mysql_select_db('tesis',$link);
		            if(!$base){
			        echo'No se encontro la base de datos: '.mysql_error();
		            }else{	 
		            	$sql = "SELECT * FROM `accidente` WHERE 1 ORDER BY persona";
	            		$ejecuta_sentencia = mysql_query($sql);
	         		if(!$ejecuta_sentencia){
		        		echo'hay un error en la sentencia de sql: '.$sql;
		        	}else{
	 
			        	$row = mysql_fetch_array($ejecuta_sentencia);
		         	}
		         }
	            }
	            if($row['id_accidente']==""){
				 echo "<script>
					alert('No existen resultados de busqueda');
				  </script>";   
			  }
			  
			  
			  
			echo '<table>';
  echo '<thead>';
    echo '<tr>';
      echo '<th style="cursor: pointer;" width="50">ID</th>';
      echo '<th style="cursor: pointer;" width="50">Fecha</th>';
      echo '<th style="cursor: pointer;" width="50">Tipo</th>';
      echo '<th style="cursor: pointer;" width="50">Numero</th>';
	  echo '<th style="cursor: pointer;" width="100">Persona</th>';
      echo '<th style="cursor: pointer;" width="200">Descripción</th>';
	  echo '<th style="cursor: pointer;" width="200">Modificar</th>';
    echo '</tr>';
 echo ' </thead>';
    echo '<tbody id="myTable"> ';
      echo '<tr>  '; 
					for($i=0; $i<$row; $i++){
 
             echo '<td>'.$row["id_accidente"].'</td>';
             echo '<td>'.$row["fecha"].'</td>';
               echo '<td>'.$row["tipo"].'</td>';
              echo '<td>'.$row["numero"].'</td>';
	          echo '<td>' ;
	          echo  utf8_encode($row["persona"]);
	          echo '</td>';
	           echo '<td>' ;
	          echo  utf8_encode($row["descripcion"]);
                echo '</td>';
           		echo '   </tr>';
     
 
						$row = mysql_fetch_array($ejecuta_sentencia);
 						
					}
            echo ' </tbody>';
            echo '</table>';
         
       		
		  				
 
 
				?>
 
 
          </div>
        </div>
      </div>
        </div>
      </div>
 
</br>	
 

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
	
   <link rel="stylesheet" href="css/estilogeneral.css" />
   </div> 
   
  </body>
</html>

<?php
 include 'Footer.php';	
 
 
 

include("guardar.php");

 
if(isset($_POST['submitaccidente'])){
 
    $campos = array("id_riesgo"=> NULL ,
	"nombre"=>$_POST['nombre'],
	"descripcion"=>$_POST['descripcion'],
	"imagen"=>$_POST['ARCHIVO']); 
 
    $nuevo = new GuardarRiesgo("tesis"); 
    $nuevo->NuevoRiesgo($campos);
}
 
 
?>
 <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$('th').click(function(){
    var table = $(this).parents('table').eq(0)
    var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
    this.asc = !this.asc
    if (!this.asc){rows = rows.reverse()}
    for (var i = 0; i < rows.length; i++){table.append(rows[i])}
})
function comparer(index) {
    return function(a, b) {
        var valA = getCellValue(a, index), valB = getCellValue(b, index)
        return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
    }
}
function getCellValue(row, index){ return $(row).children('td').eq(index).text() }
</script>
 <script>
 
 
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