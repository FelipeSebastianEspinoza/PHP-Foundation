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
                echo'<th width="50">Area Total: </th>';
			    echo'<th style="font-weight: normal;"width="150">'.$row["area_total"].'</th>';
			    echo'</tr>';
				if(isset($_SESSION['usuario'])){
			    echo'<tr>';
			    echo'<th width="50">%Hacinamiento: </th>';
                echo'<th style="font-weight: normal;"width="150">'.$row["porcentaje_hacinamiento"].'</th>  ';
                echo'<th><th>';
			    echo' </th></th>';
				echo'</tr>';
				}else{
					
                echo'<tr><th><th><th><th>';
			    echo'</th></th></th></th></tr>';
                echo'<tr><th><th><th><th>';
			    echo'</th></th></th></th></tr>';				
				}
                echo'<th><th><th><th>';
			    echo' </th></th></th></th>';

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

		?>
 		
  <insertar>
        <div class="titulo_boton">
<?php 	 if(isset($_SESSION['usuario'])){?>
  </br><a style='cursor: pointer;' onClick="piso_oculto('nuevopiso')" title="" class="success button">Nuevo Piso</a>
<?php 	 }?>
        </div>
<div id="nuevopiso">	 
	<?php 	
	if(isset($_SESSION['usuario'])){
		echo'</br>';
                echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	
				echo '<input type="hidden" name="id_edificio" value='.$id_edificio.' />';
			    echo'<label>Nombre del Piso:';
                echo'<input type="text" id="nombre" name="nombre" class="form-control" value="">';
                echo'<input type="submit" name="submitpiso" class="button success"value="Registrar"></input>';
                echo'</form>';}
	 echo'</div>';
	 
		
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
  <li class="tabs-title"><a href="#panel6c">Unidad de Análisis</a></li>
  <li class="tabs-title"><a href="#panel7c">Procedimientos</a></li>
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

 
<insertar>



  </div>
  <div class="tabs-panel" id="panel2c">
  
  
  
  
  
  
  
  
  
     <?php  
			$conn = mysqli_connect("localhost","root","","tesis");
   	
			$result = mysqli_query($conn, 'SELECT r.id_riesgo,r.icono,d.id_edificio,d.id_riesgo
									  	   FROM riesgo r,edificio_riesgo d  
									       WHERE r.id_riesgo=d.id_riesgo   
										   AND d.id_edificio ='.$id_edificio.'    ;');
		    
	  
			while($row = mysqli_fetch_array($result)){
 
    echo'<div style="display: inline-block;">';
 
 
    echo ' <form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
	echo '<img src="data:image/png;base64,'.base64_encode( $row["icono"] ).'"/>';
	if(isset($_SESSION['usuario'])){
    echo '<input type="hidden" name="id_edificio" value='.$id_edificio.' />';
    echo '<input type="hidden" name="id_riesgo" value='.$row["id_riesgo"].' />';
    echo' <input type="submit" name="submitquitarriesgo" class="alert button"value="Quitar"></input> ';  
 	}
    echo '</form>';
	
	
	echo'</div>';
	
	
	
				} 
			  
  
		  ?>
		  
   
	<insertar>
<div class="titulo_boton">
<?php 				if(isset($_SESSION['usuario'])){?>
  </br><a style='cursor: pointer;' onClick="riesgos_ocultos('nuevoriesgo')" title="" class="success button">Asignar Riesgo</a>
<?php 			}?>
  </div>

<div id="nuevoriesgo">
<?php 
  	    	    
                echo'<table>';
                echo'<thead>';
                $result = mysqli_query($conn, 'SELECT *
			                                   FROM riesgo ;');
			    if($result==null){
				    echo'';
			    }else{	
				 echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	
			        echo'<tr>';
			        echo'<th style="font-weight: normal;"width="50">';
					echo "Riesgo";
                    echo'<select class="form-control form-control-sm" name="id_riesgo">';
 
                    while($row=mysqli_fetch_assoc($result)) { 
                        echo "<option value='$row[id_riesgo]'>$row[nombre]</option>";  
				    } 
				 }	 
                echo'</select>';
 
				
			    echo'<th style="font-weight: normal;"width="50">';
               echo'</br><input type="submit" name="submitriesgo" class="button primary"value="Asignar"></input>';
				echo'</th>';
				echo'</th>';
                echo'</thead>';
                echo'</table>';
				echo '<input type="hidden" name="id_edificio" value='.$id_edificio.' />';
                echo '</form>';	 
 ?>
</div>


 











 
<insertar>	  
		  
		  
  </div>
  
  
  
  <div class="tabs-panel" id="panel3c">
    <table>
  <thead>
    <tr>
	<?php  
		if(isset($_SESSION['usuario'])){?>
      <th width="50">ID</th>  <?php }
	    ?>
      <th width="200">Fecha</th>
      <th width="200">Tipo</th>
      <th width="200">Numero</th>
	   <?php  
		if(isset($_SESSION['usuario'])){
 
	      echo  ' <th width="200">Persona</th>';
		  echo  ' <th width="400">Descripción</th>';
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
  echo'<form action="MAccidentes.php" method="post">';
				echo'<input type="hidden" name="id_accidente" value='.$row["id_accidente"].'>';
				echo'<input type="hidden" name="id_edificio" value='.$row["id_edificio"].'>';		   
     echo '<tr>';
	 if(isset($_SESSION['usuario'])){ 
      echo '<td>'.$row["id_accidente"].'</td>';
	 }
 
      echo '<td>';  
	  $date=date_create($row["fecha"]);
	  echo date_format($date,"d/m/Y") ;
	  echo '</td>';
	  
      echo '<td>'.$row["tipo"].'</td>';
	  
      echo '<td>'.$row["numero"].'</td>';
 
	   if(isset($_SESSION['usuario'])){ 
	   	  echo '<td>' ;
	  echo  utf8_encode($row["persona"]);
	  	  echo '</td>';
 
	   echo '<td>' ;
	  echo  utf8_encode($row["descripcion"]);
	    echo '</td>';
		
	    echo '<td>' ;
		echo'<input type="submit" class="success button"value="Modificar"></input>';
	    echo '</td>';
	   }
      echo '</tr>';
       echo'</form>';
				}
		  ?>
 
   
  </tbody>
</table>
<insertar>
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
<insertar>
  </div>
  
  <div class="tabs-panel" id="panel4c">
 <table>
  <thead>
    <tr>
      <th width="200">Nombre</th>
      <th width="150">Fecha de carga</th>
	  <th width="150">Fecha de vencimiento</th>
      <th width="150">Ubicación</th>
      <th width="150">Estado</th>
	<?php   if(isset($_SESSION['usuario'])){ ?>
	   <th width="150"> </th>
	  <?php } ?>
    </tr>
  </thead> 
  <tbody>
  <?php  
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT e.id_extintor,e.nombre,e.fecha_carga,e.fecha_venc,e.ubicacion,e.estado,e.id_piso
									  	   FROM extintor e,piso p
									       WHERE e.id_piso=p.id_piso
										   AND p.id_edificio ='.$id_edificio.'    ;');
		    while($row = mysqli_fetch_array($result)){
  echo'<form action="MExtintores.php" method="post">';
				echo'<input type="hidden" name="id_extintor" value='.$row["id_extintor"].'>';
 
      echo '<tr>';
	  echo '<td>' ;
	  echo  utf8_encode($row["nombre"]);
	  echo '</td>';
 
	  echo '<td>';  
	  $date=date_create($row["fecha_carga"]);
	  echo date_format($date,"d/m/Y") ;
	  echo '</td>';
	  
	  echo '<td>';  
	  $date=date_create($row["fecha_venc"]);
	  echo date_format($date,"d/m/Y") ;
	  echo '</td>';
 
	  echo '<td>' ;
	  echo  utf8_encode($row["ubicacion"]);
      echo '</td>';
	  echo '<td>' ;
	  echo  utf8_encode($row["estado"]);
      echo '</td>';
 if(isset($_SESSION['usuario'])){
      echo '<td>' ;
	  echo'<input type="submit" class="success button"value="Modificar"></input>';
	  echo '</td>';
 }
 
      echo '</tr>';
	 echo'</form>';
				}
		  ?>
		    </tbody>
</table>
 
<insertar>
<?php
if(isset($_SESSION['usuario'])){?>
<div class="titulo_boton">
  <a style='cursor: pointer;' onClick="extintores_ocultos('nuevoextintor')" title="" class="success button">Añadir Extintor</a>
</div>
<?php
}
?>
<div id="nuevoextintor">
  <table>
  <thead>
    <tr>
      <th width="150">Nombre</th>
      <th width="100">Fecha de carga</th>
      <th width="100">Fecha de vencimiento</th>
	  <th width="300">Ubicación</th>
      <th width="200">Estado</th>
      <th width="200">Piso</th>
	  <th width="100"> </th>
    </tr>
  </thead>
  <tbody>  
    <tr>
	<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">
	
    <td><input type="text" id="inputNombre" name="nombre" class="form-control" placeholder="" Required >	</td>
    <td><input type="date" id="inputFechaCarga" name="fecha_carga" class="form-control" placeholder="" Required >	</td>
    <td><input type="date" id="inputFechaVenc" name="fecha_venc" class="form-control" placeholder="" Required >	</td>
    <td><input type="text" id="inputPersona" name="persona" class="form-control" placeholder="Escriba el nombre" Required >	</td>
    <td><input type="text" id="inputEstado" name="estado" class="form-control" placeholder="" Required >	</td>
 <td>
	 <?php 
 
    $result = mysqli_query($conn, 'SELECT * FROM piso
                                   WHERE id_edificio ='.$id_edificio.';');
			    if($result==null){
				    echo'';
			    }else{
 
       
                    echo'<select class="form-control form-control-sm" name="id_piso">';
 
                    while($row=mysqli_fetch_assoc($result)) { 
                        echo "<option value='$row[id_piso]'>$row[nombre]</option>";  
				    } 
				 }	 
                echo'</select>';
 
        echo'</label>';
 
		?>
</td>
	 <input type="hidden" name="id_edificio" value="<?php echo $id_edificio ?>"/>  
	 <td><button class="success button" type="submit" name="submitextintor">Registrar</button></td>
  
    </form>   
    </tr>
  </tbody>
</table>
</div>
<insertar>


 








  </div>
  
  
  
  
  
  
  
  
  
  
  
  
    <div class="tabs-panel" id="panel5c">
	<table>
  <thead>
    <tr>
      <th width="200">Nombre</th>
      <th width="150">Ubicación</th>
      <th width="150">Estado</th>
	   <?php   if(isset($_SESSION['usuario'])){ ?>
	   <th width="150"> </th>
	   <?php } ?>
    </tr>
  </thead> 
  <tbody>
 <?php  
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT r.id_redhumeda,r.nombre,r.ubicacion,r.estado
									  	   FROM red_humeda r,piso p
									       WHERE r.id_piso=p.id_piso
										   AND p.id_edificio ='.$id_edificio.'    ;');
		    while($row = mysqli_fetch_array($result)){
				
 	    echo'<form action="MRedHumeda.php" method="post">';
	    echo'<input type="hidden" name="id_redhumeda" value='.$row["id_redhumeda"].'>';
        echo '<tr>';
	    echo '<td>' ;
	    echo  utf8_encode($row["nombre"]);
	    echo '</td>';
        echo '<td>' ;
	    echo  utf8_encode($row["ubicacion"]);
	    echo '</td>';
	    echo '<td>' ;
        echo  utf8_encode($row["estado"]);
        echo '</td>';
        if(isset($_SESSION['usuario'])){
        echo '<td>' ;
	    echo'<input type="submit" class="success button"value="Modificar"></input>';
	    echo '</td>';
        }
        echo '</tr>';
	    echo'</form>';
				}
		  ?>
  </tbody>
</table>
<insertar>
<?php
if(isset($_SESSION['usuario'])){?>
<div class="titulo_boton">
  <a style='cursor: pointer;' onClick="rehumeda_ocultos('nuevaredhumeda')" title="" class="success button">Añadir Red Húmeda</a>
</div>
<?php
}
?>
<div id="nuevaredhumeda">
  <table>
  <thead>
    <tr>
      <th width="150">Nombre</th>
	  <th width="300">Ubicación</th>
      <th width="200">Estado</th>
      <th width="200">Piso</th>
	  <th width="100"> </th>
    </tr>
  </thead>
  <tbody>  
    <tr>
	<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">
	
    <td><input type="text" id="inputNombre" name="nombre" class="form-control" placeholder="" Required >	</td>  
    <td><input type="text" id="inputUbicacion" name="ubicacion" class="form-control" placeholder="Escriba el nombre" Required >	</td>
    <td><input type="text" id="inputEstado" name="estado" class="form-control" placeholder="" Required >	</td>
 <td>
	 <?php 
 
    $result = mysqli_query($conn, 'SELECT * FROM piso
                                   WHERE id_edificio ='.$id_edificio.';');
			    if($result==null){
				    echo'';
			    }else{
 
       
                    echo'<select class="form-control form-control-sm" name="id_piso">';
 
                    while($row=mysqli_fetch_assoc($result)) { 
                        echo "<option value='$row[id_piso]'>$row[nombre]</option>";  
				    } 
				 }	 
                echo'</select>';
 
        echo'</label>';
 
		?>
</td>
	 <input type="hidden" name="id_edificio" value="<?php echo $id_edificio ?>"/>  
	 <td><button class="success button" type="submit" name="submitredhumeda">Registrar</button></td>
  
    </form>   
    </tr>
  </tbody>
</table>
</div>
<insertar>
  






  </div>
 
   <div class="tabs-panel" id="panel6c">
  <table>
  <thead>
    <tr>
      <th width="200">Nombre</th>
      <th width="150">Total de funcionarios</th>
	  <th width="150">Funcionarios que aporta</th>
      <th width="150">Fecha de actualización</th>
      <th width="150">Estado</th>
	  <?php if(isset($_SESSION['usuario'])){ ?>
      <th width="150">Modificar</th>
	  <?php } ?>
    </tr>
  </thead> 
  <tbody>
 
  <?php  
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT *
									  	   FROM unidad
									       WHERE id_edificio ='.$id_edificio.';');
		    while($row = mysqli_fetch_array($result)){
      echo'<form action="MUnidad.php" method="post">';	 
      echo '<input type="hidden" name="id_unidad" value='.$row["id_unidad"].' />'; 
      echo '<input type="hidden" name="id_edificio" value='.$row["id_edificio"].' />'; 
	  echo '<tr>';
	  echo '<td>' ;
	  echo  utf8_encode($row["nombre"]);
	  echo '</td>';
      echo '<td>'.$row["total_func"].'</td>';
	  echo '<td>' ;
	  echo  utf8_encode($row["func_aporta_edi"]);
      echo '</td>';
 
	  echo '<td>';  
	  $date=date_create($row["fecha_act"]);
	  echo date_format($date,"d/m/Y") ;
	  echo '</td>';
 
	  echo '<td>' ;
	  echo  utf8_encode($row["estado"]);
      echo '</td>';
	  if(isset($_SESSION['usuario'])){
	  echo '<td>' ;
      echo'<input type="submit" class="success button"value="Modificar"></input>';
      echo '</td>';
	  }
      echo '</tr>';
	  echo'</form>';
				}
		  ?>
  </tbody>
</table>

<insertar>
<div class="titulo_boton">
<?php 				if(isset($_SESSION['usuario'])){?>
  <a style='cursor: pointer;' onClick="muestra_unidad('nuevaunidad')" title="" class="success button">Asignar Unidad</a>
<?php 			}?>
  </div>

<div id="nuevaunidad">
 <table>
  <thead>
    <tr>
      <th width="300">Nombre</th>
      <th width="100">Total de funcionarios</th>
      <th width="100">Funcionarios que aporta</th> 
	  <th width="300">Fecha de actualización</th>
	  <th width="300">Estado</th>
    </tr>
  </thead>
  <tbody>  
    <tr>
	<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">
	
    <td><input type="text" id="inputNombre" name="nombre" class="form-control" placeholder="Escriba el nombre " Required >	</td>
    <td><input type="text" id="inputTotal" name="total_func" class="form-control" placeholder="" Required ></td>
    <td><input type="text" id="inputAporta" name="func_aporta_edi" class="form-control" placeholder="" Required ></td>
    <td><input type="date" id="inputFecha" name="fecha_act" class="form-control" placeholder="" Required ></td>
    <td><input type="text" id="inputEstado" name="estado" class="form-control" placeholder="" Required ></td>
	    <input type="hidden" name="id_edificio" value="<?php echo $id_edificio ?>"/>  
	<td><button class="success button" type="submit" name="submitunidad">Registrar</button></td>
  
    </form>
    </tr>
  </tbody>
</table>
</div>

 
<insertar>
</div>
  
  
  
 <div class="tabs-panel" id="panel7c">
  <table>
  <thead>
    <tr>
      <th width="400">Reglamento interno</th>
      <th width="400">Elementos de protección personal</th>
	  <th width="400">Vestimenta</th>
      <th width="400">Herramientas</th>
	   <?php if(isset($_SESSION['usuario'])){ ?>
      <th width="50">Modificar</th>
	  <?php } ?>
 
    </tr>
  </thead> 
  <tbody>
  <?php  
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT *
									  	   FROM procedimiento
									       WHERE id_edificio ='.$id_edificio.';');
		    
 
 
  
			while($row = mysqli_fetch_array($result)){
   echo'<form action="MProcedimiento.php" method="post">';	 
   echo '<input type="hidden" name="id_procedimiento" value='.$row["id_procedimiento"].' />'; 
   echo '<input type="hidden" name="id_edificio" value='.$row["id_edificio"].' />'; 
   echo '<tr>';
	  echo '<td>' ;
	  echo  utf8_encode($row["reglamento_interno"]);
	  echo '</td>';
	  echo '<td>' ;
      echo  utf8_encode($row["elementos_de_proteccion_personal"]);
	  echo '</td>';
	  echo '<td>' ;
      echo  utf8_encode($row["vestimenta"]);
      echo '</td>';
	  echo '<td>' ;
	  echo  utf8_encode($row["herramientas"]);
      echo '</td>';
 if(isset($_SESSION['usuario'])){
	  echo '<td>' ;
      echo'<input type="submit" class="success button"value="Modificar"></input>';
      echo '</td>';
	  }
      echo '</tr>';
      echo'</form>';
				}
 
				
		  ?>
  </tbody>
</table>

<insertar>
<div class="titulo_boton">
<?php 				if(isset($_SESSION['usuario'])){?>
  <a style='cursor: pointer;' onClick="muestra_procedimientos('nuevoprocedimiento')" title="" class="success button">Asignar Procedimiento</a>
<?php 			}?>
  </div>

<div id="nuevoprocedimiento">
<table>
  <thead>
    <tr>
      <th width="300">Reglamento interno</th>
      <th width="300">Elementos de protección personal</th>
      <th width="300">Vestimenta</th> 
	  <th width="300">Herramientas</th>
	  <th width="100"> </th>
    </tr>
  </thead>
  <tbody>  
    <tr>
	<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">
	
    <td> 
	 <textarea name="reglamento_interno" type="text"rows="5" cols="55"  Required> </textarea> 
    </td> 
    
    <td> 
	 <textarea name="elementos_de_proteccion_personal" type="text"rows="5" cols="55"  Required> </textarea> 
    </td> 
    <td> 
	 <textarea name="vestimenta" type="text"rows="5" cols="55"  Required> </textarea> 
    </td> 	  
	
    <td> 
	 <textarea name="herramientas" type="text"rows="5" cols="55"  Required> </textarea> 
    </td>  
 
	    <input type="hidden" name="id_edificio" value="<?php echo $id_edificio ?>"/>  
	<td><button class="success button" type="submit" name="submitprocedimiento">Registrar</button></td>
  
    </form>
    </tr>
  </tbody>
</table>
</div>

 
<insertar>
</div>
  
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
if(isset($_POST['submitriesgo'])){
 
    $campos = array("id_riesgo"=> $_POST['id_riesgo'] ,
	"id_edificio"=> $_POST['id_edificio']); 
 
    $nuevo = new GuardarRiesgo("tesis"); 
    $nuevo->AsignarRiesgo($campos);
} 
 
if(isset($_POST['submitquitarriesgo'])){
 
    $campos = array("id_riesgo"=> $_POST['id_riesgo'] ,
	"id_edificio"=> $_POST['id_edificio']); 
 
    $nuevo = new GuardarRiesgo("tesis"); 
    $nuevo->QuitarRiesgo($campos);
} 


if(isset($_POST['submitaccidente'])){
 
    $campos = array("id_riesgo"=> $_POST['id_riesgo'] ,
 	"id_edificio"=> $_POST['id_edificio']); 
 
     $nuevo = new GuardarAccidente("tesis"); 
     $nuevo->NuevoAccidente($campos);
} 
if(isset($_POST['submitunidad'])){
 
    $campos = array("id_unidad"=> NULL ,
	"nombre"=>$_POST['nombre'],"total_func"=>$_POST['total_func']
	,"func_aporta_edi"=>$_POST['func_aporta_edi'],"fecha_act"=>$_POST['fecha_act']
	,"estado"=>$_POST['estado'],"id_edificio"=>$_POST['id_edificio']); 
 
    $nuevo = new GuardarUnidad("tesis"); 
    $nuevo->NuevaUnidad($campos);
} 
if(isset($_POST['submitunidad'])){
 
    $campos = array("id_unidad"=> NULL ,
	"nombre"=>$_POST['nombre'],"total_func"=>$_POST['total_func']
	,"func_aporta_edi"=>$_POST['func_aporta_edi'],"fecha_act"=>$_POST['fecha_act']
	,"estado"=>$_POST['estado'],"id_edificio"=>$_POST['id_edificio']); 
 
    $nuevo = new GuardarUnidad("tesis"); 
    $nuevo->NuevaUnidad($campos);
} 
if(isset($_POST['submitextintor'])){
 
    $campos = array("id_extintor"=> NULL ,
	"nombre"=>$_POST['nombre'],"fecha_carga"=>$_POST['fecha_carga']
	,"fecha_venc"=>$_POST['fecha_venc'],"ubicacion"=>$_POST['ubicacion']
	,"estado"=>$_POST['estado'],"id_piso"=>$_POST['id_piso']); 
 
    $nuevo = new GuardarExtintor("tesis"); 
    $nuevo->NuevoExtintor($campos);
} 
if(isset($_POST['submitredhumeda'])){
 
    $campos = array("id_redhumeda"=> NULL ,
	"nombre"=>$_POST['nombre'],"ubicacion"=>$_POST['ubicacion']
	,"estado"=>$_POST['estado'] 
	,"id_piso"=>$_POST['id_piso']); 
 
    $nuevo = new GuardarRedHumeda("tesis"); 
    $nuevo->NuevaRedHumeda($campos);
} 



if(isset($_POST['submitprocedimiento'])){
 
    $campos = array("id_procedimiento"=> Null,
	"reglamento_interno"=> $_POST['reglamento_interno'], 
 	"elementos_de_proteccion_personal"=> $_POST['elementos_de_proteccion_personal'],
	"vestimenta"=> $_POST['vestimenta'],"herramientas"=> $_POST['herramientas']
    ,"id_edificio"=> $_POST['id_edificio']); 
 
     $nuevo = new GuardarProcedimiento("tesis"); 
     $nuevo->NuevoProcedimiento($campos);
} 
 
?>
 
<script>

function muestra_oculta(id){
if (document.getElementById){  
var el = document.getElementById(id);  
el.style.display = (el.style.display == 'none') ? 'block' : 'none';  
}
}

function riesgos_ocultos(id){
if (document.getElementById){  
var el = document.getElementById(id);  
el.style.display = (el.style.display == 'none') ? 'block' : 'none';  
}
}

function accidentes_ocultos(id){
if (document.getElementById){  
var el = document.getElementById(id);  
el.style.display = (el.style.display == 'none') ? 'block' : 'none';  
}
}
function extintores_ocultos(id){
if (document.getElementById){  
var el = document.getElementById(id);  
el.style.display = (el.style.display == 'none') ? 'block' : 'none';  
}
}
 function piso_oculto(id){
if (document.getElementById){  
var el = document.getElementById(id);  
el.style.display = (el.style.display == 'none') ? 'block' : 'none';  
}
}
 function muestra_unidad(id){
if (document.getElementById){  
var el = document.getElementById(id);  
el.style.display = (el.style.display == 'none') ? 'block' : 'none';  
}
}
 function muestra_procedimientos(id){
if (document.getElementById){  
var el = document.getElementById(id);  
el.style.display = (el.style.display == 'none') ? 'block' : 'none';  
}
}
 function rehumeda_ocultos(id){
if (document.getElementById){  
var el = document.getElementById(id);  
el.style.display = (el.style.display == 'none') ? 'block' : 'none';  
}
}
window.onload = function(){ 
muestra_procedimientos('nuevoprocedimiento');
muestra_unidad('nuevaunidad');
muestra_oculta('nuevoprotocolo'); 
riesgos_ocultos('nuevoriesgo'); 
accidentes_ocultos('nuevoaccidente'); 
extintores_ocultos('nuevoextintor');
rehumeda_ocultos('nuevaredhumeda');
piso_oculto('nuevopiso');           
  
}
</script>
 