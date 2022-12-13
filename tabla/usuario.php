<?php  
		
	/**
	 * Matías José García Fernández
	 * */

	require_once "lib/database.php";

	class Usuario {

		private $idUsu;

		private $email;

		private $clave;

		private $nombre;
		
		private $apellidos;

		public function getNombre(): String{
			return $this->nombre;
		}

		public function getIDUsu(): String{
			return $this->idUsu;
		}

		public function __sleep() {
			return ["idUsu", "email", "nombre", "apellidos"];
		}

		public function __wakeup(){
			
		}

		public function __set($prop, $valor){
			$this->$prop = $valor;
		}

		public function NewUsu(){
			
			//Conectamos con la base de datos
			$db = Database::getDatabase();
			$clave = md5($this->clave);
			$sql = "INSERT INTO usuario VALUES (null, '{$this->email}', '{$clave}', '{$this->nombre}', '{$this->apellidos}');";
			$db->query($sql);
		
		}
	}
?>