                <div class="top-bar" id="realEstateMenu">
                    <div class="top-bar-left">
                        <ul class="menu menu-hover-lines">
                            <li class="active"><a href="Principal.php">Página Principal</a></li>
							<?php 
			         			if(isset($_SESSION['usuario'])){
									
                                echo '<li><a href="manual/Manual.pdf" target="_blank">Manual de Usuario</a></li>';          
					  
					        	}
						    ?> 
                           <!-- <li><a href="#">Blog</a></li> -->
 
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