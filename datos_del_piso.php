<?php 
 $conn = mysqli_connect("localhost","root","","tesis");
			 
$continente=$_POST['id_edificio'];

	 
$result = mysqli_query($conn, 'SELECT * 
			                         FROM piso WHERE id_edificio ='.$continente.';');
 
 ?>
 <select id="lista2" name="lista2" >   
 <?php
                    while($row=mysqli_fetch_assoc($result)) { 
                        echo "<option  value='$row[id_piso]'>$row[nombre]</option>";  
				    }   ?> 
  </select> 
	 