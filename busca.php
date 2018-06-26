<?php

    $servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "victor_unipsls";
	

	//Criar a conexÃ£o
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

	header('Content-Type: text/html; charset=iso-8859-1');
	$campus = $_GET['campus'];
	$curso = $_GET['curso'];
	$periodo = $_GET['periodo'];
	$semestre = $_GET['semestre'];
	
	$result_busca = "    SELECT bloco, andar, sala, turma
	                     FROM localizar
	                     INNER JOIN campus ON (id_campus = campus_id_campus)
	                     INNER JOIN curso ON (id_curso = curso_id_curso)
                         INNER JOIN periodo ON (id_periodo = periodo_id_periodo)
                         INNER JOIN semestre ON (id_semestre = semestre_id_semestre)
                         INNER JOIN bloco ON (id_bloco = bloco_id_bloco)
                         INNER JOIN andar ON (id_andar = andar_id_andar)
                         INNER JOIN sala ON (id_sala = sala_id_sala)
						 WHERE campus.id_campus = '$campus'
						 AND curso.id_curso = '$curso'
						 AND periodo.id_periodo = '$periodo'
						 AND semestre.id_semestre = '$semestre'
						 ";
	$resultado_busca = mysqli_query($conn, $result_busca);
?>
<!DOCTYPE html>
<html>
    <head>
    <!--
        Personalize a pol?tica de seguran?a de conte?do na marca meta abaixo, conforme necess?rio. Adicione 'unsafe-inline' ao default-src para habilitar o JavaScript embutido.
 Para obter mais detalhes, consulte http://go.microsoft.com/fwlink/?LinkID=617521
    -->
        <meta http-equiv="Content-Security-Policy" content="default-src 'self' data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *">
        
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" href="css/appunipsls.min.css" />
	    <link rel="stylesheet" href="css/jquery.mobile.icons.min.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
	    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <title>UNIPSLS</title>
    </head>
    <body>
	<div data-role="page" data-theme="">
		<div data-role="header" data-position="">
        <div class="app">
            <img src="images/logo_micro.png">
			</br>
			</br>
			</br>
			<?php
			if(mysqli_affected_rows($conn) != 0){
			while($rows_busca = mysqli_fetch_assoc($resultado_busca)){
			echo "Seu Bloco é o: " . $rows_busca['bloco'] . "<br>"; 
		    echo "No Andar: " . $rows_busca['andar'] . "<br>"; 
		    echo "Na Sala: " . $rows_busca['sala'] . "<br>"; 
		    echo "Turma: " . $rows_busca['turma'] . "<br>";} 
			
		}else{
			echo "Nenhum resultado encontrado.
			";	
		}?>

        </div>
        <script type="text/javascript" src="cordova.js"></script>
        <script type="text/javascript" src="scripts/platformOverrides.js"></script>
        <script type="text/javascript" src="scripts/index.js"></script>
    </body>
</html>
