 <center> <h4 id="titulo">Universidad del Bío-Bío</h4></center> 
	  <div class="cell shrink">
<!--<img class="thumbnail" src="https://placehold.it/550x350">   -->
 <img class="thumbnail" id="edGantes" src="img/edificionormal.jpg">
</div>
 
 
<form method="POST" action="Edificio.php" id="EdificioGantes">
<input type="hidden" name="id_edificio" value="1" />
 



</form>	
<form method="POST" action="Edificio.php" id="Casino">
<input type="hidden" name="id_edificio" value="2" />
 
</form>	  
<script> 
 

function bigImg() {
document.getElementById("edGantes").style.display = "block";
document.getElementById('edGantes').src='img/gantes.jpg';
document.getElementById('titulo').innerHTML = "Edificio Gantes"; 
}

function normalImg() {
 document.getElementById("edGantes").style.display = "block";
 document.getElementById('edGantes').src='img/edificionormal.jpg';
 document.getElementById('titulo').innerHTML = "Universidad del Bío-Bío"; 
}

function casino() {
document.getElementById("edGantes").style.display = "block";
document.getElementById('edGantes').src='img/casino.jpg';
document.getElementById('titulo').innerHTML = "Casino"; 
}
 
function GantesOnClick() {
document.getElementById("EdificioGantes").submit();  
}
function CasinoOnClick() {
document.getElementById("Casino").submit();  
}
 










	 </script>
<?php
 
        require 'indiceUV.php';
?>		
   