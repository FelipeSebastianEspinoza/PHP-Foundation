  <?php  
 $link = new PDO('mysql:host=localhost;dbname=tesis', 'root', '');  
 $id_edificio = $_POST["id"]; 
 session_start();
						 
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
				if(isset($_SESSION['usuario'])){
                echo'<th style="font-weight: normal;"width="150">'.$row["porcentaje_hacinamiento"].'</th>  ';
                echo'</tr>';
                echo'<tr>';
                echo'<th width="50">%Hacinamiento: </th>';
				}
                echo'<th style="font-weight: normal;"width="150">'.$row["area_total"].'</th>';
                echo'</tr>';  	
                echo'</thead>';
                echo'</table>';
				
				if(isset($_SESSION['usuario'])){
				echo '<button type="button" class="success button">Modificar</button>';
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
	 if(isset($_SESSION['usuario'])){
	      echo '<button type="button" class="success button">Modificar</button>'; 
	  }
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
	 
	 
	 
	 
	
	

	
	
	
	
<footer>
<div class="grid-x grid-margin-x expanded callout secondary">
<div class="large-4 cell">
<h5>FLICKR IMAGES</h5>
 
</div>
<div class="large-4 cell">
<h5>FLICKR IMAGES</h5>
 
</div>
<div class="large-4 cell">
<h5>RANDOM MAG</h5>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti quam voluptatum vel repellat ab similique molestias molestiae ea omnis eos, id asperiores est praesentium, voluptate officia nulla aspernatur sequi aliquam.</p>
</div>
</div>
<div class="grid-x grid-margin-y expanded">
<div class="medium-6 cell">
<ul class="menu">
<li><a href="#">Legal</a></li>
<li><a href="#">Partner</a></li>
<li><a href="#">Explore</a></li>
</ul>
</div>
<div class="medium-6 cell">
<ul class="menu align-right">
<li class="menu-text">Copyright © 2099 Random Mag</li>
</ul>
</div>
</div>
</footer>
	
	
 
	
	 
	 
	 
	 
	 
	 
 

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
   </div> 
  </body>
</html>

<style>
$menu-hover-lines-transition: all 0.35s ease;
$menu-hover-lines-border-width: 3px;

.menu-hover-lines {
  text-align: center;
  text-transform: uppercase;
  font-weight: 500;
  letter-spacing: 1px;
  transition: $menu-hover-lines-transition;

  li a {
    padding: 0.75rem 0;
    color: rgba($body-font-color, 0.5);
    position: relative;
    margin-left: 1rem;
  }

  li:first-child a {
    margin-left: 0;
  }

  li.active > a {
    background-color: transparent;
  }

  a:before,
  a::after {
    height: $menu-hover-lines-border-width;
    position: absolute;
    content: '';
    transition: $menu-hover-lines-transition;
    background-color: $primary-color;
    width: 0;
  }

  a::before {
    top: 0;
    left: 0;
  }

  a::after {
    bottom: 0;
    right: 0;
  }

  a:hover,
  li.active > a {
    color: $body-font-color;
    transition: $menu-hover-lines-transition;
  }

  a:hover::before,
  .active a::before,
  a:hover::after,
  .active a::after {
    width: 100%;
  }
}

.menu-hover-lines {
  text-align: center;
  text-transform: uppercase;
  font-weight: 500;
  letter-spacing: 1px;
  transition: all 0.35s ease;
}

.menu-hover-lines li a {
  padding: 0.75rem 0;
  color: rgba(10, 10, 10, 0.5);
  position: relative;
  margin-left: 1rem;
}

.menu-hover-lines li:first-child a {
  margin-left: 0;
}

.menu-hover-lines li.active > a {
  background-color: transparent;
}

.menu-hover-lines a:before,
.menu-hover-lines a::after {
  height: 3px;
  position: absolute;
  content: '';
  transition: all 0.35s ease;
  background-color: #1779ba;
  width: 0;
}

.menu-hover-lines a::before {
  top: 0;
  left: 0;
}

.menu-hover-lines a::after {
  bottom: 0;
  right: 0;
}

.menu-hover-lines a:hover,
.menu-hover-lines li.active > a {
  color: #0a0a0a;
  transition: all 0.35s ease;
}

.menu-hover-lines a:hover::before,
.menu-hover-lines .active a::before,
.menu-hover-lines a:hover::after,
.menu-hover-lines .active a::after {
  width: 100%;
}


</style>
 <style>
      * {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }

      body {
        background: #fff;
        color: #444;
        font: 16px/1.5 "Helvetica Neue", Helvetica, Arial, sans-serif;
      }

      a, 
      a:visited {
        color: #888;
        text-decoration: underline;
      }
      a:hover, 
      a:focus { color: #000; }

      h1 {
        border-bottom: 2px solid #ddd;
        color: #888;
        font-size: 36px;
        font-weight: 300;
        margin-bottom: 20px;
        padding: 20px 0;
      }

      .container {
        margin: 0 auto;
        min-width: 880px;
        padding: 0 40px;
        width: 80%;
      }

      .glyph {
        border-bottom: 1px dotted #ccc;
        padding: 10px 0 20px;
        margin-bottom: 20px;
      }

      .preview-glyphs { vertical-align: bottom; } 

      .preview-scale { 
        color: #888;
        font-size: 12px; 
        margin-top: 5px;
      }

      .step {
        display: inline-block;
        line-height: 1;
        width: 10%;
      }

      
      .size-12 { font-size: 12px; }
      
      .size-14 { font-size: 14px; }
      
      .size-16 { font-size: 16px; }
      
      .size-18 { font-size: 18px; }
      
      .size-21 { font-size: 21px; }
      
      .size-24 { font-size: 24px; }
      
      .size-36 { font-size: 36px; }
      
      .size-48 { font-size: 48px; }
      
      .size-60 { font-size: 60px; }
      
      .size-72 { font-size: 72px; }
      

      .usage { margin-top: 10px; }

      .usage input {
        font-family: monospace;
        margin-right: 3px;
        padding: 2px 5px;
        text-align: center;
      }

      .usage .point { width: 150px; }

      .usage .class { width: 250px; }

      .footer {
        color: #888;
        font-size: 12px;
        padding: 20px 0;
      }
    </style>