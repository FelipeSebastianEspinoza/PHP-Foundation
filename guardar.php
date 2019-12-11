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
        
		if(strlen(trim($nombre))<3){
			echo "<script> 
			
					 alert('el nombre no es válido');
					 
				  </script>";	
		}else{
			
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
	}
   
    function ModificarProtocolo($form_data){
        $fields = array_keys($form_data);
        $id_protocolo = $_POST['id_protocolo'];
		$nombre = htmlentities($_POST['nombre']);
		$descripcion =htmlentities($_POST['descripcion']);
		
        if(strlen(trim($nombre))<3){
			echo "<script> 
			
					 alert('el nombre no es válido');
					 
				  </script>";
		}else{

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
	}
	
	function EliminarProtocolo($form_data){
        $fields = array_keys($form_data);
        $id_protocolo = $_POST['id_protocolo'];
 
        $consulta = "UPDATE `protocolo` SET `eliminar`='1'
		WHERE `id_protocolo`='$id_protocolo'"; 

		$consulta2 = "DELETE FROM `asigna`  
		WHERE `id_protocolo`='$id_protocolo'"; 
		$resultado_cons2 = mysqli_query($this->con,$consulta2);
		
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
			
					 alert('No es posible eliminar');
					 
				  </script>";
		}else{
			echo "<script>
			
					alert('Se ha eliminado con éxito'); 
                    window.location.replace('protocolos.php');	
					
			      </script>"; 
		}
		
	
	}
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 
  class GuardarEnfermedad{
	  
	private $id_enfermedad;
	private $nombre;
	private $descripcion;
 
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function NuevaEnfermedad($form_data){
        $fields = array_keys($form_data);
		
		$nombre = htmlentities($_POST['nombre']);
		$descripcion = htmlentities($_POST['descripcion']);
        if(strlen(trim($nombre))>1){
        $consulta = "INSERT INTO `enfermedades_profesionales` (`id_enfermedad`,`nombre`,`descripcion`) VALUES 
		(NULL,'$nombre','$descripcion');";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
			
					 alert('No es posible crear');
					 
				  </script>";
		}else{
			echo "<script>
			
					alert('Se ha creado con éxito'); 
                    window.location.replace('EnfermedadesProfesionales.php');	
					
			      </script>"; 
		}
		 }else{
			echo "<script>
			
					alert('el nombre es inválido'); 
					
			      </script>"; 
		}
	}
   
    function ModificarEnfermedad($form_data){
        $fields = array_keys($form_data);
		
		$id_enfermedad = $_POST['id_enfermedad'];
		$nombre = htmlentities($_POST['nombre']);
		$descripcion =htmlentities($_POST['descripcion']);
        if(strlen(trim($nombre))>1){
        $consulta = "UPDATE `enfermedades_profesionales` SET `nombre`='$nombre',
		`descripcion`='$descripcion' 
		WHERE `id_enfermedad`='$id_enfermedad'"; 
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
			
					 alert('No es posible modificar');
					 
				  </script>";
		}else{
			echo "<script>
			
					alert('Se ha modificado con éxito'); 
                    window.location.replace('EnfermedadesProfesionales.php');	
					
			      </script>"; 
		}
				 }else{
			echo "<script>
			
					alert('el nombre es inválido'); 	
					
			      </script>"; 
		}
	}
 
	function EliminarEnfermedad($form_data){
        $fields = array_keys($form_data); 
		
		$id_enfermedad = $_POST['id_enfermedad'];
 
        $consulta = "UPDATE `enfermedades_profesionales` SET `eliminar`='1'
		WHERE `id_enfermedad`='$id_enfermedad'"; 
 	 
	 
	    $consulta2 = "UPDATE `enfermedades_reportadas` SET `id_enfermedad`='2'
		WHERE `id_enfermedad`='$id_enfermedad'";  
        $resultado_cons2 = mysqli_query($this->con,$consulta2);
		
	    $resultado_cons = mysqli_query($this->con,$consulta);
        if($resultado_cons == false){
			echo "<script> 
			
					 alert('No es posible eliminar');
					 
				  </script>";
		}else{
			echo "<script>
			
					alert('Se ha eliminado con éxito'); 
                    window.location.replace('EnfermedadesProfesionales.php');	
					
			      </script>"; 
		}
	}
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 
 
 
  class GuardarReporteEnfermedad{
 
	private $id_enfermedad_reportada;
	private $fecha;
	private $persona;
    private $id_edificio;
    private $id_enfermedad;
    private $id_historialyarchivos;
    private $titulo;    
	private $descripcion;
 
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	 
	function NuevoReporteEnfermedad2($form_data){
        $fields = array_keys($form_data);
		
		$fecha = htmlentities($_POST['fecha']);
		$persona =htmlentities($_POST['persona']);
        $id_edificio =htmlentities($_POST['id_edificio']);
		$id_enfermedad =htmlentities($_POST['id_enfermedad']);
          
        $consulta = "INSERT INTO `enfermedades_reportadas` 
		(`id_enfermedad_reportada`,`fecha`,`persona`,`id_edificio`,`id_enfermedad`) 
		VALUES 
		(NULL,'$fecha','$persona','$id_edificio','$id_enfermedad');";
    
		 
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
			
					 alert('No es posible crear');
					 
				  </script>";
		}else{
			echo "<script>
			
					alert('Se ha creado con éxito'); 
                    window.location.replace('EnfermedadesAsignadas.php');
					
			      </script>"; 
		}
		   
	}
 
	function ModificarReporteEnfermedad2($form_data){
        $fields = array_keys($form_data);
		
		$id_enfermedad_reportada = htmlentities($_POST['id_enfermedad_reportada']);
		$fecha = htmlentities($_POST['fecha']);
		$fecha_termino = htmlentities($_POST['fecha_termino']);
		$persona =htmlentities($_POST['persona']);
        $id_edificio =htmlentities($_POST['id_edificio']);
		$id_enfermedad =htmlentities($_POST['id_enfermedad']);
  
 
		if($fecha_termino!='0000-00-00'){
		 $consulta = "UPDATE `enfermedades_reportadas` SET `fecha`='$fecha' 
		,`fecha_termino`='$fecha_termino' 
	    ,`persona`='$persona',`id_edificio`='$id_edificio'
        ,`id_enfermedad`='$id_enfermedad'     		
		WHERE `id_enfermedad_reportada`='$id_enfermedad_reportada'"; 
		}else{
			 $consulta = "UPDATE `enfermedades_reportadas` SET `fecha`='$fecha' 
	     ,`persona`='$persona',`id_edificio`='$id_edificio'
        ,`id_enfermedad`='$id_enfermedad'     		
		WHERE `id_enfermedad_reportada`='$id_enfermedad_reportada'"; 
		}
  
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
			
					 alert('No es posible modificar');
					 
				  </script>";
		}else{
			echo "<script>
			
					alert('Se ha modificado con éxito'); 
                    window.location.replace('EnfermedadesAsignadas.php');
					
			      </script>"; 
		}
	}
 
    function EliminarReporteEnfermedad($form_data){ 
        $fields = array_keys($form_data);
		
		$id_enfermedad_reportada = $_POST['id_enfermedad_reportada'];  
 
        $consulta = "UPDATE `enfermedades_reportadas` SET `eliminar`='1'
		WHERE `id_enfermedad_reportada`='$id_enfermedad_reportada'";  
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
			
					 alert('No es posible eliminar');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito');
					
                     window.location = window.location.pathname;
					 
			      </script>"; 
		}
	}
 
    function NuevoArchivoYReporte($form_data){
		
        $fields = array_keys($form_data);
        $fecha = htmlentities($_POST['fecha']);
		$titulo =htmlentities($_POST['titulo']);
        $descripcion =htmlentities($_POST['descripcion']);
		$id_enfermedad_reportada =htmlentities($_POST['id_enfermedad_reportada']);
     
        $nombre_imagen=$_FILES['ARCHIVO']['name'];
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/pdf/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
			
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
			
        }
 	    if($nombre_archivo!=null){ 
		
        $consulta = "INSERT INTO `historialyarchivos`  
		(`id_historialyarchivos`,`archivo`,`titulo`,`fecha`,`descripcion`,`id_enfermedad_reportada`) 
		VALUES  
		(NULL,'$nnombre','$titulo','$fecha','$descripcion','$id_enfermedad_reportada');";
		
		}else{
			
			$consulta = "INSERT INTO `historialyarchivos`  
		(`id_historialyarchivos`,`titulo`,`fecha`,`descripcion`,`id_enfermedad_reportada`) 
		VALUES 
		(NULL,'$titulo','$fecha','$descripcion','$id_enfermedad_reportada');";
		
		}
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
			
					 alert('No es posible crear');
					 
				  </script>";
		}else{
			echo "<script> 
			
					alert('Se ha creado con éxito'); 
                    window.location.replace('ArchivosReportesEnfermedad.php');	
					
			      </script>"; 
		}
	}
	
	
	function EliminarArchivoYReporte($form_data){ 
        $fields = array_keys($form_data);
		
		$id_historialyarchivos = $_POST['id_historialyarchivos'];  
 
        $consulta = "UPDATE `historialyarchivos` SET `eliminar`='1'
		WHERE `id_historialyarchivos`='$id_historialyarchivos'";  
 
		
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
			
					 alert('No es posible eliminar');
					 
				  </script>";
		}else{
			echo "<script>
			
					alert('Se ha eliminado con éxito'); 
                     window.location = window.location.pathname;	
					 
			      </script>"; 
		}
		
	
	}
	
	
	function ModificarArchivoYReporte($form_data){
        $fields = array_keys($form_data);
		
		$id_historialyarchivos = htmlentities($_POST['id_historialyarchivos']);
		$titulo =htmlentities($_POST['titulo']);
		$fecha = htmlentities($_POST['fecha']);
        $descripcion =htmlentities($_POST['descripcion']);
        $nombre_imagen=$_FILES['ARCHIVO']['name'];
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/pdf/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);   
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 
   if($nombre_archivo==null){ 
   
        $consulta = "UPDATE `historialyarchivos` SET `titulo`='$titulo' 
	    ,`fecha`='$fecha',`descripcion`='$descripcion' 		
		WHERE `id_historialyarchivos`='$id_historialyarchivos'"; 
		
   }else{
	          $consulta = "UPDATE `historialyarchivos` SET `archivo`='$nnombre' ,
			  `titulo`='$titulo',`fecha`='$fecha',`descripcion`='$descripcion' 		
		WHERE `id_historialyarchivos`='$id_historialyarchivos'";     
   }
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
			
					 alert('No es posible modificar'); 
					 
				  </script>";
		}else{
			echo "<script>
			
					alert('Se ha modificado con éxito'); 
					
                 window.location.replace('ArchivosReportesEnfermedad.php');	
				 
			      </script>"; 
		}
	}
	
	
	function EliminarArchivoDeReporte($form_data){
        $fields = array_keys($form_data);
        $id_historialyarchivos = $_POST['id_historialyarchivos'];
 
 
        $consulta = "UPDATE `historialyarchivos` SET `eliminar`='1'
		WHERE `id_historialyarchivos`='$id_historialyarchivos'"; 
 		 
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script>
			
					 alert('No es posible eliminar');
					 
				  </script>";
		}else{
			echo "<script>
			
					alert('Se ha eliminado con éxito'); 
                    window.location.replace('ArchivosReportesEnfermedad.php');	
					
			      </script>"; 
		}
	}
 
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 
 
 
 

 class GuardarUnidad{
 
	private $id_unidad;
	private $nombre; 
	private $fecha_act;
	private $descripcion;
	private $estado;
	private $id_protocolo;
	
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function NuevaUnidad($form_data){
        $fields = array_keys($form_data);
		
		$nombre = htmlentities($_POST['nombre']);
		$fecha_act = htmlentities($_POST['fecha_act']);
		$descripcion = htmlentities($_POST['descripcion']);
        $estado =htmlentities($_POST['estado']);          
        $estado =trim($estado);
        $estado =ucfirst($estado);	
		$id_protocolo = htmlentities($_POST['id_protocolo']);
		 
 
        $consulta = "INSERT INTO `unidad` 
		(`id_unidad`,`nombre`,`fecha_act`,`descripcion`,`estado`,`id_protocolo`) 
		VALUES 
		(NULL,'$nombre','$fecha_act','$descripcion','$estado','$id_protocolo');";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
			
					 alert('No es posible crear');
					 
				  </script>";
		}else{
			echo "<script>
			
					alert('Se ha creado con éxito'); 
                    window.location.replace('UnidadDeAnalisis.php');
					
			      </script>"; 
		}
	}
   
    function ModificarUnidad($form_data){
        $fields = array_keys($form_data);
		
		$id_unidad = htmlentities($_POST['id_unidad']);
		$nombre = htmlentities($_POST['nombre']);
		$fecha_act =htmlentities($_POST['fecha_act']);
		$descripcion =htmlentities($_POST['descripcion']);
        $estado =htmlentities($_POST['estado']);          
        $estado =trim($estado);
        $estado =ucfirst($estado);	
		$id_protocolo =htmlentities($_POST['id_protocolo']);

        $consulta = "UPDATE `unidad` SET `nombre`='$nombre', 
	    `fecha_act`='$fecha_act',
		`descripcion`='$descripcion',
		`estado`='$estado',`id_protocolo`='$id_protocolo'     		
		WHERE `id_unidad`='$id_unidad'"; 
 
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
			
					 alert('No es posible modificar');
					 
				  </script>";
		}else{
			echo "<script>
			
					alert('Se ha modificado con éxito'); 
                    window.location.replace('UnidadDeAnalisis.php');
					
			      </script>"; 
		}
	
	}

	function EliminarUnidad($form_data){ 
        $fields = array_keys($form_data);
		
		$id_unidad = $_POST['id_unidad'];  
 
        $consulta = "UPDATE `unidad` SET `eliminar`='1'
		WHERE `id_unidad`='$id_unidad'";  
 
		
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
			
					 alert('No es posible eliminar');
					 
				  </script>";
		}else{
			echo "<script>
			
					alert('Se ha eliminado con éxito'); 
                     window.location = window.location.pathname;
					 
			      </script>"; 
		}

	}
	
	function Archivo1($form_data){
        $fields = array_keys($form_data);
        $id_unidad = $_POST['id_unidad'];
		$nombre = htmlentities($_POST['nombre']);
		$nombre_imagen=$_FILES['ARCHIVO']['name'];
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/pdf/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 
          $consulta = "INSERT INTO `unidad_anexos` 
		(`id_unidad_anexos`,`nombre`,`archivo`,`id_unidad`) 
		VALUES (NULL,'$nombre','$nnombre','$id_unidad');";
 
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('UnidadDeAnalisis.php');					
			      </script>"; 
		}
  
	}
    
	function Archivo2($form_data){

        $fields = array_keys($form_data);
        $id_unidad = $_POST['id_unidad'];
        $id_unidad_anexos = $_POST['id_unidad_anexos'];
		$nombre = htmlentities($_POST['nombre']);
		$nombre_imagen=$_FILES['ARCHIVO']['name'];
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/pdf/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);   
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 	    if($nombre_archivo==null){ 
			  $consulta = "UPDATE `unidad_anexos` SET `nombre` = '$nombre' 
	                 	WHERE `id_unidad_anexos`='$id_unidad_anexos'"; 
        }else{
 
         $consulta = "UPDATE `unidad_anexos` SET `nombre` = '$nombre', 
		                      `archivo`='$nnombre'
	                 	WHERE `id_unidad_anexos`='$id_unidad_anexos'"; 

							
		}  
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible actualizar');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('UnidadDeAnalisis.php');					
			      </script>"; 
		}
  
	}
	
	function EliminarArchivo1($form_data){
        $fields = array_keys($form_data);
        $id_unidad = $_POST['id_unidad'];
		$id_unidad_anexos = $_POST['id_unidad_anexos'];
 
        $consulta = "UPDATE `unidad_anexos` SET `eliminar`='1'
		WHERE `id_unidad_anexos`='$id_unidad_anexos'"; 
 		 
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar');
				  </script>";
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                    window.location.replace('UnidadDeAnalisis.php');					
			      </script>"; 
		}
	}
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }

 
 class GuardarProcedimiento{
 
	private $id_procedimiento;
	private $reglamento_interno;
	private $elementos_de_proteccion_personal;
    private $vestimenta;
    private $herramientas;
    private $id_edificio;
	
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function NuevoProcedimiento($form_data){
        $fields = array_keys($form_data);
		
        $nombre_de_archivo = htmlentities($_POST['nombre_de_archivo']);
        $titulo = htmlentities($_POST['titulo']);
        $descripcion = htmlentities($_POST['descripcion']);
        $id_edificio = htmlentities($_POST['id_edificio']);
 
 
        $nombre_imagen=$_FILES['ARCHIVO']['name'];
		$nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/pdf/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 
         if($nombre_archivo==null){ 
        $consulta = "INSERT INTO `procedimiento` 
		(`id_procedimiento`, 
		`titulo`,`descripcion`,`id_edificio`) 
		VALUES 
		(NULL,'$titulo','$descripcion','$id_edificio');";
		 }else{
        $consulta = "INSERT INTO `procedimiento` 
		(`id_procedimiento`,`archivo`,`nombre_de_archivo`,
		`titulo`,`descripcion`,`id_edificio`) 
		VALUES 
		(NULL,'$nnombre','$nombre_de_archivo','$titulo','$descripcion','$id_edificio');";	 
		 }
 
 
 
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear');
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('Edificio.php');					
			      </script>"; 
		}
	}
   
    function ModificarProcedimiento($form_data){
        $fields = array_keys($form_data);
		
		$id_procedimiento = htmlentities($_POST['id_procedimiento']);
        $nombre_de_archivo = htmlentities($_POST['nombre_de_archivo']);
        $titulo = htmlentities($_POST['titulo']);
        $descripcion = htmlentities($_POST['descripcion']);
        $id_edificio = htmlentities($_POST['id_edificio']);

	    $nombre_imagen=$_FILES['ARCHIVO']['name'];
		$nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/pdf/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 
	    if($nombre_archivo==null){ 
		
        $consulta = "UPDATE `procedimiento` 
		SET `nombre_de_archivo`='$nombre_de_archivo',
        `titulo`='$titulo',`descripcion`='$descripcion' 
		WHERE `id_procedimiento`='$id_procedimiento'"; 
	    }else{
		$consulta = "UPDATE `procedimiento` 
		SET `nombre_de_archivo`='$nombre_de_archivo',
		`archivo`='$nnombre',
        `titulo`='$titulo',`descripcion`='$descripcion' 
		WHERE `id_procedimiento`='$id_procedimiento'"; 	
			
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
 
    	function EliminarProcedimiento($form_data){ 
        $fields = array_keys($form_data);
		
		$id_procedimiento = $_POST['id_procedimiento'];  
 
        $consulta = "UPDATE `procedimiento` SET `eliminar`='1'
		WHERE `id_procedimiento`='$id_procedimiento '";  
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                     window.location = window.location.pathname;					
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
		$nombre_imagen=$_FILES['ARCHIVO']['name'];
		 $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/imagenes/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
		
		if(strlen(trim($nombre))<3){
			echo "<script> 
					 alert('el nombre no es válido');
				  </script>";
			
		}else{
 
 
 
        $consulta = "INSERT INTO `riesgo` (`id_riesgo`,`nombre`,`descripcion`,`icono`)
                 	VALUES (NULL,'$nombre','$descripcion','$nnombre');";
		 
		 
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
	
	}
	
 
    function ModificarRiesgo($form_data){
        $fields = array_keys($form_data);
		
		$id_riesgo = $_POST['id_riesgo'];
		$nombre = htmlentities($_POST['nombre']);
		$descripcion =htmlentities($_POST['descripcion']);

		if($nombre_imagen==null){
		
		$nombre_imagen=$_FILES['ARCHIVO']['name'];
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/imagenes/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
	 
		}
	 
        if(strlen(trim($nombre))>3){
			 
		 
           if($nombre_imagen==null){
               $consulta = "UPDATE `riesgo` SET `nombre`='$nombre',
		     `descripcion`='$descripcion' 
		      WHERE `id_riesgo`='$id_riesgo'"; 
 
			}else{
 
			 $consulta = "UPDATE `riesgo` SET `nombre`='$nombre',
		     `descripcion`='$descripcion',`icono`='$nnombre'  
		      WHERE `id_riesgo`='$id_riesgo'"; 	
	 
			}
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible modificar');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha modificado con éxito'); 
                    window.location.replace('riesgos.php');					
			      </script>"; 
		}
	}
	echo "<script> 
          alert('El nombre no es válido'); 
		  </script>";
	}
 
	function AsignarRiesgo($form_data){
        $fields = array_keys($form_data);
		
		$id_edificio = htmlentities($_POST['id_edificio']);
		$id_riesgo =htmlentities($_POST['id_riesgo']);
 
	 
        $consulta = "INSERT INTO `edificio_riesgo` (`id_edificio`,`id_riesgo`) VALUES 
		('$id_edificio','$id_riesgo');";
         
		 
		 
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

	function QuitarRiesgo($form_data){
        $fields = array_keys($form_data);
		
		$id_edificio = htmlentities($_POST['id_edificio']);
		$id_riesgo =htmlentities($_POST['id_riesgo']);
 
	 
        $consulta = "DELETE FROM `edificio_riesgo` 
		             WHERE id_edificio ='$id_edificio' AND id_riesgo='$id_riesgo'";
 
         
		 
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible quitar');
				  </script>";
		}else{
			echo "<script>
					alert('Se ha quitado con éxito'); 
                     window.location.replace('Edificio.php?');					
			      </script>"; 
		}
	
	} 	
	
	function EliminarRiesgo($form_data){
        $fields = array_keys($form_data);
		
		$id_riesgo = $_POST['id_riesgo'];
 
        $consulta = "UPDATE `riesgo` SET `eliminar`='1'
		WHERE `id_riesgo`='$id_riesgo'"; 

		$consulta2 = "DELETE FROM `edificio_riesgo`  
		WHERE `id_riesgo`='$id_riesgo'"; 
		$resultado_cons2 = mysqli_query($this->con,$consulta2);
		
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                    window.location.replace('Riesgos.php');					
			      </script>"; 
		}
		
	
	}
	
	
	
	
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 
 
 
 
 class GuardarAccidente{
 
	private $id_accidente;
	private $fecha;
	private $tipo;
    private $numero;
    private $persona;
    private $descripcion;
    private $id_edificio;
	
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function NuevoAccidente($form_data){
        $fields = array_keys($form_data);
		
		$fecha = htmlentities($_POST['fecha']);
		$tipo = htmlentities($_POST['tipo']);
		$numero = htmlentities($_POST['numero']);
		$persona = htmlentities($_POST['persona']);
		$descripcion =htmlentities($_POST['descripcion']);
		$id_edificio =htmlentities($_POST['id_edificio']);		
 
        $consulta = "INSERT INTO `accidente` (`id_accidente`,`fecha`,`tipo`,`numero`
		                                      ,`persona`,`descripcion`,`id_edificio`)
		VALUES (NULL,'$fecha','$tipo','$numero','$persona','$descripcion','$id_edificio');";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('Error al añadir');
				  </script>";
		}else{
			echo "<script>
					alert('Se ha añadido con éxito'); 
                    window.location.replace('Accidentes.php');					
			      </script>"; 
		}
	
	}
       function ModificarAccidente($form_data){
        $fields = array_keys($form_data);
		
		$id_accidente = $_POST['id_accidente'];
		$fecha = htmlentities($_POST['fecha']);
		$tipo = htmlentities($_POST['tipo']);
        $numero = htmlentities($_POST['numero']);
        $persona = htmlentities($_POST['persona']);
        $descripcion = htmlentities($_POST['descripcion']);
        $id_edificio = htmlentities($_POST['id_edificio']);

        $consulta = "UPDATE `accidente` SET `fecha`='$fecha',
		`tipo`='$tipo',`numero`='$numero',
		`persona`='$persona',`descripcion`='$descripcion',
	    `id_edificio`='$id_edificio'
		WHERE `id_accidente`='$id_accidente'";  
  
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible modificar');	 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha modificado con éxito'); 
                    window.location.replace('Accidentes.php');					
			      </script>"; 
		}
	}
	
       function EliminarAccidente($form_data){
        $fields = array_keys($form_data);
		
		$id_accidente = $_POST['id_accidente'];
 
        $consulta = "UPDATE `accidente` SET `eliminar`='1'
		WHERE `id_accidente`='$id_accidente'";  
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar'); 
				  </script>"; 
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                     window.location = window.location.pathname;
 
                    //location.reload(); 					
			      </script>"; 
		}
		
	
	}




	
	 function Archivo1($form_data){
        $fields = array_keys($form_data);
        $id_accidente = $_POST['id_accidente'];
		$id_edificio = $_POST['id_edificio'];
		$nombre_imagen=$_FILES['ARCHIVO']['name'];
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/pdf/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 
         $consulta = "UPDATE `accidente` 
		             SET `archivo1`='$nnombre' 
		             WHERE `id_accidente`='$id_accidente'";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('Accidentes.php');					
			      </script>"; 
		}
  
	}

	 function Archivo2($form_data){
        $fields = array_keys($form_data);
        $id_accidente = $_POST['id_accidente'];
		$id_edificio = $_POST['id_edificio'];
		$nombre_imagen=$_FILES['ARCHIVO']['name'];
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/pdf/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 
         $consulta = "UPDATE `accidente` 
		             SET `archivo2`='$nnombre' 
		             WHERE `id_accidente`='$id_accidente'";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('Accidentes.php');					
			      </script>"; 
		}
  
	}

	 function Archivo3($form_data){
        $fields = array_keys($form_data);
        $id_accidente = $_POST['id_accidente'];
		$id_edificio = $_POST['id_edificio'];
		$nombre_imagen=$_FILES['ARCHIVO']['name'];
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/pdf/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 
         $consulta = "UPDATE `accidente` 
		             SET `archivo3`='$nnombre' 
		             WHERE `id_accidente`='$id_accidente'";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('Accidentes.php');					
			      </script>"; 
		}
  
	}

	 function Archivo4($form_data){
        $fields = array_keys($form_data);
        $id_accidente = $_POST['id_accidente'];
		$id_edificio = $_POST['id_edificio'];
		$nombre_imagen=$_FILES['ARCHIVO']['name'];
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/pdf/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 
         $consulta = "UPDATE `accidente` 
		             SET `archivo4`='$nnombre' 
		             WHERE `id_accidente`='$id_accidente'";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('Accidentes.php');					
			      </script>"; 
		}
  
	}
	
	 function EliminarArchivo1($form_data){
        $fields = array_keys($form_data);
        $id_accidente = $_POST['id_accidente'];
		$id_edificio = $_POST['id_edificio'];
		 
 
         $consulta = "UPDATE `accidente` 
		             SET `archivo1`= NULL 
		             WHERE `id_accidente`='$id_accidente'";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar');
				  </script>";
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                    window.location.replace('Accidentes.php');					
			      </script>"; 
		}
  
	}
 function EliminarArchivo2($form_data){
        $fields = array_keys($form_data);
        $id_accidente = $_POST['id_accidente'];
		$id_edificio = $_POST['id_edificio'];
		 
 
         $consulta = "UPDATE `accidente` 
		             SET `archivo2`= NULL 
		             WHERE `id_accidente`='$id_accidente'";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar');
				  </script>";
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                    window.location.replace('Accidentes.php');					
			      </script>"; 
		}
  
	}
 function EliminarArchivo3($form_data){
        $fields = array_keys($form_data);
        $id_accidente = $_POST['id_accidente'];
		$id_edificio = $_POST['id_edificio'];
		 
 
         $consulta = "UPDATE `accidente` 
		             SET `archivo3`= NULL 
		             WHERE `id_accidente`='$id_accidente'";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar');
				  </script>";
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                    window.location.replace('Accidentes.php');					
			      </script>"; 
		}
  
	} 
 function EliminarArchivo4($form_data){
        $fields = array_keys($form_data);
        $id_accidente = $_POST['id_accidente'];
		$id_edificio = $_POST['id_edificio'];
		 
 
         $consulta = "UPDATE `accidente`  
		             SET `archivo4`= NULL 
		             WHERE `id_accidente`='$id_accidente'";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar');
				  </script>";
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                    window.location.replace('Accidentes.php');					
			      </script>"; 
		}
  
	}
 
 
 
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }

  
 
 class GuardarExtintor{
 
	private $id_extintor;
	private $nombre;
	private $fecha_carga;
    private $fecha_venc;
    private $ubicacion;
    private $estado;
    private $id_piso;
	
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function NuevoExtintor($form_data){
        $fields = array_keys($form_data);
		$nombre = htmlentities($_POST['nombre']);
		$fecha_carga =htmlentities($_POST['fecha_carga']);
		$fecha_venc =htmlentities($_POST['fecha_venc']);
        $ubicacion =htmlentities($_POST['ubicacion']);
	      
        $estado =htmlentities($_POST['estado']);          
        $estado =trim($estado);
        $estado =ucfirst($estado);		
        $id_piso =htmlentities($_POST['id_piso']);
        $fechacarga = strtotime(date($fecha_carga));
        $fechavenc = strtotime(date($fecha_venc));
		$nombre_imagen=$_FILES['ARCHIVO']['name'];
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/imagenes/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 
	
        if($fechacarga > $fechavenc){ 
	        echo "<script>
					alert('Error: fecha de vencimiento anterior a fecha de carga'); 			 	
			      </script>"; 
	    }else 
        if(strlen(trim($nombre))>1){

	
	   
	    if($nombre_archivo==null){ 
              $consulta = "INSERT INTO `extintor` (`id_extintor`,`nombre`,`fecha_carga`,
		`fecha_venc`,`ubicacion`,`estado`,`id_piso`)
		VALUES (NULL,'$nombre','$fecha_carga','$fecha_venc',
		'$ubicacion','$estado','$id_piso');";
 
		}else{
		    $consulta = "INSERT INTO `extintor` (`id_extintor`,`nombre`,`fecha_carga`,
		`fecha_venc`,`ubicacion`,`estado`,`imagen`,`id_piso`)
		VALUES (NULL,'$nombre','$fecha_carga','$fecha_venc',
		'$ubicacion','$estado','$nnombre','$id_piso');";
		}
 
 
 
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                     window.location = window.location.pathname;					
			      </script>"; 
		}
    }else{
		echo "<script>
					alert('el nombre es inválido'); 				
			      </script>"; 
	}
	}
	
	
	function ModificarExtintor($form_data){
        $fields = array_keys($form_data);
		
		$id_extintor = $_POST['id_extintor'];
		$nombre = htmlentities($_POST['nombre']);
		$fecha_carga = htmlentities($_POST['fecha_carga']);
        $fecha_venc = htmlentities($_POST['fecha_venc']);
        $ubicacion = htmlentities($_POST['ubicacion']);
        $estado =htmlentities($_POST['estado']);          
        $estado =trim($estado);
        $estado =ucfirst($estado);	
        $id_piso = htmlentities($_POST['id_piso']);
        $fechacarga = strtotime(date($fecha_carga));
        $fechavenc = strtotime(date($fecha_venc));
		$nombre_imagen=$_FILES['ARCHIVO']['name'];
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/imagenes/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
		
		
		
		
		
		if($fechacarga > $fechavenc){ 
	        echo "<script>
					alert('Error: fecha de vencimiento anterior a fecha de carga'); 			 	
			      </script>"; 
	    }else 
        if(strlen(trim($nombre))>1){
			
			
		if($nombre_archivo==null){ 	
                $consulta = "UPDATE `extintor` SET `nombre`='$nombre',
		`fecha_carga`='$fecha_carga',`fecha_venc`='$fecha_venc',
		`ubicacion`='$ubicacion',`estado`='$estado',
	    `id_piso`='$id_piso'
		WHERE `id_extintor`='$id_extintor'"; 
		}else{
		        $consulta = "UPDATE `extintor` SET `nombre`='$nombre',
		`fecha_carga`='$fecha_carga',`fecha_venc`='$fecha_venc',
		`ubicacion`='$ubicacion',`estado`='$estado',`imagen`='$nnombre',
	    `id_piso`='$id_piso'
		WHERE `id_extintor`='$id_extintor'"; 	
			
			
		}
  
  
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible modificar');	 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha modificado con éxito'); 
                    window.location.replace('Extintores.php');					
			      </script>"; 
		}
		}else{
		echo "<script>
					alert('el nombre es inválido'); 				
			      </script>"; 
	}
	}
	
	
	function EliminarExtintor($form_data){
        $fields = array_keys($form_data);
		
		$id_extintor = $_POST['id_extintor'];
 
        $consulta = "UPDATE `extintor` SET `eliminar`='1'
		WHERE `id_extintor`='$id_extintor'";  
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar'); 
				  </script>"; 
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                     window.location = window.location.pathname;			
			      </script>"; 
		}
		
	
	}
	
	
	
	

    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 

 
 class GuardarRedHumeda{
 
	private $id_redhumeda;
	private $nombre;
    private $ubicacion;
    private $estado;
    private $id_piso;
    private $posx;
    private $posy;
    private $resolucion;
	
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function NuevaRedHumeda($form_data){
        $fields = array_keys($form_data);
		
		$nombre = htmlentities($_POST['nombre']);
        $ubicacion =htmlentities($_POST['ubicacion']);
        $estado =htmlentities($_POST['estado']);          
        $estado =trim($estado);
        $estado =ucfirst($estado);		
        $id_piso =htmlentities($_POST['id_piso']);
		$nombre_imagen=$_FILES['ARCHIVO']['name'];
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/imagenes/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
  
         if(strlen(trim($nombre))>1){
			 
			 
		if($nombre_archivo==null){ 
			 
        $consulta = "INSERT INTO `red_humeda` (`id_redhumeda`,`nombre`, 
	    `ubicacion`,`estado`,`id_piso`)
		VALUES (NULL,'$nombre','$ubicacion','$estado','$id_piso');";
 
		}else{
			
        $consulta = "INSERT INTO `red_humeda` (`id_redhumeda`,`nombre`, 
	    `ubicacion`,`estado`,`imagen`,`id_piso`)
		VALUES (NULL,'$nombre','$ubicacion','$estado','$nnombre','$id_piso');";
 	
			
		}
 
 
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear');
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('RedHumeda.php');					
			      </script>"; 
		}
		 }else{
		echo "<script>
					alert('el nombre es inválido'); 				
			      </script>"; 
	}
	}
 
	 
	function ModificarRedHumeda($form_data){
        $fields = array_keys($form_data);
		
		$id_redhumeda = $_POST['id_redhumeda'];
		$nombre = htmlentities($_POST['nombre']);
        $ubicacion = htmlentities($_POST['ubicacion']);
        $estado =htmlentities($_POST['estado']);          
        $estado =trim($estado);
        $estado =ucfirst($estado);	
        $id_piso = htmlentities($_POST['id_piso']);
		$nombre_imagen=$_FILES['ARCHIVO']['name'];
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/imagenes/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
		
		
		
         if(strlen(trim($nombre))>1){
		


		if($nombre_archivo==null){
        $consulta = "UPDATE `red_humeda` SET `nombre`='$nombre', 
		`ubicacion`='$ubicacion',`estado`='$estado',
	    `id_piso`='$id_piso'
		WHERE `id_redhumeda`='$id_redhumeda'"; 
		}else{
	     $consulta = "UPDATE `red_humeda` SET `nombre`='$nombre', 
		`ubicacion`='$ubicacion',`estado`='$estado',`imagen`='$nnombre',
	    `id_piso`='$id_piso'
		WHERE `id_redhumeda`='$id_redhumeda'"; 
			
		}
  
  
  
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible modificar');	 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha modificado con éxito'); 
                    window.location.replace('RedHumeda.php');					
			      </script>"; 
		}
	}else{
		echo "<script>
					alert('el nombre es inválido'); 				
			      </script>"; 
	}	
	}
	
		function EliminarRedHumeda($form_data){
        $fields = array_keys($form_data);
		
		$id_redhumeda = $_POST['id_redhumeda'];
   
        $consulta = "UPDATE `red_humeda` SET `eliminar`='1'
		WHERE `id_redhumeda`='$id_redhumeda'";  
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar'); 
				  </script>"; 
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                     window.location = window.location.pathname;			
			      </script>"; 
		}
		
	
	}
	
	
	
	 function EliminarArchivo1($form_data){
        $fields = array_keys($form_data);
        $id_redhumeda = $_POST['id_redhumeda'];
 
         $consulta = "UPDATE `red_humeda` 
		             SET `imagen`= NULL 
		             WHERE `id_redhumeda`='$id_redhumeda'";
  
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar');
				  </script>";
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                    window.location.replace('RedHumeda.php'); 					
			      </script>"; 
		}
  
	}
	
	    function ModificarPosicionRedHumeda($form_data){
        $fields = array_keys($form_data);
		
		$id_redhumeda = $_POST['id_redhumeda'];
		$posx = htmlentities($_POST['posx']);
		$posy = htmlentities($_POST['posy']);
		$resolucion = htmlentities($_POST['resolucion']);
		$resolucion = $_POST['resolucion'];
		
        $conn = mysqli_connect("localhost","root","","tesis");
		$result = mysqli_query($conn, 'SELECT *
									  	   FROM red_humeda
										   WHERE id_redhumeda='.$id_redhumeda.'
										   AND posx='.$posx.'
										   AND posy='.$posy.'
										   ;'); 
	    while($row = mysqli_fetch_array($result)){
        $resolucion = "0";
        }
		
		
		
		
		
 
	    if($resolucion =="R0"){
	    $posx=$posx-63;
	    $posy = $posy-230;
		}else if($resolucion =="R1"){
	    $posx=$posx-35;
	    $posy = $posy-225;
		}else if($resolucion =="R2"){
	    $posx=$posx-30;
	    $posy = $posy-230;
		} 
		
		
		
		
        $consulta = "UPDATE `red_humeda` SET `posx` ='$posx', `posy` ='$posy'
		WHERE `id_redhumeda`='$id_redhumeda'"; 
 
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible modificar');	 					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha modificado con éxito'); 
                    window.location.replace('RedHumeda.php');					
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
	private $n_docentes;
    private $n_funcionarios;
    private $porcentaje_hacinamiento;
    private $area_total;
	private $elementos_entregados;	
    private $imagen;
	
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function ModificarEdificio($form_data){
        $fields = array_keys($form_data);
	    $id = htmlentities($_POST['id_edificio']);
	    $id_edificio = htmlentities($_POST['id_edificio']);
		$nombre = htmlentities($_POST['nombre']);
        $estado =htmlentities($_POST['estado']);          
        $estado =trim($estado);
        $estado =ucfirst($estado);
		$n_departamentos = htmlentities($_POST['n_departamentos']);
		$n_estudiantes = htmlentities($_POST['n_estudiantes']);	
		$n_docentes = htmlentities($_POST['n_docentes']);		
		$n_funcionarios = htmlentities($_POST['n_funcionarios']);
        $elementos_entregados = htmlentities($_POST['elementos_entregados']);		
		$porcentaje_hacinamiento = htmlentities($_POST['porcentaje_hacinamiento']);			
		$area_total = htmlentities($_POST['area_total']);	
		
		$nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_archivo=($_FILES['ARCHIVO']['type']);
        $imageData = addslashes(file_get_contents($_FILES['ARCHIVO']['tmp_name']));
		

		if($nombre_archivo==null){
        $consulta = "UPDATE `edificio` SET `nombre`='$nombre',
		`estado`='$estado',`n_departamentos`='$n_departamentos',
		`n_estudiantes`='$n_estudiantes',`n_docentes`='$n_docentes',`n_funcionarios`='$n_funcionarios',`porcentaje_hacinamiento`='$porcentaje_hacinamiento',
        `area_total`='$area_total', `elementos_entregados`='$elementos_entregados' 		
		WHERE `id_edificio`='$id_edificio'"; 
		}else{
        $consulta = "UPDATE `edificio` SET `nombre`='$nombre',
		`estado`='$estado',`n_departamentos`='$n_departamentos',
		`n_estudiantes`='$n_estudiantes',`n_docentes`='$n_docentes',`n_funcionarios`='$n_funcionarios',`porcentaje_hacinamiento`='$porcentaje_hacinamiento',
        `area_total`='$area_total', `elementos_entregados`='$elementos_entregados',
		`imagen`='$imageData' 		
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
 
 
 class GuardarPiso{
 
	private $id_piso;
	private $nombre;
    private $id_edificio;
	
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function NuevoPiso($form_data){
        $fields = array_keys($form_data);
		
		$nombre = htmlentities($_POST['nombre']);
		$id_edificio =htmlentities($_POST['id_edificio']);

        $consulta = "INSERT INTO `piso` (`id_piso`,`nombre`,`id_edificio`) VALUES 
		(NULL,'$nombre','$id_edificio');";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear'); 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('Edificio.php');					
			      </script>"; 
		}
	}
   
    function ModificarPiso($form_data){
        $fields = array_keys($form_data);
		
		$id_piso = $_POST['id_piso'];
		$nombre = htmlentities($_POST['nombre']);
 
        $consulta = "UPDATE `piso` SET `nombre` ='$nombre' 
		WHERE `id_piso`='$id_piso'"; 
 
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible modificar');	 
					 alert('$id_piso');
					 alert('$nombre');						 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha modificado con éxito'); 
                    window.location.replace('Edificio.php');					
			      </script>"; 
		}
	
	}
		function EliminarPiso($form_data){ 
        $fields = array_keys($form_data);
		
		$id_piso = $_POST['id_piso'];  
 
        $consulta = "UPDATE `piso` SET `eliminar`='1'
		WHERE `id_piso`='$id_piso'";  
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar'); 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                    window.location.replace('Principal.php');				
			      </script>";  
		}
 
	}
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }

 
 class GuardarArea{
 
	private $id_area;
	private $nombre;
    private $estado;
    private $n_extintores;
    private $descripcion;
    private $area_real;
    private $confort;
    private $departamento;
    private $porcentaje_hacinamiento;
    private $imageData;



	
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function NuevaArea($form_data){
        $fields = array_keys($form_data);
 
		$nombre = htmlentities($_POST['nombre']);
        $estado = htmlentities($_POST['estado']);
		$n_extintores = htmlentities($_POST['n_extintores']);
		$descripcion = htmlentities($_POST['descripcion']);
		$area_real = htmlentities($_POST['area_real']);
		$confort = htmlentities($_POST['confort']);
		$departamento = htmlentities($_POST['departamento']);
		$porcentaje_hacinamiento = htmlentities($_POST['porcentaje_hacinamiento']);
		$id_piso =htmlentities($_POST['id_piso']);
		
		
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_archivo=($_FILES['ARCHIVO']['type']);
        $imageData = addslashes(file_get_contents($_FILES['ARCHIVO']['tmp_name']));
		
		 

        $consulta = "INSERT INTO `area_del_edificio` 
		(`id_area`,`nombre`,`estado`,`n_extintores`,`descripcion`,`area_real`,`confort`
		,`departamento`,`porcentaje_hacinamiento`,`imagen`,`id_piso`) VALUES 
		(NULL,'$nombre','$estado','$n_extintores','$descripcion','$area_real','$confort'
		,'$departamento','$porcentaje_hacinamiento','$imageData','$id_piso');";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear'); 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('Piso.php');					
			      </script>"; 
		}
	}
   
    function ModificarPiso($form_data){
        $fields = array_keys($form_data);
		
		$id_area =htmlentities($_POST['id_area']);
		$nombre = htmlentities($_POST['nombre']);
        $estado = htmlentities($_POST['estado']);
		$n_extintores = htmlentities($_POST['n_extintores']);
		$descripcion = htmlentities($_POST['descripcion']);
		$area_real = htmlentities($_POST['area_real']);
		$confort = htmlentities($_POST['confort']);
		$departamento = htmlentities($_POST['departamento']);
		$porcentaje_hacinamiento = htmlentities($_POST['porcentaje_hacinamiento']);
		$id_piso =htmlentities($_POST['id_piso']);
		
		
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_archivo=($_FILES['ARCHIVO']['type']);
        $imageData = addslashes(file_get_contents($_FILES['ARCHIVO']['tmp_name']));
 
 
 
     if($nombre_archivo==null){
        $consulta = "UPDATE `area_del_edificio` SET `nombre` ='$nombre',`estado` ='$estado',
		`n_extintores` ='$n_extintores',`descripcion` ='$descripcion',`area_real` ='$area_real' 
        ,`confort` ='$confort' 	,`departamento` ='$departamento' ,`porcentaje_hacinamiento` ='$porcentaje_hacinamiento'		
		WHERE `id_area`='$id_area'"; 
	 }else{
		$consulta = "UPDATE `area_del_edificio` SET `nombre` ='$nombre',`estado` ='$estado',
		`n_extintores` ='$n_extintores',`descripcion` ='$descripcion',`area_real` ='$area_real' 
        ,`confort` ='$confort' 	,`departamento` ='$departamento' ,`porcentaje_hacinamiento` ='$porcentaje_hacinamiento'
,  `imagen` ='$imageData' 			
		WHERE `id_area`='$id_area'";  
	 }
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible modificar');	 					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha modificado con éxito'); 
                    window.location.replace('PisoArea.php');					
			      </script>"; 
		}
	
	}
	 function EliminarArea($form_data){
        $fields = array_keys($form_data);
		
		$id_area = $_POST['id_area'];
 
        $consulta = "UPDATE `area_del_edificio` SET `eliminar`='1'
		WHERE `id_area`='$id_area'";  
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar'); 
				  </script>"; 
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                   //  window.location = window.location.pathname;
                     window.location.replace('Edificio.php');
                    //location.reload(); 					
			      </script>"; 
		}
		
	
	} 
    
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }


 
 class GuardarSalida{
 
	private $id_salida;
	private $nombre;
    private $estado;
    private $n_extintores;
    private $descripcion;
    private $area_real;
    private $confort;
    private $departamento;
    private $porcentaje_hacinamiento;
    private $imageData;



	
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function NuevaSalida($form_data){
        $fields = array_keys($form_data);
 
		$nombre = htmlentities($_POST['nombre']);
        $estado = htmlentities($_POST['estado']);
		$n_extintores = htmlentities($_POST['n_extintores']);
		$descripcion = htmlentities($_POST['descripcion']);
		$area_real = htmlentities($_POST['area_real']);
		$confort = htmlentities($_POST['confort']);
		$departamento = htmlentities($_POST['departamento']);
		$porcentaje_hacinamiento = htmlentities($_POST['porcentaje_hacinamiento']);
		$id_piso =htmlentities($_POST['id_piso']);
		
		 
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_archivo=($_FILES['ARCHIVO']['type']);
        $imageData = addslashes(file_get_contents($_FILES['ARCHIVO']['tmp_name']));
		
		 

        $consulta = "INSERT INTO `salida_de_emergencia` 
		(`id_salida`,`nombre`,`estado`,`n_extintores`,`descripcion`,`area_real`,`confort`
		,`departamento`,`porcentaje_hacinamiento`,`imagen`,`id_piso`) VALUES 
		(NULL,'$nombre','$estado','$n_extintores','$descripcion','$area_real','$confort'
		,'$departamento','$porcentaje_hacinamiento','$imageData' ,'$id_piso');";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear'); 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('Piso.php');					
			      </script>"; 
		}
	}
   
    function ModificarSalida($form_data){
        $fields = array_keys($form_data);
		
		$id_salida =htmlentities($_POST['id_salida']);
		$nombre = htmlentities($_POST['nombre']);
        $estado = htmlentities($_POST['estado']);
		$n_extintores = htmlentities($_POST['n_extintores']);
		$descripcion = htmlentities($_POST['descripcion']);
		$area_real = htmlentities($_POST['area_real']);
		$confort = htmlentities($_POST['confort']);
		$departamento = htmlentities($_POST['departamento']);
		$porcentaje_hacinamiento = htmlentities($_POST['porcentaje_hacinamiento']);
		$id_piso =htmlentities($_POST['id_piso']);
		
		
	     $nombre_archivo=($_FILES['ARCHIVO']['name']);
         $tipo_archivo=($_FILES['ARCHIVO']['type']);
       $imageData = addslashes(file_get_contents($_FILES['ARCHIVO']['tmp_name']));   
 
 
 
     if($nombre_archivo==null){
        $consulta = "UPDATE `salida_de_emergencia` SET `nombre` ='$nombre',`estado` ='$estado',
		`n_extintores` ='$n_extintores',`descripcion` ='$descripcion',`area_real` ='$area_real' 
        ,`confort` ='$confort' 	,`departamento` ='$departamento' ,
		`porcentaje_hacinamiento` ='$porcentaje_hacinamiento' 
 	 		
		WHERE `id_salida`='$id_salida'"; 
	 }else{
		 $consulta = "UPDATE `salida_de_emergencia` SET `nombre` ='$nombre',`estado` ='$estado',
		`n_extintores` ='$n_extintores',`descripcion` ='$descripcion',`area_real` ='$area_real' 
        ,`confort` ='$confort' 	,`departamento` ='$departamento' ,
		`porcentaje_hacinamiento` ='$porcentaje_hacinamiento',
		  `imagen` ='$imageData' 	
		WHERE `id_salida`='$id_salida'";  
		 
	 }
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible modificar');	 					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha modificado con éxito'); 
                    window.location.replace('Piso.php');					
			      </script>"; 
		}
	
	}
	
	  function EliminarSalida($form_data){
        $fields = array_keys($form_data);
		
		$id_salida = $_POST['id_salida'];
 
        $consulta = "UPDATE `salida_de_emergencia` SET `eliminar`='1'
		WHERE `id_salida`='$id_salida'";  
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar'); 
				  </script>"; 
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                   //  window.location = window.location.pathname;
                     window.location.replace('Edificio.php');
                    //location.reload(); 					
			      </script>"; 
		}
		
	
	} 
	
	
	
    
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 
 
 class GuardarLaboratorio{
 
	private $id_laboratorio;
	private $nombre;
    private $encargado;
    private $descripcion;
    private $reglamento;
    private $equipamiento;
    private $imageData;
    private $id_piso;
	
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function NuevoLaboratorio($form_data){
        $fields = array_keys($form_data);
 
		$nombre = htmlentities($_POST['nombre']);
        $encargado = htmlentities($_POST['encargado']);
		$descripcion = htmlentities($_POST['descripcion']);
		$reglamento = htmlentities($_POST['reglamento']);
		$equipamiento = htmlentities($_POST['equipamiento']);
		$id_piso =htmlentities($_POST['id_piso']);
 
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_archivo=($_FILES['ARCHIVO']['type']);
        $imageData = addslashes(file_get_contents($_FILES['ARCHIVO']['tmp_name']));
		
		 

        $consulta = "INSERT INTO `laboratorio` 
		(`id_laboratorio`,`nombre`,`encargado`,`descripcion`,`reglamento`,`equipamiento`,
		`imagen`,`id_piso`) VALUES 
		(NULL,'$nombre','$encargado','$descripcion','$reglamento','$equipamiento' 
		 ,'$imageData' ,'$id_piso');";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear'); 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('Piso.php');					
			      </script>"; 
		}
	}
   
    function ModificarLaboratorio($form_data){
        $fields = array_keys($form_data);
		
		$id_laboratorio =htmlentities($_POST['id_laboratorio']);
		$nombre = htmlentities($_POST['nombre']);
        $encargado = htmlentities($_POST['encargado']);
		$descripcion = htmlentities($_POST['descripcion']);
		$reglamento = htmlentities($_POST['reglamento']);
		$equipamiento = htmlentities($_POST['equipamiento']);
		$id_piso =htmlentities($_POST['id_piso']);
		
		
	     $nombre_archivo=($_FILES['ARCHIVO']['name']);
         $tipo_archivo=($_FILES['ARCHIVO']['type']);
       $imageData = addslashes(file_get_contents($_FILES['ARCHIVO']['tmp_name']));   
 
 
 
     if($nombre_archivo==null){
        $consulta = "UPDATE `laboratorio` SET `nombre` ='$nombre',`encargado` ='$encargado',
		`descripcion` ='$descripcion',`reglamento` ='$reglamento' 
        ,`equipamiento` ='$equipamiento' 
		WHERE `id_laboratorio`='$id_laboratorio'"; 
	 }else{
		 $consulta = "UPDATE `laboratorio` SET `nombre` ='$nombre',`encargado` ='$encargado',
		`reglamento` ='$reglamento',`equipamiento` ='$equipamiento' 
		`imagen` ='$imageData' 	
		 WHERE `id_laboratorio`='$id_laboratorio'";   
	 }
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible modificar');	 					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha modificado con éxito'); 
                    window.location.replace('Piso.php');					
			      </script>"; 
		}
	
	}
	
	  function EliminarLaboratorio($form_data){
        $fields = array_keys($form_data); 
		
		$id_laboratorio = $_POST['id_laboratorio']; 
 
        $consulta = "UPDATE `laboratorio` SET `eliminar`='1'
		WHERE `id_laboratorio`='$id_laboratorio'";   
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar'); 
				  </script>"; 
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                   //  window.location = window.location.pathname;
                     window.location.replace('Edificio.php');
                    //location.reload(); 					
			      </script>"; 
		}
 
	} 
 

    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 
 
 class Grifo{
	 
    private $id_grifo; 
	private $nombre; 
	private $posx; 
	private $posy; 
	private $descripcion; 
	private $estado;
 	private $resolucion; 	
	private $id_campus;
    private $imagen;
	
    function __construct($bd){
		 $this->con = new mysqli('localhost','root','',$bd); 
	}
 
    function insertar($form_data){

      $fields = array_keys($form_data);
  
      $posx = $_POST['posx'];
	  $posy = $_POST['posy'];
	  $posx=$posx-63;
	  $posy = $posy-230;
 
 
		$nombre_imagen=$_FILES['ARCHIVO']['name'];
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 20 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/imagenes/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
     
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 
	    $nombre = htmlentities($_POST['nombre']);
 	    $descripcion =htmlentities($_POST['descripcion']);
        $estado =htmlentities($_POST['estado']);          
        $estado =trim($estado);
        $estado =ucfirst($estado);	
   
 
	  $consulta = "INSERT INTO `grifo` 
	  (`id_grifo`, `nombre`, `posx`, `posy`, `descripcion`, `estado`, `id_campus`,imagen)
	   VALUES (NULL, '$nombre', '$posx', '$posy', '$descripcion','$estado', '1','$nnombre');";
 
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear'); 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('Principal.php');					
			      </script>"; 
		}
	  
	  
	  
	  
	}		 
     function ModificarGrifo($form_data){
        $fields = array_keys($form_data);
		$id_grifo = $_POST['id_grifo'];
        $posx = $_POST['posx'];
	    $posy = $_POST['posy'];
		$resolucion = $_POST['resolucion'];
		
		$conn = mysqli_connect("localhost","root","","tesis");
		$result = mysqli_query($conn, 'SELECT *
									  	   FROM grifo
										   WHERE id_grifo='.$id_grifo.'
										   AND posx='.$posx.'
										   AND posy='.$posy.'
										   ;'); 
	    while($row = mysqli_fetch_array($result)){
        $resolucion = "0";
        }  
 
    if($resolucion !="0"){
        
	    if($resolucion =="R0"){
	    $posx=$posx-63;
	    $posy = $posy-230;
		}else if($resolucion =="R1"){
	    $posx=$posx+7;
	    $posy = $posy-230;
		}else if($resolucion =="R2"){
	    $posx=$posx-30;
	    $posy = $posy-230;
		} 
    }	
		
		
		 
		$nombre = htmlentities($_POST['nombre']);
		$descripcion =htmlentities($_POST['descripcion']);
        $estado =htmlentities($_POST['estado']);          
        $estado =trim($estado);
        $estado =ucfirst($estado);	 

		$nombre_imagen=$_FILES['ARCHIVO']['name'];
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=5000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/imagenes/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        echo "Archivo subido satisfactoriamente";
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
			
			
			
			if($nombre_imagen==null){
              $consulta = "UPDATE `grifo` SET `nombre`='$nombre',
			  `posx`='$posx',`posy`='$posy',
		     `descripcion`='$descripcion' , `estado`='$estado' 
		      WHERE `id_grifo`='$id_grifo'"; 
			}else{
			 $consulta = "UPDATE `grifo` SET `nombre`='$nombre',
			 `posx`='$posx',`posy`='$posy',
		     `descripcion`='$descripcion', `estado`='$estado' ,`imagen`='$nnombre'  
		      WHERE `id_grifo`='$id_grifo'"; 	
				
			}
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible modificar');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha modificado con éxito'); 
                    window.location.replace('NGrifo.php');					
			      </script>"; 
		}           
 
	 }
	 
	 
	 function EliminarGrifo($form_data){
        $fields = array_keys($form_data);
		
		$id_grifo = $_POST['id_grifo'];
 
        $consulta = "UPDATE `grifo` SET `eliminar`='1'
		WHERE `id_grifo`='$id_grifo'"; 
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                    window.location.replace('NGrifo.php');					
			      </script>"; 
		}
		
	
	}
	 
	 
	 
	 
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 
 
 
 class ZonadeSeguridad{
	 
    private $id_zonadeseguridad; 
	private $nombre; 
	private $posx; 
	private $posy; 
	private $descripcion;  	
	private $id_campus;
    private $imagen;
    private $resolucion;
	
    function __construct($bd){
		 $this->con = new mysqli('localhost','root','',$bd); 
	}
 
    function insertar($form_data){

      $fields = array_keys($form_data);
      $posx = $_POST['posx'];
	  $posy = $_POST['posy'];
	  $posx=$posx-63;
	  $posy = $posy-225;
 
 
		$nombre_imagen=$_FILES['ARCHIVO']['name'];
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 20 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/imagenes/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
     
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 
	    $nombre = htmlentities($_POST['nombre']);
 	    $descripcion =htmlentities($_POST['descripcion']);
   
 
	  $consulta = "INSERT INTO `zonadeseguridad` 
	  (`id_zonadeseguridad`, `nombre`, `posx`, `posy`, `descripcion`, `id_campus`,imagen)
	   VALUES (NULL, '$nombre', '$posx', '$posy', '$descripcion', '1','$nnombre');";
 
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear'); 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('Principal.php');					
			      </script>"; 
		}
	  
	  
	  
	  
	}		 
    
	    function Modificar($form_data){
        $fields = array_keys($form_data);
        $posx = $_POST['posx'];
	    $posy = $_POST['posy'];
		$resolucion = $_POST['resolucion'];
        $id_zonadeseguridad = $_POST['id_zonadeseguridad'];
		
        $conn = mysqli_connect("localhost","root","","tesis");
		$result = mysqli_query($conn, 'SELECT *
									  	   FROM zonadeseguridad 
										   WHERE id_zonadeseguridad='.$id_zonadeseguridad.'
										   AND posx='.$posx.'
										   AND posy='.$posy.'
										   ;'); 
	    while($row = mysqli_fetch_array($result)){
        $resolucion = "0";
        } 
  
 
	    if($resolucion =="R0"){
	    $posx=$posx-63;
	    $posy = $posy-230;
		}else if($resolucion =="R1"){
	    $posx=$posx+7;
	    $posy = $posy-230;
		}else if($resolucion =="R2"){
	    $posx=$posx-30;
	    $posy = $posy-230;
		} 
  
		 
		$nombre = htmlentities($_POST['nombre']);
		$descripcion =htmlentities($_POST['descripcion']);
	 

		$nombre_imagen=$_FILES['ARCHIVO']['name'];
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=5000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/imagenes/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        echo "Archivo subido satisfactoriamente";
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
			
			
			
			if($nombre_imagen==null){
              $consulta = "UPDATE `zonadeseguridad` SET `nombre`='$nombre',
			  `posx`='$posx',`posy`='$posy',
		     `descripcion`='$descripcion'  
		      WHERE `id_zonadeseguridad`='$id_zonadeseguridad'"; 
			}else{
			 $consulta = "UPDATE `zonadeseguridad` SET `nombre`='$nombre',
			 `posx`='$posx',`posy`='$posy',
		     `descripcion`='$descripcion', `imagen`='$nnombre'  
		      WHERE `id_zonadeseguridad`='$id_zonadeseguridad'"; 	
				
			}
		 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible modificar');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha modificado con éxito'); 
                    window.location.replace('NZonadeSeguridad.php');					
			      </script>"; 
		}           
 
	 }
	 
	 
	 function Eliminar($form_data){
        $fields = array_keys($form_data);
		
		$id_zonadeseguridad = $_POST['id_zonadeseguridad'];
 
        $consulta = "UPDATE `zonadeseguridad` SET `eliminar`='1'
		WHERE `id_zonadeseguridad`='$id_zonadeseguridad'"; 
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                    window.location.replace('NZonadeSeguridad.php');					
			      </script>"; 
		}
		
	
	}
	 
	 
	 
	 
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 
 
 
 
 
 
 
 
  class GuardarDocumentosEdificio{
 
	private $id_documentoedificio;
	private $titulo;
	private $id_edificio;
 
	
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function NuevoDocumentoEdificio($form_data){
        $fields = array_keys($form_data);
		
        $titulo = htmlentities($_POST['titulo']);
        $id_edificio = htmlentities($_POST['id_edificio']);
 
        $nombre_imagen=$_FILES['ARCHIVO']['name'];
		$nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/pdf/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 
        $consulta = "INSERT INTO `documentoedificio` 
		(`id_documentoedificio`,`titulo`,`archivo`,
		`id_edificio`) 
		VALUES 
		(NULL,'$titulo','$nnombre','$id_edificio');";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear');
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('Edificio.php');					
			      </script>"; 
		}
	}
   
    function ModificarDocumentoEdificio($form_data){
        $fields = array_keys($form_data);
		
		$id_documentoedificio = htmlentities($_POST['id_documentoedificio']);
        $titulo = htmlentities($_POST['titulo']);
        $id_edificio = htmlentities($_POST['id_edificio']);

	    $nombre_imagen=$_FILES['ARCHIVO']['name'];
		$nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/pdf/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 
	    if($nombre_archivo==null){ 
		
        $consulta = "UPDATE `documentoedificio` 
		SET `titulo`='$titulo'  
		WHERE `id_documentoedificio`='$id_documentoedificio'"; 
	    }else{
		$consulta = "UPDATE `documentoedificio` 
		SET `titulo`='$titulo',`archivo`='$nnombre'   
		WHERE `id_documentoedificio`='$id_documentoedificio'"; 
			
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
 
    	function EliminarDocumentoEdificio($form_data){ 
        $fields = array_keys($form_data);
		
		$id_documentoedificio = $_POST['id_documentoedificio'];  
 
        $consulta = "UPDATE `documentoedificio` SET `eliminar`='1'
		WHERE `id_documentoedificio`='$id_documentoedificio'";  
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar'); 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                     window.location = window.location.pathname;					
			      </script>"; 
		}
	}
 
 
 
 
 
 
 
 
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }

 
 
 

 
  class GuardarPlanDeEmergencia{
 
	private $id_plandeemergencia;
 
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
 
    function ModificarPlanDeEmergencia($form_data){
        $fields = array_keys($form_data);
		
		$id_plandeemergencia = htmlentities($_POST['id_plandeemergencia']);
 

	    $nombre_imagen=$_FILES['ARCHIVO']['name'];
		$nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/pdf/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 
	    if($nombre_archivo==null){ 
		
        $consulta = "UPDATE `plandeemergencia` 
		SET `id_campus`='1'   
		WHERE `id_plandeemergencia`='$id_plandeemergencia'"; 
	    }else{
		$consulta = "UPDATE `plandeemergencia` 
		SET `archivo`='$nnombre'   
		WHERE `id_plandeemergencia`='$id_plandeemergencia'"; 	
		}
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible modificar');
				  </script>";
		}else{
			echo "<script>
					alert('Se ha modificado con éxito'); 
                    window.location.replace('Principal.php');					
			      </script>"; 
		}
	
	}
 
    	 
 
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 
 
 
 
 
 
 
 class GuardarHistorialMutual{
 
	private $id_historialmutual;
	private $titulo;
	private $fecha;
	private $descripcion;
	private $estado;
	private $id_campus;
 
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
 
	 function NuevoArchivoMutual($form_data){
        $fields = array_keys($form_data);
		
		$fecha = htmlentities($_POST['fecha']);
		$titulo = htmlentities($_POST['titulo']);
        $descripcion = htmlentities($_POST['descripcion']);
        $estado =htmlentities($_POST['estado']);          
        $estado =trim($estado);
        $estado =ucfirst($estado);	
		$id_campus = "1";
     
        $nombre_imagen=$_FILES['ARCHIVO']['name'];
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/pdf/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);  
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 	    if($nombre_archivo==null){ 
        $consulta = "INSERT INTO `historialmutual`  
		(`id_historialmutual` ,`titulo`,`fecha`,`estado`,`descripcion`,`id_campus`) 
		VALUES  
		(NULL, '$titulo','$fecha','$estado','$descripcion','$id_campus');";
		}else{
        $consulta = "INSERT INTO `historialmutual`  
		(`id_historialmutual`,`archivo`,`titulo`,`fecha`,`estado`,`descripcion`,`id_campus`) 
		VALUES  
		(NULL,'$nnombre','$titulo','$fecha','$estado','$descripcion','$id_campus');"; 
		}
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear');
					 
				  </script>";
		}else{
			echo "<script> 
					alert('Se ha creado con éxito'); 
                    window.location.replace('Mutual.php');					
			      </script>"; 
		}
	}
	
	
	function EliminarHistorialMutual($form_data){ 
        $fields = array_keys($form_data);
		
		$id_historialmutual = $_POST['id_historialmutual'];  
 
        $consulta = "UPDATE `historialmutual` SET `eliminar`='1'
		WHERE `id_historialmutual`='$id_historialmutual'";  
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                    window.location.replace('Mutual.php');					
			      </script>"; 
		}
 
	}
	
	
	 function ModificarArchivoMutual($form_data){
        $fields = array_keys($form_data);
		
		$id_historialmutual = htmlentities($_POST['id_historialmutual']);
		$titulo =htmlentities($_POST['titulo']);
		$fecha = htmlentities($_POST['fecha']);
        $descripcion =htmlentities($_POST['descripcion']);
        $estado =htmlentities($_POST['estado']);          
        $estado =trim($estado);
        $estado =ucfirst($estado); 
		
        $nombre_imagen=$_FILES['ARCHIVO']['name'];
	    $nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_imagen=$_FILES['ARCHIVO']['type'];
        $tamano_imagen=$_FILES['ARCHIVO']['size'];
		if($tamano_imagen<=20000000){ //archivos hasta 5 megas 
        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/FoundationR/pdf/'; 
        $info = pathinfo($_FILES['ARCHIVO']['name']); 
        $nnombre = md5(rand().time()).".".$info['extension']; 
        move_uploaded_file($_FILES['ARCHIVO']['tmp_name'],$carpeta_destino.$nnombre);   
        
        }else{
            echo $_FILES['ARCHIVO']['size'];
            echo "El tamaño excede el límite establecido";
        }
 
   if($nombre_archivo==null){ 
   
        $consulta = "UPDATE `historialmutual` SET `titulo`='$titulo' 
	    ,`fecha`='$fecha',`descripcion`='$descripcion' ,`estado`='$estado'		
		WHERE `id_historialmutual`='$id_historialmutual'"; 
   }else{
	          $consulta = "UPDATE `historialmutual` SET `archivo`='$nnombre' ,
			  `titulo`='$titulo',`fecha`='$fecha',`descripcion`='$descripcion',`estado`='$estado' 		
		WHERE `id_historialmutual`='$id_historialmutual'";     
   }
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible modificar'); 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha modificado con éxito'); 
                    window.location.replace('Mutual.php');			
			      </script>"; 
		}
	}
	
		
	 function EliminarArchivoMutual($form_data){
        $fields = array_keys($form_data);
        $id_historialmutual = $_POST['id_historialmutual'];
 
 
        $consulta = "UPDATE `historialmutual` SET `archivo`=NULL
		WHERE `id_historialmutual`='$id_historialmutual'"; 
 		 
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible eliminar');
				  </script>";
		}else{
			echo "<script>
					alert('Se ha eliminado con éxito'); 
                    window.location.replace('Mutual.php');						
			      </script>"; 
		}
	}
 
	 
 
	
	
 
    public function cerrarBD(){
		$this->con->close();
	}
 
 }
 
 
 
 
 
 
 
 
?>