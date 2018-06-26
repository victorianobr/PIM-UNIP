<?php

    $servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "victor_unipsls";
	

	//Criar a conexÃ£o
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
?>
<?php

session_start();
?>
<?php

	header('Content-Type: text/html; charset=windows-1252');
	$result_localizar = "SELECT id_localizar, campus, curso, periodo, semestre, bloco, andar, sala, turma
	                     FROM localizar
	                     INNER JOIN campus ON (id_campus = campus_id_campus)
	                     INNER JOIN curso ON (id_curso = curso_id_curso)
                         INNER JOIN periodo ON (id_periodo = periodo_id_periodo)
                         INNER JOIN semestre ON (id_semestre = semestre_id_semestre)
                         INNER JOIN bloco ON (id_bloco = bloco_id_bloco)
                         INNER JOIN andar ON (id_andar = andar_id_andar)
                         INNER JOIN sala ON (id_sala = sala_id_sala)";
	$resultado_localizar = mysqli_query($conn, $result_localizar);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>UNIP SLS</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Header -->
	<header id="home">
		<!-- Background Image -->
		<div class="bg-img" style="background-color: #114d96;">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		<!-- Nav -->
		<nav id="nav" class="navbar nav-transparent">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="home.php">
							<img class="logo-alt" src="img/logo_micro.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="home.php">Home</a></li>
					<li class="has-dropdown"><a href="#">Cadastrar/Excluir</a>
						<ul class="dropdown">
							<li><a href="campus.php">Campus</a></li>
							<li><a href="curso.php">Curso</a></li>
							<li><a href="bloco.php">Blocos</a></li>
							<li><a href="andar.php">Andares</a></li>
							<li><a href="sala.php">Salas</a></li>
						</ul>
					</li>
					<li><a href="localizar.php">Cadastrar Localizações</a></li>
					
					<li><a href="logout.php">Sair</a><li>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
                </br></br></br></br>

					<div class="container theme-showcase" role="">
			<div class="">
              <H1><FONT FACE="Arial" SIZE="15" COLOR="white">Lista de Localizações</FONT></H1>
			</div>
			<div class="pull-right">
				<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Cadastrar</button>
			</div>
			<!-- Inicio Modal -->
			<div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="myModalLabel">Cadastrar Localização</h4>
						</div>
						<div class="modal-body">
							<form method="POST" action="localizar_cad.php" enctype="multipart/form-data">
								<div class="form-group">
									<label for="recipient-name" class="control-label">Digite a Localização abaixo:</label>
									</br>
									CAMPUS:
									<select class="form-control" name="campus1">
				                      <option>Selecione</option>
				                      <?php 
						               $resultado =mysqli_query($conn,"SELECT * FROM campus ORDER BY campus");
						               while($dados = mysqli_fetch_assoc($resultado)){
							          ?>
								       <option value="<?php echo $dados["id_campus"]; ?>"><?php echo $dados["campus"];?></option>
							            <?php
					                         	}
					                    ?>
			                     	</select>
									</br>
									CURSO:
									<select class="form-control" name="curso1">
				                      <option>Selecione</option>
				                      <?php 
						               $resultado =mysqli_query($conn,"SELECT * FROM curso ORDER BY curso");
						               while($dados = mysqli_fetch_assoc($resultado)){
							          ?>
								       <option value="<?php echo $dados["id_curso"]; ?>"><?php echo $dados["curso"];?></option>
							            <?php
					                         	}
					                    ?>
			                     	</select>
									</br>
									PERIODO:
									<select class="form-control" name="periodo1">
				                      <option>Selecione</option>
				                      <?php 
						               $resultado =mysqli_query($conn,"SELECT * FROM periodo");
						               while($dados = mysqli_fetch_assoc($resultado)){
							          ?>
								       <option value="<?php echo $dados["id_periodo"]; ?>"><?php echo $dados["periodo"];?></option>
							            <?php
					                         	}
					                    ?>
			                     	</select>
									</br>
									SEMESTRE:
									<select class="form-control" name="semestre1">
				                      <option>Selecione</option>
				                      <?php 
						               $resultado =mysqli_query($conn,"SELECT * FROM semestre");
						               while($dados = mysqli_fetch_assoc($resultado)){
							          ?>
								       <option value="<?php echo $dados["id_semestre"]; ?>"><?php echo $dados["semestre"];?></option>
							            <?php
					                         	}
					                    ?>
			                     	</select>
									</br>
									BLOCO:
									<select class="form-control" name="bloco1">
				                      <option>Selecione</option>
				                      <?php 
						               $resultado =mysqli_query($conn,"SELECT * FROM bloco ORDER BY bloco");
						               while($dados = mysqli_fetch_assoc($resultado)){
							          ?>
								       <option value="<?php echo $dados["id_bloco"]; ?>"><?php echo $dados["bloco"];?></option>
							            <?php
					                         	}
					                    ?>
			                     	</select>
									</br>
									ANDAR:
									<select class="form-control" name="andar1">
				                      <option>Selecione</option>
				                      <?php 
						               $resultado =mysqli_query($conn,"SELECT * FROM andar ORDER BY andar");
						               while($dados = mysqli_fetch_assoc($resultado)){
							          ?>
								       <option value="<?php echo $dados["id_andar"]; ?>"><?php echo $dados["andar"];?></option>
							            <?php
					                         	}
					                    ?>
			                     	</select>
									</br>
									SALA:
									<select class="form-control" name="sala1">
				                      <option>Selecione</option>
				                      <?php 
						               $resultado =mysqli_query($conn,"SELECT * FROM sala ORDER BY sala");
						               while($dados = mysqli_fetch_assoc($resultado)){
							          ?>
								       <option value="<?php echo $dados["id_sala"]; ?>"><?php echo $dados["sala"];?></option>
							            <?php
					                         	}
					                    ?>
			                     	</select>
									</br>
									DIGITE A TURMA:
									<input name="turma1" type="text" class="form-control">
								</div>
							
								<div class="modal-footer">
									<button type="submit" class="btn btn-success">Cadastrar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Fim Modal -->
			<div class="row">
				<div class="col-md-11">
					<table class="table table-bordered">
						<thead>
							<tr>
								
								<th>Campus</th>
								<th>Curso</th>
								<th>Periodo</th>
								<th>Semestre</th>
								<th>Bloco</th>
								<th>Andar</th>
								<th>Sala</th>
								<th>Turma</th>
							</tr>
						</thead>
						<tbody>
							<?php while($rows_localizar = mysqli_fetch_assoc($resultado_localizar)){ ?>
								<tr>
								
									<td><?php echo $rows_localizar['campus']; ?></td>
									<td><?php echo $rows_localizar['curso']; ?></td>
									<td><?php echo $rows_localizar['periodo']; ?></td>
									<td><?php echo $rows_localizar['semestre']; ?></td>
									<td><?php echo $rows_localizar['bloco']; ?></td>
									<td><?php echo $rows_localizar['andar']; ?></td>
									<td><?php echo $rows_localizar['sala']; ?></td>
									<td><?php echo $rows_localizar['turma']; ?></td>
									<td>
					                	<a href="localizar_apagar.php?id_localizar=<?php echo $rows_localizar['id_localizar']; ?>" onclick="return confirm('Tem certeza que deseja deletar este localização?')"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
									</td>
								</tr>
								<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $rows_localizar['id_localizar']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_localizar['sala']; ?></h4>
											</div>
											<div class="modal-body">
												<p><?php echo $rows_localizar['id_localizar']; ?></p>
												<p><?php echo $rows_localizar['campus']; ?></p>
									            <p><?php echo $rows_localizar['curso']; ?></p>
									            <p><?php echo $rows_localizar['periodo']; ?></p>
									            <p><?php echo $rows_localizar['semestre']; ?></p>
									            <p><?php echo $rows_localizar['bloco']; ?></p>
									            <p><?php echo $rows_localizar['andar']; ?></p>
									            <p><?php echo $rows_localizar['sala']; ?></p>
									            <p><?php echo $rows_localizar['turma']; ?></p>
												
											</div>
										</div>
									</div>
								</div>
								<!-- Fim Modal -->
							<?php } ?>
						</tbody>
					 </table>
				</div>
			</div>		
		</div>
		
		
	
		

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$('#exampleModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				var recipientnome = button.data('whatevernome')
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('ID do Campus: ' + recipient)
				modal.find('#id').val(recipient)
				modal.find('#recipient-name').val(recipientnome)
			})
		</script>

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</body>

</html>
