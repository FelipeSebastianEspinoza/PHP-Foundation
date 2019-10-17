<center><div class="card" style="width: 300px;">
  <div class="card-divider">
    <center>ÍNDICE UV</center> 
  </div>
    <center>Concepción</center> 
   
    
	<?php
 
        require 'simple_html_dom.php';
		$html = file_get_html('https://www.woespana.es/Chile/Concepcion/IndiceUV.html/');
		
		$calendario = $html->find('div[class=zent_r2]');
		 
		foreach ($calendario as $cal){
	 
			$mes0 = $cal->find('td',1);
			$mes1 = $cal->find('td',2);
			$mes2 = $cal->find('td',3);
			$mes3 = $cal->find('td',4);
			$mes4 = $cal->find('td',5);
			$mes5 = $cal->find('td',6);
			$mes6 = $cal->find('td',7);
	        $mes7 = $cal->find('td',8);
		    echo '<table>';
            echo '<thead>';
            echo '<tr>';  
		    echo  $mes0;    
	  	    echo  $mes1;   
		    echo  $mes2;  
	        echo '</tr>';
			echo  $mes5;  
			echo  $mes6;  
			echo  $mes7;  
            echo '</thead>';
 
	 
		 
		}
    ?>
 
  
 
</div></center>
 