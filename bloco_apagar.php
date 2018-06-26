<?php
	include_once("conexao.php");
	
	$id = $_GET['id_bloco'];
	
	$result_bloco = "DELETE FROM bloco WHERE id_bloco = '$id'";
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
					alert(\"Bloco Apagado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=bloco.php'>
				<script type=\"text/javascript\">
					alert(\"Bloco não foi Apagado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>