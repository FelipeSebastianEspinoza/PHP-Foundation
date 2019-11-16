 
 
	<?php
//los datos fueron tomados directo desde el js ya que la pagina del gobierno presenta problemas al momento de hacer un web scrapping
// si los datos presentaran algun error se debe revisar el js y modificar los arreglos de abajo



include('simple_html_dom.php');
 
 $html = file_get_html('http://archivos.meteochile.gob.cl/portaldmc/meteochile/js/indice_radiacion.js')->plaintext;  
 
 $Ciudad = explode("});",  $html);
 
 
$nombre = explode(",", $Ciudad[17]);
$d2 = explode("fechaobs :",  $nombre[5]);
$Fecha=str_replace('"','',$d2[1]);
$d3 = explode("horaobs :",  $nombre[6]);
 
 
$d4 = explode("indiceobs :",  $nombre[7]);
 
 
 
 
$d5 = explode("indicepron :",  $nombre[10]);
 

 
$d6 = explode("recomendacion :",  $nombre[11]);
 
$d7 = explode("888",  $nombre[12]);
 

 
$d8 = explode("fechapron :",  $nombre[9]);
  $d8[1];
$Fecha2=str_replace('"','',$d8[1]);
?>
 


 
<table class="gridtable">
  <thead>
   <caption>Índice UV observado  el día  <?php echo date("d-m-Y", strtotime($Fecha)); ?> </caption>
    <tr>
      <th><center>Hora observada</center></th> 
      <th><center>Índice UV-B</center></th> 
      <th><center>Riesgo</center></th>
   </tr>
  </thead>
  <tbody>
    <tr>
      <td><center><?php echo str_replace('"','',$d3[1]); ?></center></td>
      <td><center><?php $indiceHoy = str_replace('"','',$d4[1]);  echo $indiceHoy2 = str_replace(':Muy alto','',$indiceHoy); ?></center></td>
      <td><center><?php $indiceHoy = str_replace('"','',$d4[1]); 
      $indiceHoy2 = str_replace(':','',$indiceHoy); echo $indiceHoy3 = preg_replace('/[0-9]+/', '', $indiceHoy2);	 ?></center></td>
	</tr>
  </tbody>
</table>

<table class="gridtable">
  <thead>
    <tr>
      <th><center>Índice UV pronosticado para el día  <?php echo date("d-m-Y", strtotime($Fecha2)); ?></center></th> 
    </tr>
  </thead>
  <tbody>
    <tr>
  <td><center><?php $indiceHoy = str_replace('"','',$d5[1]);  echo $indiceHoy2 = str_replace(':Muy alto','',$indiceHoy); ?></center></td>
    </tr>
  </tbody>
</table>
<table class="gridtable">
  <thead>
    <tr>
      <th><center>Recomendación </center></th> 
    </tr>
  </thead>
  <tbody>
    <tr>
  <td><center><?php echo $d6[1],$d7[0]; ?></center></td>
    </tr>
  </tbody>
</table>

<style>
 
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
   margin-top: -18px;
}
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>
 
 
 