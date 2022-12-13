<?php  
	require_once "tabla/usuario.php";
	if(!empty($_POST)){

		if($_POST['clave'] != $_POST["valida"]){
			$error = "Las contraseñsa no son iguales";
		}else{
			$usuario = new Usuario;

			$usuario->email = $_POST["email"];
			$usuario->clave = $_POST["clave"];
			$usuario->nombre = $_POST["nombre"];
			$usuario->apellidos = $_POST["apellidos"];

			$usuario->NewUsu();
			header("location: index.php");
		}
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex w-2/4 h-screen bg-image" style="background-image: url(https://4kwallpapers.com/images/wallpapers/dark-background-abstract-background-network-3d-background-1920x1080-8324.png);">
	
	<div class="bg-black w-2/4 h-screen absolute left-1/4 shadow-2xl shadow-white">
		<svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 align-center text-white m-auto">
  			<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
		</svg>

	<h1 class="text-center text-2xl my-6 font-bold text-white">Registro</h1>
	<?php if(isset($error)): ?>
		<p class="text-center text-sm mb-4 text-red-700"><?= $error ?></p>
	<?php endif; ?>
		<form action="" method="post" class="ml-32 justify-center">
			<div class="relative z-0 mb-6 w-3/4 group">
      			<input type="email" name="email" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      			<label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
  			</div>
  			<div class="relative z-0 mb-6 w-3/4 group">
      			<input type="text" name="nombre" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      			<label for="nombre" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
  			</div>
  			<div class="relative z-0 mb-6 w-3/4 group">
      			<input type="text" name="apellidos" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      			<label for="apellidos" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Apellidos</label>
  			</div>
  			<div class="relative z-0 mb-6 w-3/4 group">
      			<input type="password" name="clave" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      			<label for="clave" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contraseña</label>
  			</div>
  			<div class="relative z-0 mb-6 w-3/4 group">
      			<input type="password" name="valida" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      			<label for="valida" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-white peer-focus:dark:text-white peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Repite contraseña</label>
  			</div>
  			<div class="mt-4 z-0 group">
  						<button class="mt-4 border-8 rounded-lg border-blue-600 p-4 w-2/4 text-white font-bold hover:bg-blue-500">Enviar</button>
  						<a href="index.php" class="p-4 border-8 border-red-600 rounded-lg m-auto px-14 text-white font-bold hover:bg-red-500">Cancelar</a>
  					</div>
		</form>
	</div>
</body>
</html>