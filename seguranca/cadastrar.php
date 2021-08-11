<?php 
	if ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		$email = escapeshellcmd($_POST['inputEmail']);

		var_dump($email);
	}
?>