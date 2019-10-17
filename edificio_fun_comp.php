<center><h4 id="titulo">Universidad del Bío-Bío</h4></center> 
 
<div class="cell shrink">
    <img class="thumbnail" id="edGantes" src="img/edificionormal.jpg">
</div>
 
 
<form method="POST" action="Edificio.php" id="EdificioGantes">
    <input type="hidden" name="id_edificio" value="1" />
</form>	
<form method="POST" action="Edificio.php" id="Casino">
    <input type="hidden" name="id_edificio" value="2" />
</form>	  
<form method="POST" action="Edificio.php" id="NicolasCerda">
    <input type="hidden" name="id_edificio" value="3" />  
</form>	  
<form method="POST" action="Edificio.php" id="FacultadCienciasEmpresariales">
    <input type="hidden" name="id_edificio" value="4" />  
</form>	 
<form method="POST" action="Edificio.php" id="Biblioteca">
    <input type="hidden" name="id_edificio" value="5" />  
</form>	
<form method="POST" action="Edificio.php" id="Casitas">
    <input type="hidden" name="id_edificio" value="6" />  
</form>	
<form method="POST" action="Edificio.php" id="DepartamentoIngenieriaMecanica">
    <input type="hidden" name="id_edificio" value="7" />   
</form>	
<form method="POST" action="Edificio.php" id="EdificioMetodologico">
    <input type="hidden" name="id_edificio" value="8" />   
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

function GantesOnClick() {
document.getElementById("EdificioGantes").submit();  
}

function CasinoOnClick() {
document.getElementById("Casino").submit();  
}
function casino() {
document.getElementById("edGantes").style.display = "block";
document.getElementById('edGantes').src='img/casino.jpg';
document.getElementById('titulo').innerHTML = "Casino UBB"; 
}

function NicolasCerdaOnClick() {
document.getElementById("NicolasCerda").submit();  
}
function NicolasCerda() {
document.getElementById("edGantes").style.display = "block";
document.getElementById('edGantes').src='img/NicolasCerda.jpg';
document.getElementById('titulo').innerHTML = "Edificio Nicolás Cerda"; 
}
function FacultadCienciasEmpresarialesOnClick() {
document.getElementById("FacultadCienciasEmpresariales").submit();  
}
function FacultadCienciasEmpresariales() {
document.getElementById("edGantes").style.display = "block";
document.getElementById('edGantes').src='img/FacultadCienciasEmpresariales.jpg';
document.getElementById('titulo').innerHTML = "Facultad de Ciencias Empresariales"; 
}
function BibliotecaOnClick() {
document.getElementById("Biblioteca").submit();  
}
function Biblioteca() {
document.getElementById("edGantes").style.display = "block";
document.getElementById('edGantes').src='img/Biblioteca.jpg';
document.getElementById('titulo').innerHTML = "Biblioteca"; 
}
function CasitasOnClick() {
document.getElementById("Casitas").submit();  
}
function Casitas() {
document.getElementById("edGantes").style.display = "block";
document.getElementById('edGantes').src='img/Casitas.jpg';
document.getElementById('titulo').innerHTML = "Casitas";  
}
function DepartamentoIngenieriaMecanicaOnClick() {
document.getElementById("DepartamentoIngenieriaMecanica").submit();  
}
function DepartamentoIngenieriaMecanica() {
document.getElementById("edGantes").style.display = "block";
document.getElementById('edGantes').src='img/DepartamentoIngenieriaMecanica.jpg';
document.getElementById('titulo').innerHTML = "Departamento de Ingeniería Mecánica";  
}
function EdificioMetodologicoOnClick() {
document.getElementById("EdificioMetodologico").submit();  
}
function EdificioMetodologico() {
document.getElementById("edGantes").style.display = "block";
document.getElementById('edGantes').src='img/EdificioMetodologico.jpg';
document.getElementById('titulo').innerHTML = "Edificio Metodológico";  
}



 



	 </script>
 