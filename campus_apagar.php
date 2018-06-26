<?php
	include_once("conexao.php");
	
	$id = $_GET['id_campus'];
	
	$result_campus = "DELETE FROM campus WHERE id_campus = '$id'";
	$resultado_campus = mysqli_query($conn, $result_campus);	
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=campus.php'>
				<script type=\"text/javascript\">
					alert(\"Campus Apagado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=campus.php'>
				<script type=\"text/javascript\">
					alert(\"Campus não foi Apagado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>