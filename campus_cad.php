<?php
	include_once("conexao.php");
	$campus = mysqli_real_escape_string($conn, $_POST['campus']);
	
	$result_campus = "INSERT INTO campus (campus) VALUES ('$campus')";	
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
					alert(\"Campus Cadastrado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=campus.php'>
				<script type=\"text/javascript\">
					alert(\"Campus não foi cadastrado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>