  <?php  
 $link = new PDO('mysql:host=localhost;dbname=tesis', 'root', '');  
 $id_area = $_POST["id_area"]; 
 $id_piso = $_POST["id_piso"]; 
 $id_edificio = $_POST["id_edificio"];
  session_start();
 if (isset($_SESSION['usuario'])){
 
 
   if(!empty($_POST['id_piso'])) {//si no esta vacio
$_SESSION['id_piso']=$_POST['id_piso'];
$id_piso=$_POST['id_piso'];
}else{
	 $_POST['id_piso']=$_SESSION['id_piso'];
     $id_piso=$_POST['id_piso'];
}
 
}else{
	$id_piso=$_POST['id_piso'];
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
<?php
$conn = mysqli_connect("localhost","root","","tesis");
$result = mysqli_query($conn, 'SELECT * FROM area_del_edificio  
                                   WHERE id_area ='.$id_area.';');
while($row = mysqli_fetch_array($result)){
 echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	   
 
echo '<h4><input style="margin: 0;" class="text-center"type="text" id="nombre"name="nombre" class="form-control" value="'.$row["nombre"].'" Required></h4>';									   
?>
<hr>
</div>
<div class="callout">
<div class="grid-x grid-margin-x">

 
<div class="show-for-large large-3 cell">  
<?php
echo '<input type=image class="thumbnail"
 
  style=" max-width: 400px;
  max-height: 400px;
  width: auto;
  display: block;
  margin: 0 auto;"  
  
  src="data:image/png;base64,'.base64_encode( $row["imagen"] ).'"/>';
 echo '<input type="file" id="inputImagen" name="ARCHIVO" size="20" class="form-control" placeholder="Imagen" >'; 							   
?>
</div>

<div class="medium-2 large-1 cell">
 

</div>

<div class="medium-10 large-8 cell">
<?php
  echo'<table>';
                echo'<thead>';
                echo'<tr>';
				
                echo'<th width="50">Estado: </th>';
                echo'<th style="font-weight: normal;"width="150">';  
				echo '<input type="text" id="estado"name="estado" class="form-control" value="'.$row["estado"].'" Required>';
                echo '</th>';
				
				echo'<th width="50">N°Extintores: </th>';
                echo'<th style="font-weight: normal;"width="150">';  
				echo '<input type="text" id="n_extintores"name="n_extintores" class="form-control" value="'.$row["n_extintores"].'" Required>';
                echo '</th>';

			    echo'</tr>';
				
                echo'<tr>';
                echo'<th width="50">Area Real: </th>';
                echo'<th style="font-weight: normal;"width="150">';  
				echo '<input type="text" id="area_real"name="area_real" class="form-control" value="'.$row["area_real"].'" Required>';
                echo '</th>';
				
				
				if(isset($_SESSION['usuario'])){
                echo'<th width="50">Confort: </th>';	
                echo'<th style="font-weight: normal;"width="150">';  
				echo'<input type="text" id="confort"name="confort" class="form-control" value="'.$row["confort"].'" Required>';
                echo'</th>';
                echo'</tr>';
                echo'<tr>';
                echo'<th width="50">%Hacinamiento: </th>';
			    echo'<th style="font-weight: normal;"width="150">';  
				echo '<input type="text" id="porcentaje_hacinamiento"name="porcentaje_hacinamiento" class="form-control" value="'.$row["porcentaje_hacinamiento"].'" Required>';
                echo '</th>';
				echo'<th><th>'; 
				echo'</th></th>'; 
				echo'</tr>'; 
				}
	            echo'</thead>';
                echo'</table>';
				                 
                echo'<table>';
				echo'<thead>';
                echo'<tr>';
                echo'<th width="50">Departamento: </th>';
 
                echo '<td>' ;
	            ?> <textarea name="departamento" type="text"rows="5" cols="20"  Required><?php echo utf8_encode($row['departamento']) ?></textarea><?php
                echo '</td>';
				echo'</th>';
				
				
				
				echo'<th><th>'; 
				echo'</th></th>'; 
				echo'</tr>'; 
                
				echo'<tr>';
                echo'<th width="50">Descripción: </th>';
	 
                echo '<td>' ;
	            ?> <textarea name="descripcion" type="text"rows="5" cols="55"  Required><?php echo utf8_encode($row['descripcion']) ?></textarea><?php
                echo '</td>';
 
				echo'</th>';
				echo'<th><th>'; 
				echo'</th></th>'; 
				echo'</tr>'; 

				
                echo'</thead>';
                echo'</table>';
				if(isset($_SESSION['usuario'])){
				 echo'<button class="success button" type="submit" name="submitModificarArea">Registrar</button> ';
				}
				
				
				
}									   
?>
</br>
 
 <input type="hidden" name="id_edificio" value="<?php echo $id_edificio ?>"/>
 <input type="hidden" name="id_piso" value="<?php echo $id_piso ?>"/>
 <input type="hidden" name="id_area" value="<?php echo $id_area ?>"/>
 </form>
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
   </div> 
  </body>
</html>
<?php
include("guardar.php");
 
if(isset($_POST['submitModificarArea'])){
 
    $campos = array("id_area"=> $_POST['id_area'] ,
	"nombre"=>$_POST['nombre'],"estado"=>$_POST['estado'],
	"n_extintores"=>$_POST['n_extintores'],"descripcion"=>$_POST['descripcion']
	,"area_real"=>$_POST['area_real'],"confort"=>$_POST['confort']
	,"departamento"=>$_POST['departamento'],"porcentaje_hacinamiento"=>$_POST['porcentaje_hacinamiento']
	,"imagen"=>$_POST['ARCHIVO']); 
 
    $nuevo = new GuardarArea("tesis"); 
    $nuevo->ModificarPiso($campos);
}
 
?>
 