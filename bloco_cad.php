<?php
	include_once("conexao.php");
	$bloco = mysqli_real_escape_string($conn, $_POST['bloco']);
	
	$result_bloco = "INSERT INTO bloco (bloco) VALUES ('$bloco')";	
	$resultado_bloco = mysqli_query($conn, $result_bloco);	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=bloco.php'>
				<script type=\"text/javascript\">
					alert(\"Bloco Cadastrado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=bloco.php'>
				<script type=\"text/javascript\">
					alert(\"Bloco não foi cadastrado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>