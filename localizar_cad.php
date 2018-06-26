<?php
	include_once("conexao.php");
	header('Content-Type: text/html; charset=windows-1252');
	$campus1 		= mysqli_real_escape_string($conn, $_POST["campus1"]);
	$curso1 		= mysqli_real_escape_string($conn, $_POST["curso1"]);
	$periodo1 		= mysqli_real_escape_string($conn, $_POST["periodo1"]);
	$semestre1 		= mysqli_real_escape_string($conn, $_POST["semestre1"]);
	$bloco1 		= mysqli_real_escape_string($conn, $_POST["bloco1"]);
	$andar1 		= mysqli_real_escape_string($conn, $_POST["andar1"]);
	$sala1 		    = mysqli_real_escape_string($conn, $_POST["sala1"]);
	$turma1 		= mysqli_real_escape_string($conn, $_POST["turma1"]);
	
	$result_localizar = "INSERT INTO localizar (
	campus_id_campus, 			
	curso_id_curso,
	periodo_id_periodo,
	semestre_id_semestre, 			
	bloco_id_bloco, 			
	andar_id_andar,	
	sala_id_sala,
	turma)
	VALUES(
	'$campus1',
	'$curso1 ',
	'$periodo1',
	'$semestre1',
	'$bloco1',
	'$andar1',
	'$sala1',
	'$turma1')";
	$resultado_localizar = mysqli_query($conn, $result_localizar);	
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=localizar.php'>
				<script type=\"text/javascript\">
					alert(\"Localização Cadastrado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=localizar.php'>
				<script type=\"text/javascript\">
					alert(\"Localização NÃO foi cadastrado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>