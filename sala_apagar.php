<?php
	include_once("conexao.php");
	
	$id = $_GET['id_sala'];
	
	$result_sala = "DELETE FROM sala WHERE id_sala = '$id'";
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
					alert(\"Sala Apagado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=sala.php'>
				<script type=\"text/javascript\">
					alert(\"Sala não foi Apagado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>