<?php

 class GuardarProtocolo{
 
	private $id_protocolo;
	private $nombre;
	private $descripcion;
    private $id_edificio;
	
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function NuevoProtocolo($form_data){
        $fields = array_keys($form_data);
		
		$nombre = htmlentities($_POST['nombre']);
		$descripcion =htmlentities($_POST['descripcion']);

        $consulta = "INSERT INTO `protocolo` (`id_protocolo`,`nombre`,`descripcion`) VALUES 
		(NULL,'$nombre','$descripcion');";
    
		 
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('protocolos.php');					
			      </script>"; 
		}
	
	}
   
    function ModificarProtocolo($form_data){
        $fields = array_keys($form_data);
		
		$id_protocolo = $_POST['id_protocolo'];
		$nombre = htmlentities($_POST['nombre']);
		$descripcion =htmlentities($_POST['descripcion']);

        $consulta = "UPDATE `protocolo` SET `nombre`='$nombre',
		`descripcion`='$descripcion' 
		WHERE `id_protocolo`='$id_protocolo'"; 
 
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible modificar');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha modificado con éxito'); 
                    window.location.replace('protocolos.php');					
			      </script>"; 
		}
	
	}
	
	 function ModificarAsignacionProtocolo($form_data){
        $fields = array_keys($form_data);
		$id = htmlentities($_POST['id_edificio']);
		$id_protocolo = $_POST['id_protocolo'];
		$id_edificio = $_POST['id_edificio'];
		$estado = htmlentities($_POST['estado']);
 
        $consulta = "UPDATE `asigna` SET `estado`='$estado'
	                 WHERE `id_edificio`='$id_edificio' 
		             AND `id_protocolo`='$id_protocolo'"; 
 
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible modificar');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha modificado con éxito'); 
                    window.location.replace('MapaPrueba.php');					
			      </script>"; 
		}
	
	}
	
	
	
	
	 
	function AsignarProtocolo($form_data){
        $fields = array_keys($form_data);
		
		$id_edificio = htmlentities($_POST['id_edificio']);
		$id_protocolo =htmlentities($_POST['id_protocolo']);
		$estado =htmlentities($_POST['estado']);
 
   
		 echo $id_protocolo;
	 
        $consulta = "INSERT INTO `asigna` (`id_edificio`,`id_protocolo`,`estado`) VALUES 
		('$id_edificio','$id_protocolo','$estado');";
         
		 
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible asignar');
				  </script>";
		}else{
			echo "<script>
					alert('Se ha asignado con éxito'); 
                     window.location.replace('Edificio.php?');					
			      </script>"; 
		}
	
	}
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }

 
 
 class GuardarRiesgo{
 
	private $id_riesgo;
	private $nombre;
	private $descripcion;
    private $imagen;
	
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function NuevoRiesgo($form_data){
        $fields = array_keys($form_data);
		
		$nombre = htmlentities($_POST['nombre']);
		$descripcion =htmlentities($_POST['descripcion']);

        $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_archivo=($_FILES['ARCHIVO']['type']);
        $imageData = addslashes(file_get_contents($_FILES['ARCHIVO']['tmp_name']));
		
		
		
        $consulta = "INSERT INTO `riesgo` (`id_riesgo`,`nombre`,`descripcion`,`icono`)
		VALUES (NULL,'$nombre','$descripcion','$imageData');";
    
		 
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('Riesgos.php');					
			      </script>"; 
		}
	
	}
   
   
	 
	 
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 
 
 
 
 
 class GuardarEdificio{
 
	private $id_edificio;
	private $nombre;
	private $estado;
    private $n_departamentos;
    private $n_estudiantes;
    private $porcentaje_hacinamiento;
    private $area_total;	
    private $imagen;
	
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function ModificarEdificio($form_data){
        $fields = array_keys($form_data);
	    $id = htmlentities($_POST['id_edificio']);
	    $id_edificio = htmlentities($_POST['id_edificio']);
		$nombre = htmlentities($_POST['nombre']);
		$estado = htmlentities($_POST['estado']);
		$n_departamentos = htmlentities($_POST['n_departamentos']);
		$n_estudiantes = htmlentities($_POST['n_estudiantes']);		
		$porcentaje_hacinamiento = htmlentities($_POST['porcentaje_hacinamiento']);			
		$area_total = htmlentities($_POST['area_total']);	
		
		$nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_archivo=($_FILES['ARCHIVO']['type']);
        $imageData = addslashes(file_get_contents($_FILES['ARCHIVO']['tmp_name']));
		

		if($nombre_archivo==null){
        $consulta = "UPDATE `edificio` SET `nombre`='$nombre',
		`estado`='$estado',`n_departamentos`='$n_departamentos',
		`n_estudiantes`='$n_estudiantes',`porcentaje_hacinamiento`='$porcentaje_hacinamiento',
        `area_total`='$area_total'  		
		WHERE `id_edificio`='$id_edificio'"; 
		}else{
        $consulta = "UPDATE `edificio` SET `nombre`='$nombre',
		`estado`='$estado',`n_departamentos`='$n_departamentos',
		`n_estudiantes`='$n_estudiantes',`porcentaje_hacinamiento`='$porcentaje_hacinamiento',
        `area_total`='$area_total', `imagen`='$imageData' 		
		WHERE `id_edificio`='$id_edificio'"; 
		}
			 
			 
 
    
		 
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible modificar');
					 
				  </script>";
		}else{
		 
 
			echo "<script>
					alert('Se ha modificado con éxito'); 
					 
                    window.location.replace('Edificio.php');					
			      </script>"; 
		}
	 
	  
 
	}
   
     
	 
	 
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 } 
 
 
?>