<?php  
	require_once "lib/token.php";
	require_once "tabla/usuario.php";
	require_once "tabla/contacto.php";
	session_start();
	if (!empty($_POST)) {
		if(Token::check($_POST["_token"])){
			$usuario = unserialize($_SESSION["usuario"]);
			$contacto = new Contacto;

			$contacto->idUsu=$usuario->getIDUsu();
			$contacto->nombre=$_POST["nombre"];
			$contacto->apellidos=$_POST["apellidos"];
			$contacto->telefono=$_POST["telefono"];
			$contacto->email=$_POST["email"];
			$contacto->foto=$_POST["foto"];
			$contacto->observaciones=$_POST["observaciones"];

			$contacto->save();

			header("location: main.php");
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
<body>
	<div class="w-screen h-screen flex">
		<div class="w-2/4 h-screen bg-black">
			<svg xmlns="http://www.w3.org/2000/svg" fill="white" class="w-12 h-12 align-center text-white m-auto" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
  				<path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
			</svg>

			<h1 class="text-center text-2xl my-6 font-bold text-white">Introducir nuevo contacto</h1>
			<div class="ml-20">
				<form action="" method="post">
					<?= new Token; ?>
					<div class="relative z-0 mb-6 w-3/4 group">
      					<input type="text" name="nombre" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      					<label for="nombre" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
  					</div>
  					<div class="relative z-0 mb-6 w-3/4 group">
      					<input type="text" name="apellidos" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      					<label for="apellidos" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Apellidos</label>
  					</div>
  					<div class="relative z-0 mb-6 w-3/4 group">
      					<input type="text" name="telefono" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      					<label for="telefono" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Telefono</label>
  					</div>
  					<div class="relative z-0 mb-6 w-3/4 group">
      					<input type="email" name="email" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      					<label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
  					</div>
  					<div class="relative z-0 mb-6 w-3/4 group">
      					<input type="text" name="foto" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      					<label for="foto" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Foto</label>
  					</div>
  					<div class="relative z-0 mb-6 w-3/4 group">
      					<label for="message" class="block mb-2 text-sm font-medium text-white dark:text-white">Observaciones</label>
						<textarea name="observaciones" rows="4" class="block p-2.5 w-full text-sm bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea>
  					</div>
  					<div class="mt-4 z-0 group">
  						<button class="mt-4 border-8 rounded-lg border-blue-600 p-4 w-2/4 text-white font-bold hover:bg-blue-500">Enviar</button>
  						<a href="main.php" class="p-4 border-8 border-red-600 rounded-lg m-auto px-14 text-white font-bold hover:bg-red-500">Cancelar</a>
  					</div>
				</form>
			</div>
		</div>
		<div class="flex w-2/4 h-screen bg-image" style="background-image: url(https://4kwallpapers.com/images/wallpapers/dark-background-abstract-background-network-3d-background-1920x1080-8324.png);">
			<h1 class="text-5xl m-auto text-white font-bold">AgenDAW</h1>
		</div>
	</div>

</body>
</html>