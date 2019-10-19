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
		$estado = htmlentities($_POST['estado']) ;
 
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

 class GuardarUnidad{
 
	private $id_unidad;
	private $nombre;
	private $total_func;
    private $func_aporta_edi;
    private $fecha_act;
    private $estado;
    private $id_edificio;
	
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function NuevaUnidad($form_data){
        $fields = array_keys($form_data);
		
		$nombre = htmlentities($_POST['nombre']);
		$total_func =htmlentities($_POST['total_func']);
        $func_aporta_edi =htmlentities($_POST['func_aporta_edi']);
		$fecha_act =htmlentities($_POST['fecha_act']);
		$estado =htmlentities($_POST['estado']);
		$id_edificio =htmlentities($_POST['id_edificio']);
 
        $consulta = "INSERT INTO `unidad` 
		(`id_unidad`,`nombre`,`total_func`,`func_aporta_edi`,`fecha_act`,`estado`,`id_edificio`) 
		VALUES 
		(NULL,'$nombre','$total_func','$func_aporta_edi','$fecha_act','$estado','$id_edificio');";
    
		 
		 
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
   
    function ModificarUnidad($form_data){
        $fields = array_keys($form_data);
		
		$id_unidad = htmlentities($_POST['id_unidad']);
		$nombre = htmlentities($_POST['nombre']);
		$total_func =htmlentities($_POST['total_func']);
        $func_aporta_edi =htmlentities($_POST['func_aporta_edi']);
		$fecha_act =htmlentities($_POST['fecha_act']);
		$estado =htmlentities($_POST['estado']);
		$id_edificio =htmlentities($_POST['id_edificio']);

        $consulta = "UPDATE `unidad` SET `nombre`='$nombre' 
	    ,`total_func`='$total_func',`func_aporta_edi`='$func_aporta_edi'
        ,`fecha_act`='$fecha_act',`estado`='$estado',`id_edificio`='$id_edificio'     		
		WHERE `id_unidad`='$id_unidad'"; 
 
		 
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
		
		$reglamento_interno = htmlentities($_POST['reglamento_interno']);
        $elementos_de_proteccion_personal = htmlentities($_POST['elementos_de_proteccion_personal']);
		$vestimenta = htmlentities($_POST['vestimenta']);
		$herramientas = htmlentities($_POST['herramientas']);
		$id_edificio = htmlentities($_POST['id_edificio']);
 
        $consulta = "INSERT INTO `procedimiento` 
		(`id_procedimiento`,`reglamento_interno`,`elementos_de_proteccion_personal`,`vestimenta`,`herramientas`,`id_edificio`) 
		VALUES 
		(NULL,'$reglamento_interno','$elementos_de_proteccion_personal','$vestimenta','$herramientas','$id_edificio');";
 
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
		$reglamento_interno = htmlentities($_POST['reglamento_interno']);
        $elementos_de_proteccion_personal = htmlentities($_POST['elementos_de_proteccion_personal']);
		$vestimenta = htmlentities($_POST['vestimenta']);
		$herramientas = htmlentities($_POST['herramientas']);
		$id_edificio = htmlentities($_POST['id_edificio']);

        $consulta = "UPDATE `procedimiento` SET `reglamento_interno`='$reglamento_interno' 
	    ,`elementos_de_proteccion_personal`='$elementos_de_proteccion_personal',
		`vestimenta`='$vestimenta'
        ,`herramientas`='$herramientas',`id_edificio`='$id_edificio'     		
		WHERE `id_procedimiento`='$id_procedimiento'"; 
 
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
   
    function ModificarRiesgo($form_data){
        $fields = array_keys($form_data);
		
		$id_riesgo = $_POST['id_riesgo'];
		$nombre = htmlentities($_POST['nombre']);
		$descripcion =htmlentities($_POST['descripcion']);

		$nombre_archivo=($_FILES['ARCHIVO']['name']);
        $tipo_archivo=($_FILES['ARCHIVO']['type']);
        $imageData = addslashes(file_get_contents($_FILES['ARCHIVO']['tmp_name']));
			
			if($nombre_archivo==null){
              $consulta = "UPDATE `riesgo` SET `nombre`='$nombre',
		     `descripcion`='$descripcion' 
		      WHERE `id_riesgo`='$id_riesgo'"; 
			}else{
			 $consulta = "UPDATE `riesgo` SET `nombre`='$nombre',
		     `descripcion`='$descripcion',`icono`='$imageData'  
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
        $id_piso =htmlentities($_POST['id_piso']);
   
        $consulta = "INSERT INTO `extintor` (`id_extintor`,`nombre`,`fecha_carga`,
		`fecha_venc`,`ubicacion`,`estado`,`id_piso`)
		VALUES (NULL,'$nombre','$fecha_carga','$fecha_venc',
		'$ubicacion','$estado','$id_piso');";
 
        $resultado_cons = mysqli_query($this->con,$consulta);
	    
        if($resultado_cons == false){
			echo "<script> 
					 alert('No es posible crear');
					 
				  </script>";
		}else{
			echo "<script>
					alert('Se ha creado con éxito'); 
                    window.location.replace('Extintores.php');					
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
        $estado = htmlentities($_POST['estado']);
        $id_piso = htmlentities($_POST['id_piso']);

        $consulta = "UPDATE `extintor` SET `nombre`='$nombre',
		`fecha_carga`='$fecha_carga',`fecha_venc`='$fecha_venc',
		`ubicacion`='$ubicacion',`estado`='$estado',
	    `id_piso`='$id_piso'
		WHERE `id_extintor`='$id_extintor'"; 
  
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
	
    function __construct($bd){
	    $this->con = new mysqli('localhost','root','',$bd); 
	}
	
    function NuevaRedHumeda($form_data){
        $fields = array_keys($form_data);
		
		$nombre = htmlentities($_POST['nombre']);
        $ubicacion =htmlentities($_POST['ubicacion']);
        $estado =htmlentities($_POST['estado']);	
        $id_piso =htmlentities($_POST['id_piso']);
 
        $consulta = "INSERT INTO `red_humeda` (`id_redhumeda`,`nombre`, 
	    `ubicacion`,`estado`,`id_piso`)
		VALUES (NULL,'$nombre','$ubicacion','$estado','$id_piso');";
 
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
	
	}
 
	 
	function ModificarRedHumeda($form_data){
        $fields = array_keys($form_data);
		
		$id_redhumeda = $_POST['id_redhumeda'];
		$nombre = htmlentities($_POST['nombre']);
        $ubicacion = htmlentities($_POST['ubicacion']);
        $estado = htmlentities($_POST['estado']);
        $id_piso = htmlentities($_POST['id_piso']);

        $consulta = "UPDATE `red_humeda` SET `nombre`='$nombre', 
		`ubicacion`='$ubicacion',`estado`='$estado',
	    `id_piso`='$id_piso'
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

    public function cerrarBD(){
		$this->con->close();
	}
 
 }

?>