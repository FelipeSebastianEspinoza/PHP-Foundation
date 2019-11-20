                <div class="top-bar" id="realEstateMenu">
                    <div class="top-bar-left">
                        <ul class="menu menu-hover-lines">
                            <li class="active"><a href="Principal.php">Home</a></li>
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
									
									?>
									
									<ul class="dropdown menu" data-dropdown-menu>
  <li>
  <a id="botonAlerta"class="button SUCESS  " data-open="offCanvasLeftOverlap">Tareas  
<span class="badge alert">1</span>
  </a> 
    <ul class="menu">
	
      <li><a href="#">Item 1A <span class="badge alert"> 1</span></a></li>
      <li><a href="#">Item 1A <span class="badge alert"> 1</span></a></li>
      <li><a href="#">Item 1A <span class="badge alert"> 1</span></a></li>
 
    </ul>
  </li> 
</ul>
 
									<?php
									
						        	echo '<li><a class="button secondary" data-open="offCanvasLeftOverlap">Menú</a></li>';          
						            echo '<li><a href="cerrar_session.php">Cerrar Sesión</a></li>';
					        	}else{
					        		echo '<li><a href="index.php" class="button secondary">Login</a></li>';
					        	}
						    ?>
                        </ul>
                    </div>
                </div>
				
				
<style>

 .botonAlerta {
  
 
 
      }
      @keyframes glowing {
      0% {   box-shadow: 0 0 5px RED; }
      50% {   box-shadow: 0 0 20px RED; }
      100% {  box-shadow: 0 0 5px RED; }
      }
       #botonAlerta {
      animation: glowing 2300ms infinite;
      }
</style>	