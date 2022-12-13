<?php  

	//Matías José García Fernández

	class Database{

		private static $instancia = null;
		private $resultado;			//guarda el resultado de las queries
		private $con;				// guarda la conexion con el motor de BDs

		private function __clone() { }

		//CREAMOS LA CONEXION CON EL MOTOR DE BASE DE DATOS
		private function __construct(){
			try{  
				$this->con = new mysqli("database-php.cdfdtjniydze.us-east-1.rds.amazonaws.com", "root", "bKoxIE1xYZ78TfWBPnG7", "agenda");
			} catch(mysqli_sql_exception){
				die("ERROR EN LA BASE DE DATOS");
			}
		}

		/**
		 * Ejecuta una consulta sobre la base de datos
		 * @param String $sql
		 * @return
		 */
		public function query(String $sql){
			$this->resultado = $this->con->query($sql);
			return $this;
		}

		public function getData($clase = "StdClass"){
			return $this->resultado->fetch_object($clase);
		}

		public function getAll($clase = "StdClass"){
			$salida = [];
			while ($item = $this->getData($clase)) {
				$salida[] = $item;
			}
			return $salida;
		}

		/**
		 * Escapa las cadenas que se pasan como parametro en el array
		 * @param $cad
		 * @return
		 */
		public function escape(array $cad): array{
			$salida = [];
			foreach ($cad as $clave => $item) {
				$salida[$clave] = $this->con->real_escape_string($item);
				//array_push($salida, $this->con->real_escape_string($item));
			}

			return $salida;
		}

		/**
		 * Creo y devuelve la instancia de la clase
		 * @return
		 */
		public static function getDatabase(){
			if (self::$instancia == null) {
				self::$instancia = new Database;
			}

			return self::$instancia;
		}
	}
?>