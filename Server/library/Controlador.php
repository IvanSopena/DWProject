<?php
	
	//Clase controlador principal
	//Se encargar de poder cargar los modelos y las vista

	class Controlador{
		
		//Cargar modelo
		public function modelo($modelo){
			//carga
			require_once  'Server/models/' . $modelo . '.php';
			//Instanciar el modelo
			return new $modelo();
		}
		

		//Cargar vista
		public function vista($vista, $datos = []){
			//chequear si el archivo vista existe
			if (file_exists('Server/views/' . $vista . '.php')) {
				require_once  'Server/views/' . $vista . '.php';
			}else{
				//si el archivo de la vista no existe
				require_once  'Server/views/404php';
			}
			
		}
	}