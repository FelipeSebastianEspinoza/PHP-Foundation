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
						
						session_start();
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
  <button class="button" onclick="MostrarGrifo()">Grifos</button>
  <button class="button" onclick="MostrarZonadeEvacuacion()">Zona de Evacuacion</button>
  <button class="button" onclick="MostrarZonadeSeguridad()">Zona de Seguridad</button>
  </center>
  
  
 
<div class="grid-x grid-margin-x expanded">
    <div class="large-6 cell">
        <div id="load_tweets"></div>
    </div>
    <div class="large-2 cell" style="pointer-events:none"></div>
        <div class="large-4 cell">
            <div class="large-6 cell">
			
                <div id="load_tweets2">
				
				</div>
				
				<?php  require 'indiceUV.php';?>	

				 
				 
				
            </div>
			
        </div>
		
</div>
		
        </div>
	 
 
 
 

 <?php
  
     require 'footer.php';
	   
?>		
 
	
<script>
$( document ).ready(function() {
 $('#load_tweets').load('edificio_fun.php').fadeIn("slow");
 $('#load_tweets2').load('edificio_fun_comp.php').fadeIn("slow");
});
function MostrarGrifo() {
 $('#load_tweets').load('grifo_fun.php').fadeIn("slow");
  $('#load_tweets2').load('iconos_fun_comp.php').fadeIn("slow");
}
function MostrarZonadeEvacuacion() {
 $('#load_tweets').load('zonadeevacuacion_fun.php').fadeIn("slow");
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
</script>
 
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
	 <link rel="stylesheet" href="css/estilogeneral.css" />
   </div> 
  </body>
</html>

 