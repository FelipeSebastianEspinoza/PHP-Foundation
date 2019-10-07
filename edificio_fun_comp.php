 <h5>nombre edificio</h5>
	  <div class="cell shrink">
<!--<img class="thumbnail" src="https://placehold.it/550x350">   -->
 <img class="thumbnail" id="edGantes" src="img/edificionormal.jpg">
</div>
<p>descripcion edificio</p>
 
<form method="POST" action="Edificio.php" id="EdificioGantes">
<input type="hidden" name="id" value="1" />
</form>	
<form method="POST" action="Edificio.php" id="Casino">
<input type="hidden" name="id" value="2" />
</form>	  
<script> 
 

function bigImg() {
document.getElementById("edGantes").style.display = "block";
document.getElementById('edGantes').src='img/gantes.jpg';
}

function normalImg() {
 document.getElementById("edGantes").style.display = "block";
 document.getElementById('edGantes').src='img/edificionormal.jpg';
}

function casino() {
document.getElementById("edGantes").style.display = "block";
document.getElementById('edGantes').src='img/casino.jpg';
}
 
function GantesOnClick() {
document.getElementById("EdificioGantes").submit();  
}
function CasinoOnClick() {
document.getElementById("Casino").submit();  
}
 










	 </script>	 
  