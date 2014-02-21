<?php 
	/**
	  * @author
	  * @since
	  *
	  * Este archivo recibe la peticion y decide qué controlador
	  * se debe ejecutar
	 */
	 
	 if(isset($_GET['controler']))
		switch($_GET['controler'])
		{
			case 'alumno':
				require('controlers/alumnoCtrl.php');
				$controler = new alumnoCtrl();
				break;
			default:
				//Code
				break;
		}
		
		$controler->ejecutar();
?>