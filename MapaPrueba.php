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
                <div id="load_tweets2"></div>
            </div>
        </div>
</div>
		
        </div>
	 
 
  <center>
  INDICE UV
  </center>

	
<footer>
<div class="grid-x grid-margin-x expanded callout secondary">
    <div class="large-4 cell">
        <h5>FLICKR IMAGES</h5>
    </div>
    <div class="large-4 cell">
        <h5>FLICKR IMAGES</h5>
    </div>
    <div class="large-4 cell">
        <h5>RANDOM 5MAG</h5>
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