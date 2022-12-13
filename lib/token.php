<?php 

	class Token{

		private string $token;

		public function __construct(){
			$this->token = md5(time());

			$_SESSION["_token"] = $this->token;
		}

		public function __toString():string {
			return "<input type=\"hidden\" name=\"_token\" value=\"{$this->token}\"/>";
		}

		/**
		 * @param string $token
		 * @return
		 */
		public static function check(string $token): bool{
			return ($_SESSION["_token"]==$token);
		}
	}


?>