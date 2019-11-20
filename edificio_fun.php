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
	 
	
 
 
 
 </div>
 
 </center>
 
	 
	 
	 
  