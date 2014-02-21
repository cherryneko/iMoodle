<?php
	/**
	  * Controlador Alumno
	  * @autor
	  * @since
	  */
	 require('controlers/estandarCtrl.php'); 
	 class alumnoCtrl extends estandarCtrl{
		public $modelo;
		
		function __construct(){
			//cuando se construye ese desea crear el objeto
			require('models/alumnoMdl.php');
			$this->modelo = new alumnoMdl();
		}
		
		function ejecutar(){
			//Valida la acción
			if(isset($_GET['action']))
				switch($_GET['action']){
					case 'alta':
						//Validar que tenga permisos
						//Validar las entradas 
						$datos = array();
						$datos['nombre'] = $this->validarNombre($_GET['nombre']);
						$datos['correo'] = $this->validarCorreo($_GET['correo']);
						
						$status = $this->modelo->alta($datos);
						
						if($status){
							//Cargar la vista de alumno insertado
							include('views/alumnoInsertado.php');
							//El alumno se insertó...
						}
						else{
							include('views/error.php');
						}
						break;
				}
		}
	 }
?>