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
			<area style="cursor: pointer;"  shape="rect" coords="291,58,332,115"
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
         <!--   <area style="cursor: pointer;"  shape="rect" coords="487,364,525,377"
			alt="EdificioGantes" onclick="N3OnClick()" onmouseover="N3()" onmouseout="normalImg()"> -->
            <area style="cursor: pointer;"  shape="rect" coords="251,53,277,152"
			alt="EdificioGantes" onclick="FacultadCienciasOnClick()" onmouseover="FacultadCiencias()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="212,97,251,149" 
			alt="EdificioGantes" onclick="VicerrectoriaOnClick()" onmouseover="Vicerrectoria()" onmouseout="normalImg()">
            <area style="cursor: pointer;"  shape="rect" coords="188,69,212,148"
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
            <area style="cursor: pointer;"  shape="rect" coords="559,386,611,412"
            alt="EdificioGantes" onclick="DepartamentoIngenieriaMecanica2OnClick()" onmouseover="DepartamentoIngenieriaMecanica2()" onmouseout="normalImg()">
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
		


		
		  
		  
		  
		  
    
			
      </map>
	 
	
 <?php  
			$conn = mysqli_connect("localhost","root","","tesis");
			$result = mysqli_query($conn, 'SELECT estado,id_edificio  				
						        FROM  edificio   ;');
	                             
	  while($row = mysqli_fetch_array($result)){ 
	  
	  if($row["id_edificio"]=='1' && $row["estado"]=="Pendiente" ){
	  ?>
      <img   class="imgB1" src="img/iconos_edificios/1.png"alt="EdificioGantes" onclick="GantesOnClick()" onmouseover="bigImg()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 164px; 
	   left:257px;
	   cursor:pointer;
	   z-index: 3; 
       width: 126px;"  >
	   <?php
	  }else if($row["id_edificio"]=='2' && $row["estado"]=="Pendiente" ){
	  ?>
      <img class="imgB1" src="img/iconos_edificios/2.png"alt="EdificioGantes" onclick="CasinoOnClick()" onmouseover="casino()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 237px; 
	   left:695px;
	   cursor:pointer;
	   z-index: 3; 
       width: 45px;"  >
	   <?php
	  }else if($row["id_edificio"]=='3' && $row["estado"]=="Pendiente" ){
	  ?>
      <img class="imgB1" src="img/iconos_edificios/3.png"alt="EdificioGantes" onclick="NicolasCerdaOnClick()" onmouseover="NicolasCerda()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 11px; 
	   left:568px;
	   cursor:pointer;
	   z-index: 3; 
       width: 42px;"  >
	   <?php
	  }else if($row["id_edificio"]=='4' && $row["estado"]=="Pendiente" ){
	  ?>
      <img class="imgB1" src="img/iconos_edificios/4.png"alt="EdificioGantes" onclick="FacultadCienciasEmpresarialesOnClick()" onmouseover="FacultadCienciasEmpresariales()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 61px; 
	   left:594px;
	   cursor:pointer;
	   z-index: 3; 
       width: 71px;"  >
	   <?php
	  }else if($row["id_edificio"]=='42' && $row["estado"]=="Pendiente" ){
	  ?>
      <img class="imgB1" src="img/iconos_edificios/42.png"alt="EdificioGantes" onclick="FacultadCienciasEmpresariales2OnClick()" onmouseover="FacultadCienciasEmpresariales2()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 61px; 
	   left:664px;
	   cursor:pointer;
	   z-index: 3; 
       width: 38px;"  >
	   <?php
	  }else if($row["id_edificio"]=='5' && $row["estado"]=="Pendiente" ){
	  ?>
      <img class="imgB1" src="img/iconos_edificios/5.png"alt="EdificioGantes" onclick="BibliotecaOnClick()" onmouseover="Biblioteca()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 61px; 
	   left:536px;
	   cursor:pointer;
	   z-index: 3; 
       width: 30px;"  >
	   <?php
	    }else if($row["id_edificio"]=='6' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/6.png"alt="EdificioGantes" onclick="CasitasOnClick()" onmouseover="Casitas()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 281px;  
	   left:522px;
	   cursor:pointer;
	   z-index: 3; 
       width: 35px;"  >
	   <?php
	  	}else if($row["id_edificio"]=='7' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/7.png"alt="EdificioGantes" onclick="DepartamentoIngenieriaMecanicaOnClick()" onmouseover="DepartamentoIngenieriaMecanica()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 60px;  
	   left:455px;
	   cursor:pointer;
	   z-index: 3; 
       width: 71px;"  >
	   <?php
	  }else if($row["id_edificio"]=='8' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/8.png"alt="EdificioGantes" onclick="EdificioMetodologicoOnClick()" onmouseover="EdificioMetodologico()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 163px;  
	   left:556px;
	   cursor:pointer;
	   z-index: 3; 
       width: 21px;"  >
	   <?php
	  }else if($row["id_edificio"]=='9' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/9.png"alt="EdificioGantes" onclick="EdificioEntradaOnClick()" onmouseover="EdificioEntrada()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 18px;  
	   left:167px;
	   cursor:pointer;
	   z-index: 3; 
       width: 22px;"  >
	   <?php
	  }else if($row["id_edificio"]=='10' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/10.png"alt="EdificioGantes" onclick="FacultadArquitecturaOnClick()" onmouseover="FacultadArquitectura()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 10px;  
	   left:322px;
	   cursor:pointer;
	   z-index: 3; 
       width: 90px;"  >
	   <?php
	  }else if($row["id_edificio"]=='11' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/11.png"alt="EdificioGantes" onclick="DepartamentoEstudiosGeneralesOnClick()" onmouseover="DepartamentoEstudiosGenerales()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 3px;  
	   left:415px;
	   cursor:pointer;
	   z-index: 3; 
       width: 48px;"  >
	   <?php
	  }else if($row["id_edificio"]=='12' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/12.png"alt="EdificioGantes" onclick="EscuelaArquitecturaOnClick()" onmouseover="EscuelaArquitectura()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 58px;  
	   left:352px;
	   cursor:pointer;
	   z-index: 3; 
       width: 41px;"  >
	   <?php
	  }else if($row["id_edificio"]=='13' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/13.png"alt="EdificioGantes" onclick="ParaninfoOnClick()" onmouseover="Paraninfo()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 88px;  
	   left:407px;
	   cursor:pointer;
	   z-index: 3; 
       width: 26px;"  >
	   <?php
	  }else if($row["id_edificio"]=='14' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/14.png"alt="EdificioGantes" onclick="EscuelaIngenieriaConstruccionOnClick()" onmouseover="EscuelaIngenieriaConstruccion()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 54px;  
	   left:393px;
	   cursor:pointer;
	   z-index: 3; 
       width: 55px;"  >
	   <?php
	  }else if($row["id_edificio"]=='15' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/15.png"alt="EdificioGantes" onclick="GimnasioOnClick()" onmouseover="Gimnasio()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 222px;  
	   left:109px;
	   cursor:pointer;
	   z-index: 3; 
       width: 73px;"  >
	   <?php
	  }else if($row["id_edificio"]=='16' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/16.png"alt="EdificioGantes" onclick="AulasACOnClick()" onmouseover="AulasAC()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 119px;  
	   left:634px;
	   cursor:pointer;
	   z-index: 3; 
       width: 37px;"  >
	   <?php
	  }else if($row["id_edificio"]=='17' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/17.png"alt="EdificioGantes" onclick="AulasABOnClick()" onmouseover="AulasAB()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 158px;  
	   left:587px;
	   cursor:pointer;
	   z-index: 3; 
       width: 31px;"  >
	    <?php
	  }else if($row["id_edificio"]=='41' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/41.png"alt="EdificioGantes" onclick="AulasADOnClick()" onmouseover="AulasAD()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 209px;  
	   left:587px;
	   cursor:pointer;
	   z-index: 3; 
       width: 31px;"  >
	   <?php
	  }else if($row["id_edificio"]=='18' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/18.png"alt="EdificioGantes" onclick="N1OnClick()" onmouseover="N1()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 259px;  
	   left:588px;
	   cursor:pointer;
	   z-index: 3; 
       width: 30px;"  >
	   <?php
	  }else if($row["id_edificio"]=='19' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/19.png"alt="EdificioGantes" onclick="SalasDeEstudioOnClick()" onmouseover="SalasDeEstudio()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 160px;  
	   left:470px;
	   cursor:pointer;
	   z-index: 3; 
       width: 30px;"  >
	   <?php
	  }else if($row["id_edificio"]=='20' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/20.png"alt="EdificioGantes" onclick="DepartamentoIngenieriaIndustrialOnClick()" onmouseover="DepartamentoIngenieriaIndustrial()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 186px;  
	   left:467px;
	   cursor:pointer;
	   z-index: 3; 
       width: 36px;"  >
	   <?php
	  }else if($row["id_edificio"]=='21' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/21.png"alt="EdificioGantes" onclick="DepartamentoIngenieriaMaderasOnClick()" onmouseover="DepartamentoIngenieriaMaderas()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 260px;  
	   left:468px;
	   cursor:pointer;
	   z-index: 3; 
       width: 38px;"  >
	   <?php
	  }else if($row["id_edificio"]=='22' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/22.png"alt="EdificioGantes" onclick="AulasAAOnClick()" onmouseover="AulasAA()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 163px;  
	   left:507px;
	   cursor:pointer;
	   z-index: 3; 
       width: 50px;"  >
	   <?php
	  }else if($row["id_edificio"]=='23' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/23.png"alt="EdificioGantes" onclick="SalaMultipleOnClick()" onmouseover="SalaMultiple()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 218px;  
	   left:556px;
	   cursor:pointer;
	   z-index: 3; 
       width: 22px;"  >
	   <?php
	  }else if($row["id_edificio"]=='24' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/24.png"alt="EdificioGantes" onclick="DepartamentoArteCulturaOnClick()" onmouseover="DepartamentoArteCultura()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 222px;  
	   left:517px;
	   cursor:pointer;
	   z-index: 3; 
       width: 43px;"  >
	   <?php
	  }else if($row["id_edificio"]=='25' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/25.png"alt="EdificioGantes" onclick="EscuelaTrabajoSocialOnClick()" onmouseover="EscuelaTrabajoSocial()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 153px;  
	   left:389px;
	   cursor:pointer;
	   z-index: 3; 
       width: 60px;"  >
	   <?php
	  }else if($row["id_edificio"]=='26' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/26.png"alt="EdificioGantes" onclick="Casino2OnClick()" onmouseover="Casino2()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 299px;  
	   left:385px;
	   cursor:pointer;
	   z-index: 3; 
       width: 39px;"  >
	   <?php
	  }else if($row["id_edificio"]=='27' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/27.png"alt="EdificioGantes" onclick="DireccionDesarrolloEstudiantilOnClick()" onmouseover="DireccionDesarrolloEstudiantil()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 365px;  
	   left:390px;
	   cursor:pointer;
	   z-index: 3; 
       width: 58px;"  >
	   <?php
	  }else if($row["id_edificio"]=='28' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/28.png"alt="EdificioGantes" onclick="FederacionEstudiantesOnClick()" onmouseover="FederacionEstudiantes()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 419px;  
	   left:410px;
	   cursor:pointer;
	   z-index: 3; 
       width: 28px;"  >
	   <?php
	  }else if($row["id_edificio"]=='29' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/29.png"alt="EdificioGantes" onclick="CentroTecnologicoOnClick()" onmouseover="CentroTecnologico()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 474px;  
	   left:403px;
	   cursor:pointer;
	   z-index: 3; 
       width: 37px;"  >
	   <?php
	  }else if($row["id_edificio"]=='30' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/30.png"alt="EdificioGantes" onclick="LaboratorioCienciasConstruccionOnClick()" onmouseover="LaboratorioCienciasConstruccion()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 429px;  
	   left:465px;
	   cursor:pointer;
	   z-index: 3; 
       width: 90px;"  >
	  <img class="imgB1" src="img/iconos_edificios/30a.png"alt="EdificioGantes" onclick="LaboratorioCienciasConstruccionOnClick()" onmouseover="LaboratorioCienciasConstruccion()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 395px;  
	   left:518px; 
	   cursor:pointer;
	   z-index: 3; 
       width: 37px;"  >
	   <?php
	  }else if($row["id_edificio"]=='31' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/31.png"alt="EdificioGantes" onclick="PabellonTecnologicoMaderaOnClick()" onmouseover="PabellonTecnologicoMadera()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 304px;  
	   left:463px;
	   cursor:pointer;
	   z-index: 3; 
       width: 60px;"  >
      <img class="imgB1" src="img/iconos_edificios/31a.png"alt="EdificioGantes" onclick="PabellonTecnologicoMaderaOnClick()" onmouseover="PabellonTecnologicoMadera()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 334px;  
	   left:519px;
	   cursor:pointer;
	   z-index: 3; 
       width: 25px;"  >
      <img class="imgB1" src="img/iconos_edificios/31b.png"alt="EdificioGantes" onclick="PabellonTecnologicoMaderaOnClick()" onmouseover="PabellonTecnologicoMadera()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 366px;  
	   left:482px;
	   cursor:pointer;
	   z-index: 3; 
       width: 34px;"  >
	   <?php
	  }else if($row["id_edificio"]=='32' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/32.png"alt="EdificioGantes" onclick="cipaOnClick()" onmouseover="cipa()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 456px;  
	   left:595px;
	   cursor:pointer;
	   z-index: 3; 
       width: 29px;"  >
	   <?php
	  }else if($row["id_edificio"]=='33' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/33.png"alt="EdificioGantes" onclick="MantencionOnClick()" onmouseover="Mantencion()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 389px;  
	   left:584px;
	   cursor:pointer;
	   z-index: 3; 
       width: 20px;"  >
	   <?php
	  }else if($row["id_edificio"]=='34' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/34.png"alt="EdificioGantes" onclick="N2OnClick()" onmouseover="N2()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 479px;  
	   left:484px;
	   cursor:pointer;
	   z-index: 3; 
       width: 27px;"  >
	   <?php
	  }else if($row["id_edificio"]=='35' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/35.png"alt="EdificioGantes" onclick="EscuelaDiseñoIndustrialOnClick()" onmouseover="EscuelaDiseñoIndustrial()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 358px;  
	   left:586px;
	   cursor:pointer;
	   z-index: 3; 
       width: 22px;"  >
	  <img class="imgB1" src="img/iconos_edificios/35a.png"alt="EdificioGantes" onclick="EscuelaDiseñoIndustrialOnClick()" onmouseover="EscuelaDiseñoIndustrial()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 302px;  
	   left:581px;
	   cursor:pointer;
	   z-index: 3; 
       width: 27px;"  >
	   <?php
	  }else if($row["id_edificio"]=='36' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/36.png"alt="EdificioGantes" onclick="CIMUBBOnClick()" onmouseover="CIMUBB()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 243px;  
	   left:561px;
	   cursor:pointer;
	   z-index: 3; 
       width: 24px;"  >
	   <?php
	  }else if($row["id_edificio"]=='37' && $row["estado"]=="54545" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/37.png"alt="EdificioGantes" onclick="N3OnClick()" onmouseover="N3()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 363px;  
	   left:547px;
	   cursor:pointer;
	   z-index: 3; 
       width: 40px;"  >
	   <?php
	  }else if($row["id_edificio"]=='38' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/38.png"alt="EdificioGantes" onclick="FacultadCienciasOnClick()" onmouseover="FacultadCiencias()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 53px;  
	   left:312px;
	   cursor:pointer;
	   z-index: 3; 
       width: 31px;"  >
	   <?php
	  }else if($row["id_edificio"]=='39' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/39.png"alt="EdificioGantes" onclick="VicerrectoriaOnClick()" onmouseover="Vicerrectoria()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 95px;  
	   left:270px;
	   cursor:pointer;
	   z-index: 3; 
       width: 48px;"  >
	   <?php
	  }else if($row["id_edificio"]=='40' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/40.png"alt="EdificioGantes" onclick="RectoriaOnClick()" onmouseover="Rectoria()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 69px;  
	   left:248px;
	   cursor:pointer;
	   z-index: 3; 
       width: 22px;"  >
	   <?php
	  }else if($row["id_edificio"]=='43' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/43.png"alt="EdificioGantes" onclick="AulaMagnaOnClick()" onmouseover="AulaMagna()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 196px;  
	   left:390px;
	   cursor:pointer;
	   z-index: 3; 
       width: 59px;"  >
	   <?php
	  }else if($row["id_edificio"]=='44' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/44.png"alt="EdificioGantes" onclick="SalaMultipropositoOnClick()" onmouseover="SalaMultiproposito()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 172px;  
	   left:389px;
	   cursor:pointer;
	   z-index: 3; 
       width: 60px;"  >
	   <?php
	  }else if($row["id_edificio"]=='45' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/45.png"alt="EdificioGantes" onclick="DepartamentoIngenieriaCivilAmbientalOnClick()" onmouseover="DepartamentoIngenieriaCivilAmbiental()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 319px;  
	   left:642px;
	   cursor:pointer;
	   z-index: 3; 
       width: 34px;"  >
	   <?php
	  }else if($row["id_edificio"]=='46' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/46.png"alt="EdificioGantes" onclick="DepartamentoIngenieriaMecanica2OnClick()" onmouseover="DepartamentoIngenieriaMecanica2()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 387px;  
	   left:619px;
	   cursor:pointer;
	   z-index: 3; 
       width: 55px;"  >
	   <?php
	  }else if($row["id_edificio"]=='47' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/47.png"alt="EdificioGantes" onclick="TecnologiaEmergenteOnClick()" onmouseover="TecnologiaEmergente()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 348px;  
	   left:652px;
	   cursor:pointer;
	   z-index: 3; 
       width: 25px;"  >
	   <?php
	  }else if($row["id_edificio"]=='48' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/48.png"alt="EdificioGantes" onclick="BiomaterialesOnClick()" onmouseover="Biomateriales()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 304px;  
	   left:523px;
	   cursor:pointer;
	   z-index: 3; 
       width: 52px;"  >
	   <?php
	  }else if($row["id_edificio"]=='49' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/49.png"alt="EdificioGantes" onclick="NuevoEdificioOnClick()" onmouseover="NuevoEdificio()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 374px;  
	   left:472px;
	   cursor:pointer;
	   z-index: 3; 
       width: 11px;"  >
	   <?php
	  }else if($row["id_edificio"]=='50' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/50.png"alt="EdificioGantes" onclick="DepartamentoMatematicasOnClick()" onmouseover="DepartamentoMatematicas()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 400px;  
	   left:472px;
	   cursor:pointer;
	   z-index: 3; 
       width: 11px;"  >
	   <?php
	  }else if($row["id_edificio"]=='51' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/51.png"alt="EdificioGantes" onclick="LaboratorioEconomiaEspacialOnClick()" onmouseover="LaboratorioEconomiaEspacial()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 411px;  
	   left:472px;
	   cursor:pointer;
	   z-index: 3; 
       width: 11px;"  >
	   <?php
	  }else if($row["id_edificio"]=='52' && $row["estado"]=="Pendiente" ){
	  ?> 
      <img class="imgB1" src="img/iconos_edificios/52.png"alt="EdificioGantes" onclick="EnConstruccionOnClick()" onmouseover="EnConstruccion()" onmouseout="normalImg()" 
      style="position:absolute; 
	   top: 243px;  
	   left:226px;
	   cursor:pointer;
	   z-index: 3; 
       width: 38px;"  >
	   <?php
	  }
	   
	      
	       
	           
	   
	     
	  
	   
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  }?> 
 
 
 </div>
 
 </center>
 
	 
	 
	 
  