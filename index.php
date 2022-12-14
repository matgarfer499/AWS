<?php  

	include_once "lib/database.php";
	include_once "tabla/usuario.php";
	include_once "lib/token.php";
	session_start();

	if(!empty($_POST)){

		if(Token::check($_POST["_token"])){
			$db = Database::getDatabase();
			$datos = $db->escape($_POST);

			$email = $_POST["email"];
			$clave = md5($_POST["clave"]);

			$db->query("SELECT * FROM usuario WHERE email = '{$email}' AND clave = '$clave';");
			$usuario = $db->getData("Usuario");

			if ($usuario == null) {
				$error = "Nombre de usuario o contraseña incorrectos";
			} else {
				$_SESSION["inicio"]=time();
				$_SESSION["usuario"] = serialize($usuario);

				header("location: main.php");
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AgenDAW</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-neutral-800 to-neutral-900 via-blue-900 min-h-screen">
	<div class="flex items-center justify-center">
		<div class="px-8 py-6 mt-4 text-left bg-white shadow-2xl">
			<div class="flex justify-center">
				<svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-blue-600" fill="none" viewBox="0 0 24 24"
				stroke="currentColor">
				<path d="M12 14l9-5-9-5-9 5 9 5z" />
				<path
				d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
				d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
			</svg>
		</div>
		<h3 class="text-2xl font-bold text-center">Introduce tus datos</h3>
		<form action="" method="post">
			<?= new Token; ?>
			<div class="mt-4">
				<div>

			<?php if (isset($error)):?>
				<p class="text-sm mb-4 text-red-700"><?= $error ?></p>
			<?php endif; ?>
					<label class="block" for="email">Email<label>
						<input type="text" placeholder="usuario@email.com"
						class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" name="email" value="">
					</div>
					<div class="mt-4">
						<label class="block">Contraseña<label>
							<input type="password" placeholder="Contraseña"
							class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" name="clave" value="">
						</div>
						<div class="flex flex-wrap items-baseline justify-between">
							<a href="NewUsu.php" class="text-sm text-blue-600 hover:underline mt-4">¿No tienes cuenta? Registrate</a>
							<button class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900 w-full">Login</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
	</html>