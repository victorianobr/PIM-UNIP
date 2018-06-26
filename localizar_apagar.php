<?php
	include_once("conexao.php");
	header('Content-Type: text/html; charset=windows-1252');
	$id = $_GET['id_localizar'];
	
	$result_localizar = "DELETE FROM localizar WHERE id_localizar = '$id'";
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
					alert(\"Localização Apagado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=localizar.php'>
				<script type=\"text/javascript\">
					alert(\"Localização NÂO foi Apagado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>