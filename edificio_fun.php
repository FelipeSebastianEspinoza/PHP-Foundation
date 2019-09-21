 

 <center>
    <link href="css/zoom-marker.css" rel="stylesheet"/>
    <style>
        .mapaimagen{
            width: 800px;
            margin: 30px auto;
        }
        img{
            width: 600px;
        }
    </style>
 
 
    <div class="mapaimagen" >
	
 <!--
        <img usemap="#edificiomap" style=" width:100%;max-width:1356px;min-width:678px;
					 height:100%;max-height:1012px;min-height:506px;" src="img/mapa.jpg" name="viewArea" id="viewArea" draggable="false" />
    -->
	<img usemap="#edificiomap" style="width:678px;
					 height:100%;max-height:1012px;min-height:506px;" src="img/mapa.jpg" name="viewArea" id="viewArea" draggable="false" />
   
	
	
	
	
	
	
	
	
	  <map name="edificiomap">
            <area style="cursor: pointer;"  shape="rect" coords="199,167,322,194" 
			alt="EdificioGantes" onclick="Gantes()" onmouseover="bigImg()" onmouseout="normalImg()">
             
			   <area style="cursor: pointer;"  shape="rect" coords="636,237,678,299" 
			alt="EdificioGantes" onclick="CasinoOnClick()" onmouseover="casino()" onmouseout="normalImg()">
			
			
      </map>
	</div>
 
 
   
 
 </center>
 
	 
	 
	 
  