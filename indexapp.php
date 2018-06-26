<?php
    header('Content-Type: text/html; charset=windows-1252');
    $servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "victor_unipsls";
	

	//Criar a conexÃ£o
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
?>

<!DOCTYPE html>
<html>
    <head>
	<style>
    .select-estiloso { /* <div> */
       width: 240px;
       height: 34px;
       overflow: hidden;
       background: url(nova_setinha.jpg) no-repeat right #00243c; /* novo ícone para o <select> */
       border: 1px solid #fff000;
    }   

    .select-estiloso select { /* <select> */
       background: transparent; /* importante para exibir o novo ícone */
       width: 268px;
       padding: 5px;
       font-size: 16px;
	   color: #fff;
       line-height: 1;
       border: 0;
       border-radius: 0;
       height: 34px;
       -webkit-appearance: none;
    }      
</style>
        <meta http-equiv="Content-Security-Policy" content="default-src 'self' data: gap: https://ssl.gstatic.com 'unsafe-eval'; style-src 'self' 'unsafe-inline'; media-src *">
        
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="format-detection" content="telephone=no">
        <meta name="msapplication-tap-highlight" content="no">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
        <link rel="stylesheet" type="text/css" href="css/index.css">
		<link rel="stylesheet" href="css/appunipsls.min.css" />
	    <link rel="stylesheet" href="css/jquery.mobile.icons.min.css" />
	    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
	    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <title>UNIP SLS</title>
		
    </head>
    <body topmargin="0">
	<div data-role="page" data-theme="">
		<div data-role="header" data-position="">
        <div class="app">
   <img src="images/logo_micro.png">
</br>
<form method="GET" action="busca.php" enctype="multipart/form-data">
    </br></br>
								  CAMPUS:
								  <center><div class="select-estiloso">
									<select class="form-control" name="campus">
				                      <option>Selecione</option>
				                      <?php 
						               $resultado =mysqli_query($conn,"SELECT * FROM campus ORDER BY campus");
						               while($dados = mysqli_fetch_assoc($resultado)){
							          ?>
								       <option value="<?php echo $dados["id_campus"]; ?>"><?php echo $dados["campus"];?></option>
							            <?php
					                         	}
					                    ?>
			                     	</select></div></center>
    </br>
									CURSO:
									<center><div class="select-estiloso">
									<select class="form-control" name="curso">
				                      <option>Selecione</option>
				                      <?php 
						               $resultado =mysqli_query($conn,"SELECT * FROM curso ORDER BY curso");
						               while($dados = mysqli_fetch_assoc($resultado)){
							          ?>
								       <option value="<?php echo $dados["id_curso"]; ?>"><?php echo $dados["curso"];?></option>
							            <?php
					                         	}
					                    ?>
			                     	</select></div></center>
    </br>
									PERIODO:
									<center><div class="select-estiloso">
									<select class="form-control" name="periodo">
				                      <option>Selecione</option>
				                      <?php 
						               $resultado =mysqli_query($conn,"SELECT * FROM periodo");
						               while($dados = mysqli_fetch_assoc($resultado)){
							          ?>
								       <option value="<?php echo $dados["id_periodo"]; ?>"><?php echo $dados["periodo"];?></option>
							            <?php
					                         	}
					                    ?>
			                     	</select></div></center>
    </br>
									SEMESTRE:
									<center><div class="select-estiloso">
									<select class="form-control" name="semestre">
				                      <option>Selecione</option>
				                      <?php 
						               $resultado =mysqli_query($conn,"SELECT * FROM semestre");
						               while($dados = mysqli_fetch_assoc($resultado)){
							          ?>
								       <option value="<?php echo $dados["id_semestre"]; ?>"><?php echo $dados["semestre"];?></option>
							            <?php
					                         	}
					                    ?>
			                     	</select></div></center>
    </br>
</div>

</br></br></br></br></br><center><button type="submit" class="btn btn-primary btn-block btn-large">Pesquisar</button></center>
        </div>
        <script type="text/javascript" src="cordova.js"></script>
        <script type="text/javascript" src="scripts/platformOverrides.js"></script>
        <script type="text/javascript" src="scripts/index.js"></script>
    </body>
</html>
