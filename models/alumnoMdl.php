<?php
	/*
	 * Modelo para alumnos
	 */
	
	class alumnoMdl
	{
		public $conexion;
		public $datos;
		
		function __construct()
		{
			//Crea la conexión a la base de datos
		}
		
		function alta($datos)
		{
			
			//Mandar a la base de datos
			//Si se pudo insertar
			return true;
			//Sino
			return false;
		}
	}
?>