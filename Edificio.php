   <?php  
 $link = new PDO('mysql:host=localhost;dbname=tesis', 'root', '');  
 
  session_start();
 
 if (isset($_SESSION['usuario'])){
 
   if(!empty($_POST['id_edificio'])) { 
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

 
        <?php include 'Top-Bar.php'; ?>
 
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
				echo'<tr>';
                echo'<th width="50">N°Docentes: </th>';
                echo'<th style="font-weight: normal;"width="150">'.$row["n_docentes"].'</th>';
                echo'<th width="50">N°Funcionarios: </th>';
			    echo'<th style="font-weight: normal;"width="150">'.$row["n_funcionarios"].'</th>';
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
                                   WHERE eliminar!="1"
								   AND id_edificio ='.$id_edificio.';');
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
                echo'<input type="text" id="nombre" name="nombre" class="form-control" value="" Required>';
                echo'<input type="submit" name="submitpiso" class="button success"value="Registrar"></input>';
                echo'</form>';}
	 echo'</div>';
 
        echo'</div>';
 ?> 
 
</div>
</div>
 	  
<ul class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
<!-- <li class="tabs-title is-active"><a href="#panel1c" aria-selected="true">Protocolos</a></li>  
  <li class="tabs-title"><a href="#panel2c">Riesgos</a></li>-->
  
  
  <li class="tabs-title is-active"><a href="#panel2c" aria-selected="true">Riesgos</a></li>
  <li class="tabs-title"><a href="#panel3c">Accidentes</a></li>
  <li class="tabs-title"><a href="#panel4c">Extintores</a></li>
  <li class="tabs-title"><a href="#panel5c">Redes Humedas</a></li>
<!-- <li class="tabs-title"><a href="#panel6c">Unidad de Análisis</a></li> -->
  <li class="tabs-title"><a href="#panel7c">Procedimientos</a></li>
  
 <?php if(isset($_SESSION['usuario'])){ ?>
  <li class="tabs-title"><a href="#panel8c">Enfermedades Profesionales</a></li>
 <?php } ?>
  
</ul>

<div class="tabs-content" data-tabs-content="collapsing-tabs">
  
  <div class="tabs-panel is-active" id="panel2c">
 
	<table>
  <thead>
    <tr>
      <th> </th>
      <th>Nombre</th>
      <th>Descripción</th>
	   <?php   if(isset($_SESSION['usuario'])){ ?>
	   <th>Eliminar</th>
 
	   <?php } ?>
    </tr>
  </thead> 
  <tbody>
 <?php  
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT r.id_riesgo,r.icono,d.id_edificio,d.id_riesgo,r.nombre,descripcion
									  	   FROM riesgo r,edificio_riesgo d  
									       WHERE r.id_riesgo=d.id_riesgo   
										   AND d.id_edificio ='.$id_edificio.' ;');
										   
		    while($row = mysqli_fetch_array($result)){
 
        echo '<tr>';
		
        echo '<td>' ;
	    ?><embed class="thumbnail" src="imagenes\<?php
        echo $row["icono"] ; 
	    ?>" type="image/png" /><?php
	    echo '</td>';
		
	    echo '<td>' ;
	    echo  utf8_encode($row["nombre"]);
	    echo '</td>';
        echo '<td>' ;
	    echo  utf8_encode($row["descripcion"]);
	    echo '</td>';
        if(isset($_SESSION['usuario'])){
 
	    echo'<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
        echo '<input type="hidden" name="id_riesgo" value='.$row["id_riesgo"].' />';
        echo '<td>' ; 
	    ?>  
        <button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="submitquitarriesgo">Eliminar</button> 
        <?php
 
        echo '</td>' ;
        echo'</form>';
        echo '</tr>';
		}
	}
		  ?>
  </tbody>
</table>
 
	<insertar>
<?php  if(isset($_SESSION['usuario'])){?>
<div class="titulo_boton">
 
  </br><a style='cursor: pointer;' onClick="riesgos_ocultos('nuevoriesgo')" title="" class="success button">Asignar Riesgo</a>
 
  </div>

<div id="nuevoriesgo">
<?php 
  	    	    
                echo'<table>';
                echo'<thead>';
                $result = mysqli_query($conn, 'SELECT *
			                                   FROM riesgo 
											   WHERE eliminar!="1";');
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
<?php 			}?>
<insertar>	  
 	  
  </div>
 
  <div class="tabs-panel" id="panel3c">
    <table>
  <thead>
    <tr>
	<?php  
		if(isset($_SESSION['usuario'])){?>
      <th >ID</th>  <?php }
	    ?>
      <th >Fecha</th>
      <th >Tipo</th>
      <th >Número</th>
	   <?php  
		if(isset($_SESSION['usuario'])){
 
	      echo  ' <th width="200">Persona</th>';
		  echo  ' <th width="400">Descripción</th>';  
		  echo  ' <th width="50">Modificar</th>';
		  echo  ' <th width="50">Eliminar</th>';
		}
	    ?>
 
    </tr>
  </thead>
  <tbody>
  <?php  
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT * 
									  	   FROM accidente
									       WHERE eliminar!="1" 
										   AND id_edificio ='.$id_edificio.'
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
	   
 
        echo'</form>';
	   
	    echo'<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
        echo '<input type="hidden" name="id_accidente" value='.$row["id_accidente"].' />';
        echo '<td>' ; 
        ?>  
        <button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminaraccidentes">Eliminar</button> 
        <?php 
 
        echo '</td>' ;
        echo'</form>';
        echo '</tr>';
	    }
				}
		  ?>
 
  </tbody>
