  <?php  
 $link = new PDO('mysql:host=localhost;dbname=tesis', 'root', '');  
 
 session_start();
 if (!isset($_SESSION['usuario'])){
	echo "<script>
           window.location.replace('index.php');					
		  </script>";
}
  if(!empty($_POST['id_edificio'])) {
        $id_edificio = $_POST['id_edificio'];
		
  }else{
	 $_POST['id_edificio']=$_SESSION['id_edificio'];
  
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
  echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	   
			$conn = mysqli_connect("localhost","root","","tesis");
 
 		 	 if(!empty($id_edificio)) {
              $id_edificio = $_SESSION['id_edificio'];
             }else{
	           $id_edificio = $_SESSION['id_edificio'];
             }	 
			 
			$result = mysqli_query($conn, 'SELECT * 
									  	   FROM edificio
									       WHERE id_edificio ='.$id_edificio.';');

			while($row = mysqli_fetch_array($result)){
				echo '<h2>'.$row["nombre"].'</h2>'; 
 
				echo ' <div class="grid-x grid-margin-x">'; 
		        echo ' <div class="show-for-large large-3 cell">'; 
				echo '</br>';
			 	echo '<img class="thumbnail"  src="data:image/png;base64,'.base64_encode( $row["imagen"] ).'"/>';
				echo '<input type="file" id="inputImagen" name="ARCHIVO" size="20" class="form-control" placeholder="Imagen" >';
				echo '</div>';
				echo '<div class="medium-7 large-6 cell">';
				echo'</br>';
                echo'<table>';
                echo'<thead>';
				
				 echo'<tr>';
                echo'<th width="50">Nombre: </th>';
                echo'<th style="font-weight: normal;"width="150">';
                 echo'<input type="text" id="nombre" name="nombre" class="form-control" value="'.$row["nombre"].'" >';
				echo'</th>';
				 echo'</tr>';
				
                echo'<tr>';
                echo'<th width="50">Estado: </th>';
                echo'<th style="font-weight: normal;"width="150">';
                 echo'<input type="text" id="estado" name="estado" class="form-control" value="'.$row["estado"].'" >';
				echo'</th>';
 
                echo'<th width="50">N°Departamentos: </th>';
                echo'<th style="font-weight: normal;"width="150">';
                 echo'<input type="text" id="n_departamentos" name="n_departamentos" class="form-control" value="'.$row["n_departamentos"].'"  >';
				echo'</th>';
				
				
			    echo'<tr>';
                echo'<th width="50">N°Estudiantes: </th>';
                echo'<th style="font-weight: normal;"width="150">';
                 echo'<input type="text" id="n_estudiantes" name="n_estudiantes" class="form-control" value="'.$row["n_estudiantes"].'"  >';
				echo'</th>';
 
                echo'<th width="50">Area Total: </th>';
                echo'<th style="font-weight: normal;"width="150">';
                 echo'<input type="text" id="area_total" name="area_total" class="form-control" value="'.$row["area_total"].'" >';
				echo'</th>';
 
               
				if(isset($_SESSION['usuario'])){
					
			    echo'<tr>';
                echo'<th width="50">% Hacinamiento: </th>';
                echo'<th style="font-weight: normal;"width="150">';
                 echo'<input type="text" id="porcentaje_hacinamiento" name="porcentaje_hacinamiento" class="form-control" value="'.$row["porcentaje_hacinamiento"].'"  >';
				echo'</th>';
                
 
				}
              
                echo'</tr>';  	
                echo'</thead>';
                echo'</table>';
                echo '<input type="hidden" name="id" value='.$row["id_edificio"].'/>';
			    echo '<input type="hidden" name="id_edificio" value='.$row["id_edificio"].'/>';
			  echo'<button class="success button" type="submit" name="submitedificio">Registrar</button> ';
              
			} 
			echo'</form>';
		  ?>
 
 
 </div>
 
<div class="medium-5 large-3 cell">
 	  <form action="Edificio.php" method="post"> 
	  </br></br></br></br></br></br>
 <input type="hidden" name="id" value="<?php echo $id_edificio ?>"/>
 <center><input type="submit" class="button primary"value="Volver Al Edificio"></input></center>
 </form>
</div>
</div>
 	  
		  
<ul class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
  <li class="tabs-title is-active"><a href="#panel1c" aria-selected="true">Protocolos</a></li>
<!--<li class="tabs-title"><a href="#panel2c">Riesgos</a></li>-->
<!--<li class="tabs-title"><a href="#panel3c">Accidentes</a></li>-->
<!--<li class="tabs-title"><a href="#panel4c">Extintores</a></li>-->
<!--<li class="tabs-title"><a href="#panel5c">Redes Humedas</a></li>-->
</ul>

<div class="tabs-content" data-tabs-content="collapsing-tabs">
  <div class="tabs-panel is-active" id="panel1c">
  <table>
  <thead>
    <tr>
      <th width="200">Nombre</th>
      <th width="150">Estado</th>
	    <?php  
		if(isset($_SESSION['usuario'])){
	      echo  '<th width="150">Modificar</th>';
		}
	    ?>
	  <th width="150">Descripción</th>
    </tr>
  </thead>
  <tbody>
  <?php  
   echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	   
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT p.id_protocolo,a.estado,p.nombre,p.descripcion,a.id_edificio
									  	   FROM protocolo p,asigna a
									       WHERE p.id_protocolo=a.id_protocolo
										   AND a.id_edificio ='.$id_edificio.';');
		    while($row = mysqli_fetch_array($result)){

  
 					   
      echo '<tr>';
	  echo '<td>' ;
	  echo  utf8_encode($row["nombre"]);
	  echo '</td>';
      echo '<td>';
	  echo'<input type="text" id="estado" name="estado" class="form-control" value="'.$row["estado"].'" >';
	  echo'</td>';
	  
	  if(isset($_SESSION['usuario'])){
	  echo '<td>' ;
     echo'<button class="success button" type="submit" name="submitprotocolo">Cambiar</button> ';
        echo '<input type="hidden" name="id_protocolo" value='.$row["id_protocolo"].'/>';
		echo '<input type="hidden" name="id_edificio" value='.$row["id_edificio"].'/>';
	  echo '</td>';   
	  }
	  
	  echo '<td>' ;
	  echo  utf8_encode($row["descripcion"]);
      echo '</td>';
 
      echo '</tr>';
	  echo '</form>';
				}
		  ?>
 
  </tbody>
</table>
 
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
	  
	   
	  	    <?php  
		if(isset($_SESSION['usuario'])){
	      echo  '<th width="150">Modificar</th>';
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
	  	 if(isset($_SESSION['usuario'])){ 
		  echo '<td>' ;
	    echo '<button type="button" class="success button">Modificar</button>'; 
      echo '</td>';
	  }
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
 
if(isset($_POST['submitedificio'])){
 
    $campos = array("id_edificio"=> $_POST['id_edificio'] , 
	"nombre"=>$_POST['nombre'],"estado"=>$_POST['estado'],
	"n_departamentos"=>$_POST['n_departamentos'],"n_estudiantes"=>$_POST['n_estudiantes'],
	"porcentaje_hacinamiento"=>$_POST['porcentaje_hacinamiento'],"area_total"=>$_POST['area_total'],
	"imagen"=>$_POST['ARCHIVO']); 
 
    $nuevo = new GuardarEdificio("tesis"); 
    $nuevo->ModificarEdificio($campos);
}
if(isset($_POST['submitprotocolo'])){
 
    $campos = array("id_edificio"=> $_POST['id_edificio'],
                    "id_protocolo"=>$_POST['id_protocolo'],
                    "estado"=>$_POST['estado']); 				
 
    $nuevo = new GuardarProtocolo("tesis"); 
    $nuevo-> ModificarAsignacionProtocolo($campos);
} 
?>