  <?php  
 $link = new PDO('mysql:host=localhost;dbname=tesis', 'root', '');  
 
  session_start();
  
 if (isset($_SESSION['usuario'])){
 
 
   if(!empty($_POST['id_edificio'])) {//si no esta vacio
$_SESSION['id_edificio']=$_POST['id_edificio'];
$id_edificio=$_POST['id_edificio'];
}else{
	 $_POST['id_edificio']=$_SESSION['id_edificio'];
     $id_edificio=$_POST['id_edificio'];
}





}else{
	$id_edificio=$_POST['id_edificio'];
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
 
		  
 <?php  
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT * 
									  	   FROM edificio
									       WHERE id_edificio ='.$id_edificio.';');

			while($row = mysqli_fetch_array($result)){
				echo '<h2>'.$row["nombre"].'</h2>'; 
				echo '<input type="hidden" name="value" value='.$row["id_edificio"].'/>';
				
				echo ' <div class="grid-x grid-margin-x">'; 
		        echo ' <div class="show-for-large large-3 cell">'; 
				echo '</br>';
			 	echo '<img class="thumbnail"  src="data:image/png;base64,'.base64_encode( $row["imagen"] ).'"/>';
				echo '</div>';
				echo '<div class="medium-7 large-6 cell">';
				echo'</br>';
                echo'<table>';
                echo'<thead>';
                echo'<tr>';
                echo'<th width="50">Estado: </th>';
                echo'<th style="font-weight: normal;"width="150">'.$row["estado"].'</th>';
                echo'<th width="50">N°Departamentos: </th>';
                echo'<th style="font-weight: normal;"width="150">'.$row["n_departamentos"].'</th>  ';
                echo'</tr>';
                echo'<tr>';
                echo'<th width="50">N°Estudiantes: </th>';
                echo'<th style="font-weight: normal;"width="150">'.$row["n_estudiantes"].'</th>';
                echo'<th width="50">% Hacinamiento: </th>';
				if(isset($_SESSION['usuario'])){
                echo'<th style="font-weight: normal;"width="150">'.$row["porcentaje_hacinamiento"].'</th>  ';
                echo'</tr>';
                echo'<tr>';
                echo'<th width="50">Area Total: </th>';
				}
                echo'<th style="font-weight: normal;"width="150">'.$row["area_total"].'</th>';
                echo'</tr>';  	
                echo'</thead>';
                echo'</table>';
				
				if(isset($_SESSION['usuario'])){
				    echo'<form action="EdificioM.php" method="post">';
					echo '<input type="hidden" name="id_edificio" value='.$id_edificio.' />';
					echo'<input type="submit" class="success button"value="Modificar"></input>';
				    echo'</form>';
				}
				
                echo'</div>';
			}
		  ?>

<div class="medium-5 large-3 cell">
 
 <?php 
 
    $result = mysqli_query($conn, 'SELECT * FROM piso
                                   WHERE id_edificio ='.$id_edificio.';');
			    if($result==null){
				    echo'';
			    }else{
                    echo'<div class="callout secondary">';
                    echo'<form action="piso.php" method="post">';
                    echo'<div class="grid-x">';
                    echo'<div class="small-12 cell">';
                    echo'<label>Ir Al Piso:';
                    echo'<select class="form-control form-control-sm" name="id_piso">';
 
                    while($row=mysqli_fetch_assoc($result)) { 
                        echo "<option value='$row[id_piso]'>$row[nombre]</option>";  
				    } 
				 }	 
                echo'</select>';
				echo '<input type="hidden" name="id_edificio" value='.$id_edificio.' />';
				echo'<input type="submit" class="button primary"value="IR"></input>';
        echo'</label>';
        echo'</div>';
        echo'</div>';
        echo'</form>';
        echo'</div>';
 ?> 
 
</div>
</div>
 	  
		  
<ul class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
  <li class="tabs-title is-active"><a href="#panel1c" aria-selected="true">Protocolos</a></li>
  <li class="tabs-title"><a href="#panel2c">Riesgos</a></li>
  <li class="tabs-title"><a href="#panel3c">Accidentes</a></li>
  <li class="tabs-title"><a href="#panel4c">Extintores</a></li>
  <li class="tabs-title"><a href="#panel5c">Redes Humedas</a></li>
</ul>

<div class="tabs-content" data-tabs-content="collapsing-tabs">
  <div class="tabs-panel is-active" id="panel1c">
  <table>
  <thead>
    <tr>
      <th width="200">Nombre</th>
      <th width="150">Estado</th>
	  <th width="150">Descripción</th>
    </tr>
  </thead> 
  <tbody>
  
   
  
  
  
  
  
  
  
  
  
  <?php  
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT a.estado,p.nombre,p.descripcion
									  	   FROM protocolo p,asigna a
									       WHERE p.id_protocolo=a.id_protocolo
										   AND a.id_edificio ='.$id_edificio.';');
		    while($row = mysqli_fetch_array($result)){
	   
      echo '<tr>';
	  echo '<td>' ;
	  echo  utf8_encode($row["nombre"]);
	  echo '</td>';
      echo '<td>'.$row["estado"].'</td>';
	  echo '<td>' ;
	  echo  utf8_encode($row["descripcion"]);
      echo '</td>';

      echo '</tr>';
	  
				}
		  ?>
  </tbody>
</table>

<insertar>
<div class="titulo_boton">
<?php 				if(isset($_SESSION['usuario'])){?>
  <a style='cursor: pointer;' onClick="muestra_oculta('nuevoprotocolo')" title="" class="success button">Asignar Protocolo</a>
<?php 			}?>
  </div>

<div id="nuevoprotocolo">
<?php 
  	    	    
                echo'<table>';
                echo'<thead>';
                $result = mysqli_query($conn, 'SELECT p.nombre,p.id_protocolo 
			                                   FROM protocolo p 
                                                ;');
			    if($result==null){
				    echo'';
			    }else{	
				 echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	
			        echo'<tr>';
			        echo'<th style="font-weight: normal;"width="150">';
					echo "Protocolo";
                    echo'<select class="form-control form-control-sm" name="id_protocolo">';
 
                    while($row=mysqli_fetch_assoc($result)) { 
                        echo "<option value='$row[id_protocolo]'>$row[nombre]</option>";  
				    } 
				 }	 
                echo'</select>';
		        echo'<th style="font-weight: normal;"width="50">';
				echo "Estado";
                echo'<input type="text" id="estado" name="estado" class="form-control" value="">';
				echo'</th>';
				
			    echo'<th style="font-weight: normal;"width="50">';
               echo'</br><input type="submit" name="submitprotocolo" class="button primary"value="Asignar"></input>';
				echo'</th>';
				echo'</th>';
                echo'</thead>';
                echo'</table>';
				echo '<input type="hidden" name="id_edificio" value='.$id_edificio.' />';
				echo '<input type="hidden" name="id" value='.$id_edificio.' />';
        echo '</form>';	 
 ?>
</div>

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
<insertar>



  </div>
  <div class="tabs-panel" id="panel2c">
     <?php  
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT *
									  	   FROM riesgo r,edificio_riesgo d  
									       WHERE r.id_riesgo=d.id_riesgo   
										   AND d.id_edificio ='.$id_edificio.'    ;');
		    while($row = mysqli_fetch_array($result)){
 	   
    echo '<tr>';
	echo '<img   src="data:image/png;base64,'.base64_encode( $row["icono"] ).'"/>';
 
    echo '</tr>';
	 
				}
		  ?>
  </div>
  
  
  
  <div class="tabs-panel" id="panel3c">
    <table>
  <thead>
    <tr>
      <th width="200">ID</th>
      <th>Fecha</th>
      <th width="150">Tipo</th>
      
	   <?php  
		if(isset($_SESSION['usuario'])){
	      echo  '  <th width="150">Numero</th>';
	      echo  ' <th width="150">Persona</th>';
		  echo  ' <th width="150">Descripción</th>';
		}
	    ?>
	  
	   
 
    </tr>
  </thead>
  <tbody>
  <?php  
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT * 
									  	   FROM accidente
									       WHERE id_edificio ='.$id_edificio.'
										   ORDER BY fecha DESC;');
		    while($row = mysqli_fetch_array($result)){

  
 					   
    echo '<tr>';
	 if(isset($_SESSION['usuario'])){ 
      echo '<td>'.$row["id_accidente"].'</td>';
	 }
      echo '<td>'.$row["fecha"].'</td>';
      echo '<td>'.$row["tipo"].'</td>';
      echo '<td>'.$row["numero"].'</td>';
	  echo '<td>' ;
	   if(isset($_SESSION['usuario'])){ 
	  echo  utf8_encode($row["persona"]);
	   }
	  echo '</td>';
	  echo '<td>' ;
	   if(isset($_SESSION['usuario'])){ 
	  echo  utf8_encode($row["descripcion"]);
	   }
      echo '</td>';
 
      echo '</tr>';
				}
		  ?>
 
   
  </tbody>
</table>
  </div>
  
  <div class="tabs-panel" id="panel4c">
  <?php  
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT e.nombre
									  	   FROM extintor e,piso p
									       WHERE e.id_piso=p.id_piso
										   AND p.id_edificio ='.$id_edificio.'    ;');
		    while($row = mysqli_fetch_array($result)){
 	   
      echo '<tr>';
	  echo  utf8_encode($row["nombre"]);
	  echo '</td>';
      echo '</tr>';
	 
				}
		  ?>
  </div>
  
    <div class="tabs-panel" id="panel5c">
 <?php  
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT r.nombre
									  	   FROM red_humeda r,piso p
									       WHERE r.id_piso=p.id_piso
										   AND p.id_edificio ='.$id_edificio.'    ;');
		    while($row = mysqli_fetch_array($result)){
 	   
      echo '<tr>';
	  echo  utf8_encode($row["nombre"]);
	  echo '</td>';
      echo '</tr>';
	 
				}
		  ?>
  </div>
  
</div>
        </div>
      </div>
	 
	 
	 
	 
	
	

	
	
	
	
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
 
if(isset($_POST['submitprotocolo'])){
 
    $campos = array("id_protocolo"=> $_POST['id_protocolo'] ,
	"id_edificio"=> $_POST['id_edificio'] , 
	"estado"=>$_POST['estado']); 
 
    $nuevo = new GuardarProtocolo("tesis"); 
    $nuevo->AsignarProtocolo($campos);
} 
 
?>
 