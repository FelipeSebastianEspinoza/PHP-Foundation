<?php 
$conexion=mysqli_connect('localhost','root','','tesis');
$id_edificio=$_POST['id_edificio'];

	$sql="SELECT *
		from piso 
		where id_edificio='$id_edificio'";

	$result=mysqli_query($conexion,$sql);

	 echo'<select class="form-control form-control-sm" name="id_piso">';

 while($row=mysqli_fetch_assoc($result)) { 
                        echo "<option value='$row[id_piso]'>$row[nombre]</option>";  
				    }

    echo'</select>';
	

?>