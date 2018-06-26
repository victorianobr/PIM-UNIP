<?php
	include_once("conexao.php");
	
	$id = $_GET['id_andar'];
	
	$result_andar = "DELETE FROM andar WHERE id_andar = '$id'";
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
					alert(\"Andar Apagado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=andars.php'>
				<script type=\"text/javascript\">
					alert(\"Andar não foi Apagado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>