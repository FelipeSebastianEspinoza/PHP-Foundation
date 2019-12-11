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
		            <area style="cursor: pointer;"  shape="rect" coords="559,386,611,412"
            alt="EdificioGantes" onclick="DepartamentoIngenieriaMecanica2OnClick()" onmouseover="DepartamentoIngenieriaMecanica2()" onmouseout="normalImg()">
			
            <area style="cursor: pointer;"  shape="rect" coords="199,167,322,194" 
			alt="EdificioGantes" onclick="GantesOnClick()" onmouseover="bigImg()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="636,237,678,299" 
			alt="EdificioGantes" onclick="CasinoOnClick()" onmouseover="casino()" onmouseout="normalImg()">
	        <area style="cursor: pointer;"  shape="rect" coords="510,11,548,32" 
			alt="EdificioGantes" onclick="NicolasCerdaOnClick()" onmouseover="NicolasCerda()" onmouseout="normalImg()">
	        <area style="cursor: pointer;"  shape="rect" coords="535,70,601,117" 
            alt="EdificioGantes" onclick="FacultadCienciasEmpresarialesOnClick()" onmouseover="FacultadCienciasEmpresariales()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="479,61,505,113"
			alt="EdificioGantes" onclick="BibliotecaOnClick()" onmouseover="Biblioteca()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="462,281,491,296"
			alt="EdificioGantes" onclick="CasitasOnClick()" onmouseover="Casitas()" onmouseout="normalImg()">
	        <area style="cursor: pointer;"  shape="rect" coords="384,62,465,115" 
			alt="EdificioGantes" onclick="DepartamentoIngenieriaMecanicaOnClick()" onmouseover="DepartamentoIngenieriaMecanica()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="496,164,514,179"
			alt="EdificioGantes" onclick="EdificioMetodologicoOnClick()" onmouseover="EdificioMetodologico()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="106,20,123,33" 
			alt="EdificioGantes" onclick="EdificioEntradaOnClick()" onmouseover="EdificioEntrada()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="264,13,348,32" 
			alt="EdificioGantes" onclick="FacultadArquitecturaOnClick()" onmouseover="FacultadArquitectura()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="357,4,398,28" 
			alt="EdificioGantes" onclick="DepartamentoEstudiosGeneralesOnClick()" onmouseover="DepartamentoEstudiosGenerales()" onmouseout="normalImg()">
			<area style="cursor: pointer;"  shape="rect" coords="291,58,332,115"
			alt="EdificioGantes" onclick="EscuelaArquitecturaOnClick()" onmouseover="EscuelaArquitectura()" onmouseout="normalImg()">
			<area style="cursor: pointer;"  shape="rect" coords="348,89,372,112"
			alt="EdificioGantes" onclick="ParaninfoOnClick()" onmouseover="Paraninfo()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="332,54,386,85"
			alt="EdificioGantes" onclick="EscuelaIngenieriaConstruccionOnClick()" onmouseover="EscuelaIngenieriaConstruccion()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="49,221,121,287"
			alt="EdificioGantes" onclick="GimnasioOnClick()" onmouseover="Gimnasio()" onmouseout="normalImg()">
			<area style="cursor: pointer;"  shape="rect" coords="572,120,607,210"
			alt="EdificioGantes" onclick="AulasACOnClick()" onmouseover="AulasAC()" onmouseout="normalImg()">
			<area style="cursor: pointer;"  shape="rect" coords="528,159,555,208"
			alt="EdificioGantes" onclick="AulasABOnClick()" onmouseover="AulasAB()" onmouseout="normalImg()">
			<area style="cursor: pointer;"  shape="rect" coords="528,259,557,278"
			alt="EdificioGantes" onclick="N1OnClick()" onmouseover="N1()" onmouseout="normalImg()">
			<area style="cursor: pointer;"  shape="rect" coords="410,159,438,186"
			alt="EdificioGantes" onclick="SalasDeEstudioOnClick()" onmouseover="SalasDeEstudio()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="407,185,440,247"
			alt="EdificioGantes" onclick="DepartamentoIngenieriaIndustrialOnClick()" onmouseover="DepartamentoIngenieriaIndustrial()" onmouseout="normalImg()">
			<area style="cursor: pointer;"  shape="rect" coords="409,261,446,295"
			alt="EdificioGantes" onclick="DepartamentoIngenieriaMaderasOnClick()" onmouseover="DepartamentoIngenieriaMaderas()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="447,163,494,199"
			alt="EdificioGantes" onclick="AulasAAOnClick()" onmouseover="AulasAA()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="497,219,514,236" 
			alt="EdificioGantes" onclick="SalaMultipleOnClick()" onmouseover="SalaMultiple()" onmouseout="normalImg()">
			<area style="cursor: pointer;"  shape="rect" coords="457,221,497,267"
			alt="EdificioGantes" onclick="DepartamentoArteCulturaOnClick()" onmouseover="DepartamentoArteCultura()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="330,154,386,174" 
			alt="EdificioGantes" onclick="EscuelaTrabajoSocialOnClick()" onmouseover="EscuelaTrabajoSocial()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="326,299,361,344"
			alt="EdificioGantes" onclick="Casino2OnClick()" onmouseover="Casino2()" onmouseout="normalImg()">
			<area style="cursor: pointer;"  shape="rect" coords="331,367,387,401"
			alt="EdificioGantes" onclick="DireccionDesarrolloEstudiantilOnClick()" onmouseover="DireccionDesarrolloEstudiantil()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="351,419,375,448"
			alt="EdificioGantes" onclick="FederacionEstudiantesOnClick()" onmouseover="FederacionEstudiantes()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="342,474,380,505"
			alt="EdificioGantes" onclick="CentroTecnologicoOnClick()" onmouseover="CentroTecnologico()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="poly" coords="408,428,407,467,480,465,491,434,492,398,461,396,464,430" 
			alt="EdificioGantes" onclick="LaboratorioCienciasConstruccionOnClick()" onmouseover="LaboratorioCienciasConstruccion()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="408,307,464,333"
			alt="EdificioGantes" onclick="PabellonTecnologicoMaderaOnClick()" onmouseover="PabellonTecnologicoMadera()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="421,367,447,421"
			alt="EdificioGantes" onclick="PabellonTecnologicoMaderaOnClick()" onmouseover="PabellonTecnologicoMadera()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="410,329,481,375" 
			alt="EdificioGantes" onclick="PabellonTecnologicoMaderaOnClick()" onmouseover="PabellonTecnologicoMadera()" onmouseout="normalImg()">
			
			<area style="cursor: pointer;"  shape="rect" coords="536,459,561,475" 
			alt="EdificioGantes" onclick="cipaOnClick()" onmouseover="cipa()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="526,390,541,427"
			alt="EdificioGantes" onclick="MantencionOnClick()" onmouseover="Mantencion()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="424,478,451,492"
			alt="EdificioGantes" onclick="N2OnClick()" onmouseover="N2()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="523,306,545,372"
			alt="EdificioGantes" onclick="EscuelaDiseñoIndustrialOnClick()" onmouseover="EscuelaDiseñoIndustrial()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="502,245,522,279"
			alt="EdificioGantes" onclick="CIMUBBOnClick()" onmouseover="CIMUBB()" onmouseout="normalImg()">
           <!-- <area style="cursor: pointer;"  shape="rect" coords="487,364,525,377"
			alt="EdificioGantes" onclick="N3OnClick()" onmouseover="N3()" onmouseout="normalImg()"> -->
            <area style="cursor: pointer;"  shape="rect" coords="251,53,277,152"
			alt="EdificioGantes" onclick="FacultadCienciasOnClick()" onmouseover="FacultadCiencias()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="212,97,251,149" 
			alt="EdificioGantes" onclick="VicerrectoriaOnClick()" onmouseover="Vicerrectoria()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="188,69,212,148"
			alt="EdificioGantes" onclick="RectoriaOnClick()" onmouseover="Rectoria()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="560,389,611,413" 
			alt="EdificioGantes" onclick="RectoriaOnClick()" onmouseover="Rectoria()" onmouseout="normalImg()">
			<area style="cursor: pointer;"  shape="rect" coords="527,210,554,256"
			alt="EdificioGantes" onclick="AulasADOnClick()" onmouseover="AulasAD()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="610,62,637,113"
            alt="EdificioGantes" onclick="FacultadCienciasEmpresariales2OnClick()" onmouseover="FacultadCienciasEmpresariales2()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="334,194,384,225" 
            alt="EdificioGantes" onclick="AulaMagnaOnClick()" onmouseover="AulaMagna()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="330,172,384,199"
            alt="EdificioGantes" onclick="SalaMultipropositoOnClick()" onmouseover="SalaMultiproposito()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="581,319,616,340"
            alt="EdificioGantes" onclick="DepartamentoIngenieriaCivilAmbientalOnClick()" onmouseover="DepartamentoIngenieriaCivilAmbiental()" onmouseout="normalImg()">
 
 
            <area style="cursor: pointer;"  shape="rect" coords="592,348,614,367" 
			alt="EdificioGantes" onclick="TecnologiaEmergenteOnClick()" onmouseover="TecnologiaEmergente()" onmouseout="normalImg()">
 
            <area style="cursor: pointer;"  shape="rect" coords="462,307,513,333"
			alt="EdificioGantes" onclick="BiomaterialesOnClick()" onmouseover="Biomateriales()" onmouseout="normalImg()">
			
            <area style="cursor: pointer;"  shape="rect" coords="411,375,420,399"
			alt="EdificioGantes" onclick="NuevoEdificioOnClick()" onmouseover="NuevoEdificio()" onmouseout="normalImg()">
			
            <area style="cursor: pointer;"  shape="rect" coords="413,401,420,410"
			alt="EdificioGantes" onclick="DepartamentoMatematicasOnClick()" onmouseover="DepartamentoMatematicas()" onmouseout="normalImg()">
			
            <area style="cursor: pointer;"  shape="rect" coords="412,412,421,422"
			alt="EdificioGantes" onclick="LaboratorioEconomiaEspacialOnClick()" onmouseover="LaboratorioEconomiaEspacial()" onmouseout="normalImg()">
			
            <area style="cursor: pointer;"  shape="poly" coords="164,262,184,241,205,263,184,283" 
			alt="EdificioGantes" onclick="EnConstruccionOnClick()" onmouseover="EnConstruccion()" onmouseout="normalImg()">
			
  
 
 
 <!--EnConstruccion -->
 <!--planetario -->
 
 	
		
 
			
      </map>
	 
	
   
 
 
 </div>
 
 </center>
 
	 
	 
	 
  