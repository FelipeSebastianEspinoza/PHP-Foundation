   <?php
 session_start();

 ?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <title>Principal</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="foundation-icons/foundation-icons.css" />
  </head>

  <body>
    <div class="off-canvas position-left" id="offCanvasLeftOverlap" data-off-canvas data-transition="overlap">
        <?php include 'BarraLateral.php'; ?>
    </div>
 
  <div class="off-canvas-content " data-off-canvas-content  >
     <div class="grid-x grid-padding-x">
        <div class="large-12 cell" >
 
        <?php include 'Top-Bar2.php'; ?> 
 
 
        
  
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
/*var auto_refresh = setInterval(
function ()
{ 
$('#load_tweets').load('pruebamap.php').fadeIn("slow");
}, 5000); // refresh every 10000 milliseconds
*/</script>
 
  <center>
  <button class="button" onclick="MostrarEdificios()">Edificios</button>
  
   <?php if (isset($_SESSION['usuario'])){  ?>
  <button class="button" onclick="MostrarEdificios2()">Estado de Edificios</button>
   <?php } ?>
   
  <button class="button" onclick="MostrarGrifo()">Grifos y Redes </button>
  <button class="button" onclick="MostrarZonadeSeguridad()">Zona de Seguridad</button>
   <?php if (isset($_SESSION['usuario'])){  ?>
  <button href="Mutual.php" class="button" onclick="window.location.href = 'Mutual.php';">Actividades y Mutual</button>
   <?php } ?>
  
<?php
$conn = mysqli_connect("localhost","root","","tesis");
$result = mysqli_query($conn, 'SELECT * FROM  plandeemergencia ');
while($row = mysqli_fetch_array($result)){  
if(!empty($row["archivo"])){ ?>
<a href="pdf/<?php  echo $row["archivo"] ;?>" target="_blank"><button class="button">Plan de Emergencia</button></a>
  
<?php }} ?>
  
  
  </center>
  
  
 
<div class="grid-x grid-margin-x expanded">
    <div class="large-7 cell">
        <div id="load_tweets"></div>
    </div>
    <div class="large-1 cell" style="pointer-events:none"></div>
        <div class="large-4 cell">
            <div class="large-6 cell">
			
                <div id="load_tweets2">
				
				</div>
				
				<?php  require 'indiceUV.php';?>	

				 
				 
				
            </div>
			
        </div>
		
</div>
		 <?php
  
     require 'footer.php';
	   
?>	
        </div>
	 
 
 
 

 	
 
	
<script>
$( document ).ready(function() {
 $('#load_tweets').load('edificio_fun.php').fadeIn("slow");
 $('#load_tweets2').load('edificio_fun_comp.php').fadeIn("slow");
});
function MostrarGrifo() {
 $('#load_tweets').load('grifo_fun.php').fadeIn("slow");
 $('#load_tweets2').load('iconos_fun_comp.php').fadeIn("slow");
}
 
function MostrarZonadeSeguridad() {
 $('#load_tweets').load('zonadeseguridad_fun.php').fadeIn("slow");
 $('#load_tweets2').load('iconos_fun_comp.php').fadeIn("slow");
}
function MostrarEdificios() {
 $('#load_tweets').load('edificio_fun.php').fadeIn("slow");
 $('#load_tweets2').load('edificio_fun_comp.php').fadeIn("slow");
}
function MostrarEdificios2() {
 $('#load_tweets').load('edificio_fun2.php').fadeIn("slow");
 $('#load_tweets2').load('edificio_fun_comp.php').fadeIn("slow");
}
</script>
 
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
	 <link rel="stylesheet" href="css/estilogeneral.css" />
   </div> 
  </body>
</html>

 