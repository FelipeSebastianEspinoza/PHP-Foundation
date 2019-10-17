<center><div class="card" style="width: 300px; ">
  <div class="card-divider">
    ÍNDICE UV 
  </div>
    <center>Concepción</center> 
   
    
	<?php
 
        require 'simple_html_dom.php';
		$html = file_get_html('https://www.woespana.es/Chile/Concepcion/IndiceUV.html/');
		
		$uv = $html->find('div[class=zent_r2]');
	   
   	    $cont=1;//por tema de la pagina pasa 3 veces 
		
		foreach ($uv as $inuv){
	 
	    if($cont==2){
			$datouv0 = $inuv->find('td',1);
			$datouv1 = $inuv->find('td',2);
			$datouv2 = $inuv->find('td',3);
			$datouv3 = $inuv->find('td',4);
			$datouv4 = $inuv->find('td',5);
			$datouv5 = $inuv->find('td',6);
			$datouv6 = $inuv->find('td',7);
	        $datouv7 = $inuv->find('td',8);
		    echo '<table>';
            echo '<thead>';    
            echo '<tr>';  
			echo '<td>'; 
		    echo  $datouv0;
            echo '</td>';
            echo '<td>';			
	  	    echo  $datouv1;
            echo '</td>';
            echo '<td>';			
		    echo  $datouv2;
            echo '</td>';			
	        echo '</tr>';
			echo '<tr>';
			echo '<td>';
			echo  $datouv5;
			echo '</td>';
			echo '<td>';
			echo  $datouv6;  
			echo '</td>';
			echo '<td>';
			echo  $datouv7;
			echo '</td>';
			 
            echo '</tr>';			
            echo '</thead>';
            echo '</table>';
		}
			$cont=$cont+1;
		}
    ?>
 
  <img src="img/uviscale.jpg" alt="Italian Trulli">
 
</div></center>
 