<?php
	require_once("config.php");

	# Carrega um usuario
	/*$root = new Usuario();
	$root->loadByID(1);
	echo $root;*/

	# Carrega lista de usuarios
	/*$lista = Usuario::getList();
	echo json_encode($lista);*/

	# Carrega uma lista de usuários buscando pelo login
	/*$search = Usuario::getSearch("ar");
	echo json_encode($search);*/

	# Carrega um usuário usando login e senha
	$user = new Usuario();
	$user->login("carlos","passagem@1386"); 

	echo $user;
?>