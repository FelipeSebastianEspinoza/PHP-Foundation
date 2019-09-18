 

 <center>
    <link href="css/zoom-marker.css" rel="stylesheet"/>
    <style>
        .container{
            width: 800px;
            margin: 30px auto;
        }
        img{
            width: 600px;
        }
    </style>
 
 
  <?php
$link = new PDO('mysql:host=localhost;dbname=tesis', 'root', '');  
?>  
 
	
    <div class="container" >
	
	
    <!--
        <img usemap="#edificiomap" style=" width:100%;max-width:1356px;min-width:678px;
					 height:100%;max-height:1012px;min-height:506px;" src="img/mapa.jpg" name="viewArea" id="viewArea" draggable="false" />
    -->
	<img usemap="#edificiomap" style="width:678px;
					 height:100%;max-height:1012px;min-height:506px;" src="img/mapa.jpg" name="viewArea" id="viewArea" draggable="false" />
   
	
	
	
	</div>
 <style>
 
 
 </style>
    <script src="js/jquery.min.js"></script>
    <script src="js/zoom-marker.min.js"></script>
 	 <script src="js/jquery.mousewheel.min.js"></script>  
    <script>
 
        $('#viewArea').zoomMarker({
            src: "img/mapa.jpg",
            rate: 0.2,
            markers: [
			 
		 
				<?php foreach ($link->query('SELECT * from grifo') as $row){ // aca puedes hacer la consulta e iterarla con each. ?> 
				{ 
                    src: "img/marker4.png",
                    x: <?php echo $row['posx'] ?>,
                    y: <?php echo $row['posy'] ?>,
                    size: 35,
                    click: function(obj){
                        alert('esto es una prueba <?php echo $row['nombre'] ?>');
                    }		
                },
 <?php
  }
?>
            ]
        })
		
    </script>
 
 </center>
 	 
	 
	 
	 
	 
	 
  