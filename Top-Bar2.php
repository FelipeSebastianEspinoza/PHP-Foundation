                <div class="top-bar" id="realEstateMenu">
                    <div class="top-bar-left">
                        <ul class="menu menu-hover-lines">
                            <li class="active"><a href="Principal.php">Página Principal</a></li>
							<?php 
			         			if(isset($_SESSION['usuario'])){
									
                                echo '<li><a href="manual/Manual.pdf" target="_blank">Manual de Usuario</a></li>';          
					  
					        	}
						    ?> 
                     <!--       <li><a href="#">Contact</a></li>  -->
                        </ul>
                    </div>
					
                    <div class="top-bar-right">
                        <ul class="menu">
			 		        <?php if(isset($_SESSION['usuario'])){ ?>
							

							
<?php 
$contador=0;	
$conn = mysqli_connect("localhost","root","","tesis");
$sql='SELECT estado FROM extintor 
WHERE eliminar !=1 
AND estado = "Pendiente" 
OR estado = " Pendiente"
';
if ($result=mysqli_query($conn,$sql)){  
 while($row = mysqli_fetch_array($result)){ 
 $contador=$contador+1;
 }  
} 
$sql='SELECT estado FROM red_humeda 
WHERE eliminar !=1 
AND estado = "Pendiente" 
OR estado = " Pendiente"
';
if ($result=mysqli_query($conn,$sql)){  
 while($row = mysqli_fetch_array($result)){ 
 $contador=$contador+1;
 }  
} 
$sql='SELECT estado FROM grifo 
WHERE eliminar !=1 
AND estado = "Pendiente" 
OR estado = " Pendiente"
';
if ($result=mysqli_query($conn,$sql)){  
 while($row = mysqli_fetch_array($result)){ 
 $contador=$contador+1;
 }  
} 
$sql='SELECT estado FROM historialmutual 
WHERE eliminar !=1 
AND estado = "Pendiente" 
OR estado = " Pendiente"
';
if ($result=mysqli_query($conn,$sql)){  
 while($row = mysqli_fetch_array($result)){ 
 $contador=$contador+1;
 }  
} 
$sql='SELECT estado FROM unidad 
WHERE eliminar !=1 
AND estado = "Pendiente" 
OR estado = " Pendiente"
';
if ($result=mysqli_query($conn,$sql)){  
 while($row = mysqli_fetch_array($result)){ 
 $contador=$contador+1;
 }  
} 

 
 

?>				
							
							
							
							
							
							<button <?php if($contador!=0){echo 'id="botonAlerta"';}  ?> class="button" onclick="window.location.href = 'Tareas.php';" style="margin-right:20px">Tareas Pendientes  
							<span class="badge alert"><?php echo $contador;?></span></button>  
 
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