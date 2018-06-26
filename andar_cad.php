<?php
	include_once("conexao.php");
	$andar = mysqli_real_escape_string($conn, $_POST['andar']);
	
	$result_andar = "INSERT INTO andar (andar) VALUES ('$andar')";	
	$resultado_andar = mysqli_query($conn, $result_andar);	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=andar.php'>
				<script type=\"text/javascript\">
					alert(\"Andar Cadastrado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=andar.php'>
				<script type=\"text/javascript\">
					alert(\"Andar não foi cadastrado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>