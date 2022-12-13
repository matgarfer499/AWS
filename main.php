<?php  
	session_start();

	require_once "tabla/usuario.php";
	require_once "tabla/contacto.php";
	$usuario = unserialize($_SESSION["usuario"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Principal</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 flex flex-col min-h-screen">
	<nav class="flex items-center justify-between flex-wrap bg-black p-6 mb-16">
		<div class="flex items-center flex-shrink-0 text-white mr-6">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
			</svg>

			<span class="font-semibold text-xl tracking-tight">AgenDaw</span>
		</div>
		<div>
			<a href="NewCon.php" class="mr-32">
				<svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hover:animate-bounce w-6 h-6">
					<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
				</svg>
			</a>
		</div>
		<div class="flex flex-wrap">
			<a href="logout.php" class="bg-white p-2 rounded-xl hover:animate-pulse">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  					<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
				</svg>

			</a>
		</div>
	</nav>
	<h4 class="ml-16 mb-8 font-bold">Bienvenido/a <?= $usuario->getNombre()?></h4>

	<table class="table-fixed w-4/5 m-auto border-separate border-spacing-10 border-2 border-black shadow-2xl rounded-lg bg-gray-800">
		<thead class="uppercase text-white">
			<tr>
				<th>Foto</th>
				<th>Nombre</th>
				<th>Telefono</th>
				<th></th>
			</tr>
		</thead>
		<tbody class="gap-y-4">
			<?php  
				$contacto = Contacto::getAllByUser($usuario->getIdUsu());
				foreach($contacto as $item):
			?>
			<tr class="border-2 border-black h-1/4">
				<td> <img class="w-20 border-4 border-green-500 rounded-full mx-auto" src="<?= $item->foto ?>"></td>
				<td> <p class="text-center text-white text-xl"><?= $item ?></p></td>
				<td><p class="text-center text-white text-xl"><?= $item->telefono ?></p></td>
				<td><a href="update.php?id=<?=$item->idCon?>" class="p-6 border-2 border-gray-800 rounded-lg bg-green-900 text-white font-semibold hover:bg-green-700">Editar</a>
					<a href="borrar.php?id=<?=$item->idCon?>" class="p-6 border-2 border-gray-800 rounded-lg bg-red-900 text-white font-semibol hover:bg-red-700">Borrar</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<footer class="bg-black text-center lg:text-left relative bottom-0 w-full mt-auto">
		<div class="text-white text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
			© 2022 Copyright:
			<a class="text-white" href="">Matías José García Fernández</a>
		</div>
	</footer>
</body>
</html>