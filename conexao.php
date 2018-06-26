<?php

	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "victor_unipsls";
	

	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
?>
<?php
	header('Content-Type: text/html; charset=windows-1252');
	$result_campus = "SELECT * FROM campus";
	$resultado_campus2 = mysqli_query($conn, $result_campus);
?>