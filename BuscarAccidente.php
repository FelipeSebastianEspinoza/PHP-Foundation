 
		
	<div class="container">
    <div class="row">
    <div class="col-sm">
      		<form action="" method="post">

 
 <h3 class = "Titulo">Buscar por Nombre</h3>
 <input class="form-control" name="Nombre" type="text" placeholder="Nombre  " Required>
   
 <input type="submit" name="submit" class="btn btn-primary">
</form>
    </div>
    </div>
  </div>
</div>

  
		
	 
	<div class="container">
    <div class="row justify-content-md-center">
    <div class="col-sm">	
    
		 
			 
			 
				<?php
				 
				
				
				
				function mostrar($form_data){
		 	    $fields = array_keys($form_data);
				  $Nombre = $_POST['Nombre'];
				  $Nombre = str_replace ( "'" , "" , $_POST['Nombre']); // ANTI INYECTION
				  
				  
				  
				  
			    $link = mysql_connect('localhost', 'root','');
	            if(!$link){
		         echo'No Se Pudo Establecer Conexion Con El Servidor: '. mysql_error();
	            }else{
		         $base = mysql_select_db('tesis',$link);
		            if(!$base){
			        echo'No se encontro la base de datos: '.mysql_error();
		            }else{	 
		            	$sql = "SELECT * FROM `accidente` WHERE persona LIKE '%".$Nombre."%' ORDER BY persona";
	            		$ejecuta_sentencia = mysql_query($sql);
	         		if(!$ejecuta_sentencia){
		        		echo'hay un error en la sentencia de sql: '.$sql;
		        	}else{
	 
			        	$Reacondicionamiento = mysql_fetch_array($ejecuta_sentencia);
						
		         	}
		         }
	            }
									if($Reacondicionamiento['id_edificio']==""){
				 echo "<script>
					alert('No existen resultados de busqueda');
				  </script>"; 
				  
			  }
					
					
 
			 
					for($i=0; $i<$Reacondicionamiento; $i++){
                        Echo "<b>ID Brigadista : </b>"; 
						    echo"<tr>";
							echo"<td>";
							 
								echo$Reacondicionamiento['id_edificio'];
								
							echo"</td>";
							echo"</br>";
							
                        Echo "<b>ID Brigada : </b>";							
							 echo"<tr>";
							echo"<td>";
								echo$Reacondicionamiento['persona'];
							echo"</td>";
							echo"</br>";
							
                      
 		
					 
					 	echo"</br>";
							echo"</br>";
						echo"</tr>";
						
						$Reacondicionamiento = mysql_fetch_array($ejecuta_sentencia);	
					}
					 
					
				}
				?>
			
 
  	    </div>
  </div>
</div>
 
		
		
 

<?php
 
 if(isset($_POST['submit'])){
  $Nombre1 = array("Nombre"=>$_POST['Nombre']); 
  mostrar($Nombre1);
 
 }
 
?>

 
