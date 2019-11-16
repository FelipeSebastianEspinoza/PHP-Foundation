 

 <center>
    <link href="css/zoom-marker.css" rel="stylesheet"/>
    <style>
        .mapaimagens3{
            width: 800px;
           margin-bottom: 17px;
		   margin-top: 6px;
		   
        }
        img{
            width: 600px;
        }
    </style>
 
 
  <?php
$link = new PDO('mysql:host=localhost;dbname=tesis', 'root', '');  
?>  
 
		</br></br>
    <div class="mapaimagens3" >
	
	 <!--
        <img usemap="#edificiomap" style=" width:100%;max-width:1356px;min-width:678px;
					 height:100%;max-height:1012px;min-height:506px;" src="img/mapa.jpg" name="viewArea" id="viewArea" draggable="false" />
    -->
	<img usemap="#edificiomap" style="width:678px;
					 height:100%;max-height:1012px;min-height:506px;" src="img/mapa.jpg" name="viewArea" id="viewArea" draggable="false" />
   
	
	
	
	</div>
	 </center>
 
    <script src="js/jquery.min.js"></script>
    <script src="js/zoom-marker.min.js"></script>
 	 <script src="js/jquery.mousewheel.min.js"></script>  
    <script>
	 
        $('#viewArea').zoomMarker({
            src: "img/mapa.jpg",
            rate: 0.2,
            markers: [
			 
				<?php foreach ($link->query('SELECT * from zonadeseguridad') as $row){  
				if($row['eliminar']==0){ 	
				?> 
				{    
                    src: "img/marker4.png",
                    x: <?php echo $row['posx']?>,
                    y: <?php echo $row['posy']?>,
                    size: 35,

                    click: function(obj){
 
                    document.getElementById("edGantes").style.display = "block";
                    document.getElementById('edGantes').src='imagenes/<?php echo $row['imagen']?> ';
                    document.getElementById('grifoTitulo').innerHTML = "<?php echo $row['nombre']?> "; 
                    document.getElementById('grifoParrafo').innerHTML = "<?php echo $row['descripcion']?>"; 
 
                    }		
                },
 <?php
				}	 }
?>
            ]
        })
		
    </script>
 
 
 	 
	 
	 
	 
	 
	 
  