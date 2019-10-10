  <?php  
 $link = new PDO('mysql:host=localhost;dbname=tesis', 'root', '');  
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
<h4 style="margin: 0;" class="text-center">Áreas ubicadas en este piso</h4>
<hr>
</div>
          <div class="callout">
		 <div class="grid-x grid-margin-x">
         <div class="show-for-large large-3 cell">  
		  
           <?php
echo'</div>';
echo'<div class="grid-x grid-margin-x expanded ">';
		   
		   $conn = mysqli_connect("localhost","root","","tesis");
           $result = mysqli_query($conn, 'SELECT nombre,descripcion,imagen,id_area FROM area_del_edificio  
                                   WHERE id_piso ='.$id_piso.';');
			    if($result==null){
				    echo'';
			    }else{
 
                    while($row=mysqli_fetch_assoc($result)) { 
                     // echo '<img   src="data:image/png;base64,'.base64_encode( $row["imagen"] ).'"/>';
 
 
 
echo'<div class="large-4 cell">';
echo'<div class="media-object ">';
echo'<div class="media-object-section">';

echo'<form action="PisoArea.php" method="post">'; 
echo '<input type=image class="thumbnail"
 
  style=" max-width: 200px;
  max-height: 200px;
  width: auto;
  display: block;
  margin: 0 auto;"  
  
  src="data:image/png;base64,'.base64_encode( $row["imagen"] ).'"/>';
echo '<input type="hidden" name="id_area" value='.$row["id_area"].' />';
echo '<input type="hidden" name="id_piso" value='.$id_piso.' />';
echo '<input type="hidden" name="id_edificio" value='.$id_edificio.' />';
echo'</form>';


echo'</div>';
echo'<div class="media-object-section">';
echo'<h5>';
echo utf8_encode($row["nombre"]);
echo'</h5>';
echo'<p>';
echo utf8_encode($row["descripcion"]);
echo'</p>';
echo'</div>';
echo'</div>';
echo'</div>';

				    } 
				 }	 

				 
				 
				 
				 
   
 ?> 
<div class="large-4 cell">
</br>
 <form action="Edificio.php" method="post"> 
 <input type="hidden" name="id_edificio" value="<?php echo $id_edificio ?>"/>
 <input type="submit" class="button primary"value="Volver Al Edificio"></input> 
 </form>
</div>
 
 
</div>
 
</div>

<?php 
 	if(isset($_SESSION['usuario'])){
 ?>
 		
  <insertar>
        <div class="titulo_boton">
<?php 	 if(isset($_SESSION['usuario'])){?>
  </br><a style='cursor: pointer;' onClick="pisonombre_oculto('modificarnpiso')" title="" class="success button">Modificar Nombre del piso</a>
<?php 	 }?>
        </div>

<div id="modificarnpiso">	
	<?php 					
					 
						
				echo'</br>';
                echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	
				echo '<input type="hidden" name="id_edificio" value='.$id_edificio.' />';
				echo '<input type="hidden" name="id_piso" value='.$id_piso.' />';
				
 
			    echo'<label>Nombre del Piso:';
                echo'<input type="text" id="nombre" name="nombre" class="form-control" value="" >';
                echo'<input type="submit" name="submitpiso" class="button success"value="Registrar"></input>';
                echo'</form>';
 
				
					}
        echo'</label>';
        echo'</div>';
 // Añadir área
 	if(isset($_SESSION['usuario'])){
 ?>
      <div class="titulo_boton">
<?php 	 if(isset($_SESSION['usuario'])){?>
  </br><a style='cursor: pointer;' onClick="creararea_oculto('creararea')" title="" class="success button">Añadir Área</a>
<?php 	 }?>
        </div>
 
<div id="creararea">	
	<?php 					
					 
						
				echo'</br>';
                echo '<form class="formulario" action="" method="post" id="usrform" enctype="multipart/form-data">';	
				echo '<input type="hidden" name="id_edificio" value='.$id_edificio.' />';
				echo '<input type="hidden" name="id_piso" value='.$id_piso.' />';
				
 
			    echo'<label>Nombre del Piso:';
                echo'<input type="text" id="nombre" name="nombre" class="form-control" value="" >';
                echo'<input type="submit" name="submitpiso" class="button success"value="Registrar"></input>';
                echo'</form>';
 
				
					 
        echo'</label>';
        echo'</div>';
	}
        echo'</div>';
        echo'</div>';
 ?> 
 
 
 
 
 
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
   </div> 
  </body>
</html>
<?php
include("guardar.php");
 
if(isset($_POST['submitpiso'])){
 
    $campos = array("id_piso"=> $_POST['id_piso'] ,
	"nombre"=>$_POST['nombre']); 
 
    $nuevo = new GuardarPiso("tesis"); 
    $nuevo->ModificarPiso($campos);
} 
?>

<script>
window.onload = function(){ 
pisonombre_oculto('modificarnpiso');
creararea_oculto('creararea');
 
}

function pisonombre_oculto(id){
if (document.getElementById){  
var el = document.getElementById(id);  
el.style.display = (el.style.display == 'none') ? 'block' : 'none';  
}
}
function creararea_oculto(id){
if (document.getElementById){  
var el = document.getElementById(id);  
el.style.display = (el.style.display == 'none') ? 'block' : 'none';  
}
}
</script>
 