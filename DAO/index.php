<?php
	require_once("config.php");

	$root = new Usuario();

	$root->loadByID(1);

	echo $root;
?>