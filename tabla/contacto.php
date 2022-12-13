<?php  
	
	require_once "lib/database.php";

	class Contacto {

		private $idCon;

		private $idUsu;

		private $nombre;

		private $apellidos;

		private $telefono;

		private $email;

		private $foto;
		
		private $observaciones;

		// public function __construct(array $datos) {
		// 	foreach($datos as $clave => $item){
		// 		$this->clave = $item;
		// 	}
		// }

		public function __get($prop) {
			return $this->$prop ;
		}

		public function __set($prop, $valor){
			$this->$prop = $valor;
		}

		/**
		 * @return
		 */
		public function delete() {

			// conectamos con la base de datos y borramos el registro.
			$db = Database::getDatabase();
			$sql = ("DELETE FROM contacto WHERE idCon = {$this->idCon};") ;
			$db->query($sql);
		}

		public function save(){
			
			//Conectamos con la base de datos
			$db = Database::getDatabase();
			$sql = "INSERT INTO contacto VALUES (null, {$this->idUsu}, '{$this->nombre}', '{$this->apellidos}', '{$this->telefono}', '{$this->email}', '{$this->foto}', '{$this->observaciones}');";
			$db->query($sql);
		
		}

		public function update() {

			// conectamos con la base de datos	
			$db = Database::getDatabase() ;

			// escapamos las cadenas
			//$resultado = $db->escape($_POST) ;
			
			// construimos la consulta y la lanzamos
			$sql = "UPDATE contacto 
			        SET nombre = '{$this->nombre}', 
			        	apellidos = '{$this->apellidos}', 
			        	telefono = '{$this->telefono}', 
			        	email = '{$this->email}', 
			        	foto = '{$this->foto}', 
			        	observaciones = '{$this->observaciones}'
			        WHERE idCon = {$this->idCon} ;" ;
			//			
			$db->query($sql) ;

		}

		/**
		 * */
		public static function getAllByUser(int $idUsu): array{
			$db = Database::getDatabase();

			$sql = "SELECT * FROM contacto where idUsu = {$idUsu};";

			return $db->query($sql)->getAll("Contacto");
		}

		public static function getById(int $idCon): ?Contacto{
			$db = Database::getDatabase();

			$sql = "SELECT * FROM contacto where idCon = {$idCon};";

			return $db->query($sql)->getData("Contacto");
		}

		public function __toString() {
			return 	"{$this->nombre} {$this->apellidos}";
		}

	}
?>