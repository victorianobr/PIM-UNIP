<?php
	include_once("conexao.php");
	$sala = mysqli_real_escape_string($conn, $_POST['sala']);
	
	$result_sala = "INSERT INTO sala (sala) VALUES ('$sala')";	
	$resultado_sala = mysqli_query($conn, $result_sala);	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=sala.php'>
				<script type=\"text/javascript\">
					alert(\"Sala Cadastrado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=sala.php'>
				<script type=\"text/javascript\">
					alert(\"Sala não foi cadastrado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>