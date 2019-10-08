<?php 
 $conn = mysqli_connect("localhost","root","","tesis");
			 
$id_edificio=$_POST['id_edificio'];
 $id_piso=$_POST['id_piso'];
	 
$result = mysqli_query($conn, 'SELECT * 
			                         FROM piso WHERE id_edificio ='.$id_edificio.'
							 
									           ;');
 
 ?>
 <select id="lista2" name="lista2" >   
 <?php
                    while($row=mysqli_fetch_assoc($result)) { 
					if( $id_piso  ==$row[id_piso]){
						echo "<option value='$row[id_piso]'selected>$row[nombre]</option>";	
					}else{
						 echo "<option  value='$row[id_piso]'>$row[nombre]</option>";  
					}
                        
				    }   ?> 
  </select> 
	 