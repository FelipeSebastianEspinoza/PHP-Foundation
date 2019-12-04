<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet"   href="css/foundation.css">
    <link rel="stylesheet"   href="css/app.css">
    <link rel="stylesheet"   href="foundation-icons/foundation-icons.css" />
  </head>

<body>

  <div class="off-canvas position-left" id="offCanvasLeftOverlap" data-off-canvas data-transition="overlap">
  <!-- Your menu or Off-canvas content goes here -->
 
  </div>
 
  <div class="off-canvas-content" data-off-canvas-content>
    <article class="grid-container">
    <div class="grid-x align-center">
	
        <div class="formulario_login"> 
		<form class="log-in-form" action="login.php" method="post">
		<?php
            session_start();
                if(isset($_SESSION["usuario"])){
	                echo ""; 
                }else if(isset($_GET["cerrar_session"])){
                    echo ""; 
                }else if(isset($_GET["datos_incorrectos"])){
	                echo "Datos incorrectos"; 
                }
        ?>
            <h4 class="text-center">Ingreso al sistema</h4>
			</br>
		    <h4 class="text-center">Prevención de Riegos</h4>
            <label>Email
            <input type="text" placeholder=" " name="login">
            </label>
            <label>Contraseña
            <input type="password" placeholder="Contraseña" name="password">
            </label>
            <p><input type="submit" name="enviar" class="button expanded" value="Login"></p>
			<center><button class="active"><a href="Principal.php">Entrar como invitado</a></button></center>
            <!--<p class="text-center"><a href="#">Olvidaste tu contraseña?</a></p>-->
        </form>
        </div>
    </div>
    </article>
 
<div id="pie_de_pagina">
    <footer>
        <div class="grid-x grid-margin-y expanded">
        <div class="medium-6 cell">
            <ul class="menu"> <!--
                <li><a href="#">Legal</a></li>
                <li><a href="#">Partner</a></li>
                <li><a href="#">Explore</a></li>  -->
            </ul>
        </div>
    <div class="medium-6 cell">
        <ul class="menu align-right">
         <!--   <li class="menu-text">Copyright © 2099 Random Mag</li>     -->
        </ul>
    </div>
        </div>
    </footer>
</div>	 
 
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
   </div> 
</body>
</html>

<style>
 .log-in-form {
  border: 1px solid $medium-gray;
  padding: $form-spacing;
  border-radius: $global-radius;
}



.log-in-form {
  border: 1px solid #cacaca;
  padding: 1rem;
  border-radius: 0;
}

.formulario_login {
  position: absolute;
   width: 30%;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}

#pie_de_pagina {
    width: 100%;
    height: 60px;
    position: absolute;
    bottom: 0;
    left: 0;
}
</style>
  