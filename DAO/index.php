<?php
	require_once("config.php");

	// Objeto de interação ao banco MySQL
	$sql = new Sql();

	$userDados = $sql->select("SELECT * FROM tb_usuarios");

	echo json_encode($userDados);
?>