</table>
<insertar>
<?php if(isset($_SESSION['usuario'])){?>
<div class="titulo_boton">
  <a style='cursor: pointer;' onClick="accidentes_ocultos('nuevoaccidente')" title="" class="success button">Añadir Accidente</a>
</div>
 
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
<?php
}
?>
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
	   <th width="50">Modificar</th>
	   <th width="50">Eliminar</th>
	  <?php } ?>
    </tr>
  </thead> 
  <tbody>
  <?php  
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT e.id_extintor,e.nombre,e.fecha_carga,e.fecha_venc,e.ubicacion,e.estado,e.id_piso
									  	   FROM extintor e,piso p
									       WHERE e.id_piso=p.id_piso
										   AND e.eliminar!="1"
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
	  echo'</form>';
	  
	  echo'<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
      echo '<input type="hidden" name="id_extintor" value='.$row["id_extintor"].' />';
      echo '<td>' ;    
	  
	  ?>  
      <button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminarextintor">Eliminar</button> 
      <?php
 
      echo '</td>' ;
      echo'</form>';
      echo '</tr>';
	   
	  
 }
 
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
<?php
}
?>
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
	   <th width="50">Modificar</th>
	   <th width="50">Eliminar</th>  
	   <?php } ?>
    </tr>
  </thead> 
  <tbody>
 <?php  
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT r.id_redhumeda,r.nombre,r.ubicacion,r.estado
									  	   FROM red_humeda r,piso p
									       WHERE r.id_piso=p.id_piso
										   AND r.eliminar!="1"
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
	    echo'</form>';
		
	    echo'<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
        echo '<input type="hidden" name="id_redhumeda" value='.$row["id_redhumeda"].' />';
        echo '<td>' ; 
	    ?>  
        <button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminarredhumeda">Eliminar</button> 
        <?php
 
        echo '</td>' ;
        echo'</form>';
        echo '</tr>';
		}
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
<?php
}
?>
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
	  <th width="50">Eliminar</th>
	  <?php } ?>
 
    </tr>
  </thead> 
  <tbody>
  <?php  
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT *
									  	   FROM procedimiento
									       WHERE eliminar!="1"
										   AND id_edificio ='.$id_edificio.';');
 
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
      echo'</form>';
	  
	    echo'<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
        echo '<input type="hidden" name="id_procedimiento" value='.$row["id_procedimiento"].' />';
        echo '<td>' ; 
	    ?>   
        <button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminarprocedimiento">Eliminar</button> 
        <?php
 
        echo '</td>' ;
        echo'</form>';
	  }
      echo '</tr>';
 
				}
 
		  ?>
  </tbody>
</table>

