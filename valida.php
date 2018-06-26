<?php
session_start();
include_once("conexao.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		$result_usuario = "SELECT * FROM usuarios WHERE usuario='$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['usuario'] = $row_usuario['usuario'];
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=home.php'>
				<script type=\"text/javascript\">
					alert(\"Conectado com Sucesso.\");
				</script>
			    ";	

			}else{
				echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.html'>
				<script type=\"text/javascript\">
					alert(\"Login e senha incorretos.\");
				</script>
			    ";	
			}
		}
	}else{
		echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.html'>
				<script type=\"text/javascript\">
					alert(\"Login e senha incorretos.\");
				</script>
			    ";	
	}
}else{
	echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.html'>
				<script type=\"text/javascript\">
					alert(\"Pagina não encontrada.\");
				</script>
			    ";	
}
?>
