 </br>
 <center>
    <link href="css/zoom-marker.css" rel="stylesheet"/>
    <style>
        .mapaimagen{
            width: 800px;
            margin: 30px auto;
			 position: relative;
        }
        img{
            width: 600px;
        }
    </style>
 
 
    <div class="mapaimagen"    >
	
 <!--
        <img usemap="#edificiomap" style=" width:100%;max-width:1356px;min-width:678px;
					 height:100%;max-height:1012px;min-height:506px;" src="img/mapa.jpg" name="viewArea" id="viewArea" draggable="false" />
    -->
	<img usemap="#edificiomap" 
	                 style="width:678px;height:506px;
					 max-width:678px;min-height:506px;
					 max-width:678px;min-height:506px;" 
					 src="img/mapa.jpg" name="viewArea" id="viewArea" draggable="false" />
 
	    <map name="edificiomap">
            <area style="cursor: pointer;"  shape="rect" coords="199,167,322,194" 
			alt="EdificioGantes" onclick="GantesOnClick()" onmouseover="bigImg()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="636,237,678,299" 
			alt="EdificioGantes" onclick="CasinoOnClick()" onmouseover="casino()" onmouseout="normalImg()">
	        <area style="cursor: pointer;"  shape="rect" coords="510,11,548,32" 
			alt="EdificioGantes" onclick="NicolasCerdaOnClick()" onmouseover="NicolasCerda()" onmouseout="normalImg()">
	        <area style="cursor: pointer;"  shape="rect" coords="538,63,637,114" 
			alt="EdificioGantes" onclick="FacultadCienciasEmpresarialesOnClick()" onmouseover="FacultadCienciasEmpresariales()" onmouseout="normalImg()">
	        <area style="cursor: pointer;"  shape="rect" coords="479,61,505,113"
			alt="EdificioGantes" onclick="BibliotecaOnClick()" onmouseover="Biblioteca()" onmouseout="normalImg()">
	        <area style="cursor: pointer;"  shape="rect" coords="462,281,491,296"
			alt="EdificioGantes" onclick="CasitasOnClick()" onmouseover="Casitas()" onmouseout="normalImg()">
	        <area style="cursor: pointer;"  shape="rect" coords="384,62,465,115" 
			alt="EdificioGantes" onclick="DepartamentoIngenieriaMecanicaOnClick()" onmouseover="DepartamentoIngenieriaMecanica()" onmouseout="normalImg()">
	        <area style="cursor: pointer;"  shape="rect" coords="496,164,514,179"
			alt="EdificioGantes" onclick="EdificioMetodologicoOnClick()" onmouseover="EdificioMetodologico()" onmouseout="normalImg()">

    
    
   
			
      </map>
	 
	
 <?php  
			$conn = mysqli_connect("localhost","root","","tesis");
			$result = mysqli_query($conn, 'SELECT estado,id_edificio  				
						        FROM  edificio   
						        
								 
										   ;');
	                             
	  while($row = mysqli_fetch_array($result)){ 
	  
	  if($row["id_edificio"]=='1' && $row["estado"]=="Pendiente" ){
	  ?>
      <img   class="imgB1" src="img/iconos_edificios/1.png"alt="EdificioGantes" onclick="GantesOnClick()" onmouseover="bigImg()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 164px; 
	   left:258px;
	   cursor:pointer;
	   z-index: 3; 
       width: 124px;"  >
	   <?php
	  }else if($row["id_edificio"]=='2' && $row["estado"]=="Pendiente" ){
	  ?>
      <img class="imgB1" src="img/iconos_edificios/2.png"alt="EdificioGantes" onclick="CasinoOnClick()" onmouseover="casino()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 235px; 
	   left:695px;
	   cursor:pointer;
	   z-index: 3; 
       width: 45px;"  >
	   <?php
	  }
	  }?> 
 
 
 </div>
 
 </center>
 
	 
	 
	 
  