<insertar>
<?php if(isset($_SESSION['usuario'])){?>
<div class="titulo_boton">
 
  <a style='cursor: pointer;' onClick="muestra_procedimientos('nuevoprocedimiento')" title="" class="success button">Asignar Procedimiento</a>
 
  </div>

<div id="nuevoprocedimiento">
<table>
  <thead>
    <tr>
      <th width="300">Reglamento interno</th>
      <th width="300">Elementos de protección personal</th>
      <th width="300">Vestimenta</th> 
	  <th width="300">Herramientas</th>
	  <th width="50">Modificar</th>
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
<?php }?>
<insertar>
</div>
 
<?php if(isset($_SESSION['usuario'])){ ?>
	
   <div class="tabs-panel" id="panel8c">
  <table>
  <thead>
    <tr>
      <th width="100">Fecha</th>
      <th width="300">Enfermedad</th>
      <th width="300">Persona</th>
      <th width="50">Modificar</th>
      <th width="50">Eliminar</th> 
    </tr>
  </thead> 
  <tbody>
  <?php  
			$conn = mysqli_connect("localhost","root","","tesis");

			$result = mysqli_query($conn, 'SELECT r.id_enfermedad_reportada,r.persona,r.fecha,r.id_edificio,r.id_enfermedad,
			                                    e.nombre,e.id_enfermedad 
												 
									  	   FROM enfermedades_reportadas r,enfermedades_profesionales e
									       WHERE r.eliminar!="1"
										   AND r.id_enfermedad=e.id_enfermedad
										   AND r.id_edificio ='.$id_edificio.';');
		    while($row = mysqli_fetch_array($result)){
      echo'<form action="MEnfermedadesReportadas.php" method="post">';	 
      echo '<input type="hidden" name="id_enfermedad_reportada" value='.$row["id_enfermedad_reportada"].' />'; 
      echo '<input type="hidden" name="id_edificio" value='.$id_edificio.' />'; 
	  echo '<tr>';  

	  echo '<td>';  
	  $date=date_create($row["fecha"]);
	  echo date_format($date,"d/m/Y") ;
	  echo '</td>';
	  
	  echo '<td>' ;
	  echo  utf8_encode($row["nombre"]);
	  echo '</td>';
	  
	  echo '<td>' ;
	  echo  utf8_encode($row["persona"]);
	  echo '</td>';
 
 
 
 
 
 
	  if(isset($_SESSION['usuario'])){
	  echo '<td>' ;
      echo'<input type="submit" class="success button"value="Modificar"></input>';
      echo '</td>';
	  echo'</form>';
 
	  
	  echo'<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';
      echo '<input type="hidden" name="id_enfermedad_reportada" value='.$row["id_enfermedad_reportada"].' />';
      echo '<td>' ; 
	  ?>   
      <button onclick="return confirm('Confimar eliminación');"class="alert button" type="submit" name="eliminarreporteenfermedad">Eliminar</button> 
      <?php
      echo '</td>' ;
      echo'</form>';
	  
	   echo '</tr>';
	  }
 
				}
		  ?>
  </tbody>
</table>

<insertar>
<div class="titulo_boton">
<?php 				if(isset($_SESSION['usuario'])){?>
  <a style='cursor: pointer;' onClick="muestra_enfermedad('nuevaenfermedad')" title="" class="success button">Añadir nuevo reporte</a>
<?php 			}?>
  </div>

<div id="nuevaenfermedad">
 <table>
  <thead>
    <tr>
 
      <th width="200">Fecha</th>
	  <th width="400">Persona</th> 
	  <th width="400">Enfermedad</th>
 
 
    </tr>
  </thead>
  <tbody>  
    <tr>
	<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">
	
     
    <td><input type="date" id="inputFecha" name="fecha" class="form-control" placeholder="" Required ></td>
    <td><input type="text" id="inputPersona" name="persona" class="form-control" placeholder="" Required ></td>
    
    <td> 
	
	
	<?php 
 
    $result = mysqli_query($conn, 'SELECT * FROM enfermedades_profesionales
                                   WHERE 1;');
			    if($result==null){
				    echo'';
			    }else{
 
       
                    echo'<select class="form-control form-control-sm" name="id_enfermedad">';
 
                    while($row=mysqli_fetch_assoc($result)) { 
                        echo "<option value='$row[id_enfermedad]'>$row[nombre]</option>";  
				    } 
				 }	 
                echo'</select>';
 
        echo'</label>';
 
		?>
 
	
	</td>
	    <input type="hidden" name="id_edificio" value="<?php echo $id_edificio ?>"/>  
	<td><button class="success button" type="submit" name="submitenfermedad">Registrar</button></td>
  
    </form>
    </tr>
  </tbody>
</table>
</div>

 
<insertar>
</div>

<?php }  ?>
 
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
if(isset($_POST['submitenfermedad'])){
 
 $campos = array("enfermedad_reportada"=> NULL ,
 "fecha"=> $_POST['fecha'] , 
 "persona"=>$_POST['persona'],
 "id_edificio"=>$_POST['id_edificio'],
 "id_enfermedad"=>$_POST['id_enfermedad']); 
 
 $nuevo = new GuardarReporteEnfermedad("tesis"); 
 $nuevo->NuevoReporteEnfermedad($campos);
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
if(isset($_POST['submitpiso'])){
 
 $campos = array("id_piso"=> $_POST['id_piso'] ,
 "nombre"=> $_POST['nombre'],
 "id_edificio"=> $_POST['id_edificio']); 
 
 $nuevo = new GuardarPiso("tesis"); 
 $nuevo->NuevoPiso($campos);
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
if(isset($_POST['eliminarextintor'])){
  
 $campos = array("id_extintor"=>$_POST['id_extintor']); 
  
 $nuevo = new GuardarExtintor("tesis"); 
 $nuevo->EliminarExtintor($campos);
}
if(isset($_POST['eliminaraccidentes'])){
  
 $campos = array("id_accidente"=>$_POST['id_accidente']); 
  
 $nuevo = new GuardarAccidente("tesis"); 
 $nuevo->EliminarAccidente($campos);
}
if(isset($_POST['eliminarredhumeda'])){

 $campos = array("id_redhumeda"=>$_POST['id_redhumeda']); 
  
 $nuevo = new GuardarRedHumeda("tesis"); 
 $nuevo->EliminarRedHumeda($campos);
}
if(isset($_POST['eliminarunidad'])){
	
 $campos = array("id_unidad"=>$_POST['id_unidad']); 
 
 $nuevo = new GuardarUnidad("tesis"); 
 $nuevo->EliminarUnidad($campos);
}
if(isset($_POST['eliminarprocedimiento'])){
	
$campos = array("id_procedimiento"=>$_POST['id_procedimiento']); 
  
$nuevo = new GuardarProcedimiento("tesis"); 
$nuevo->EliminarProcedimiento($campos);  
}
if(isset($_POST['eliminarreporteenfermedad'])){
	
 $campos = array("id_enfermedad_reportada"=>$_POST['id_enfermedad_reportada']); 
 
 $nuevo = new GuardarReporteEnfermedad("tesis"); 
 $nuevo->EliminarReporteEnfermedad($campos);  
}
if(isset($_POST['submitquitarprotocolo'])){
	
 $campos = array("id_protocolo"=>$_POST['id_protocolo'],
 "id_edificio"=>$_POST['id_edificio']); 
 
 $nuevo = new GuardarProtocolo("tesis"); 
 $nuevo->EliminarAsignacionProtocolo($campos);  
}
?>
 
<script>/*
function muestra_oculta(id){
if (document.getElementById){  
var el = document.getElementById(id);  
el.style.display = (el.style.display == 'none') ? 'block' : 'none';  
}
} */

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
/* function muestra_unidad(id){
if (document.getElementById){  
var el = document.getElementById(id);  
el.style.display = (el.style.display == 'none') ? 'block' : 'none';  
}
} */
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
function muestra_enfermedad(id){
if (document.getElementById){  
var el = document.getElementById(id);  
el.style.display = (el.style.display == 'none') ? 'block' : 'none';  
}
}
window.onload = function(){ 
muestra_procedimientos('nuevoprocedimiento');
//muestra_unidad('nuevaunidad');
muestra_enfermedad('nuevaenfermedad');
//muestra_oculta('nuevoprotocolo'); 
riesgos_ocultos('nuevoriesgo'); 
accidentes_ocultos('nuevoaccidente'); 
extintores_ocultos('nuevoextintor');
rehumeda_ocultos('nuevaredhumeda');
piso_oculto('nuevopiso');           
  
}
</script>
 