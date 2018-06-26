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
	$result_andar = "SELECT * FROM andar";
	$resultado_andar = mysqli_query($conn, $result_andar);
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
              <H1><FONT FACE="Arial" SIZE="15" COLOR="white">Lista de Andares</FONT></H1>
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
							<h4 class="modal-title text-center" id="myModalLabel">Cadastrar Andar</h4>
						</div>
						<div class="modal-body">
							<form method="POST" action="andar_cad.php" enctype="multipart/form-data">
								<div class="form-group">
									<label for="recipient-name" class="control-label">Digite o nome do Andar:</label>
									<input name="andar" type="text" class="form-control">
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
				<div class="col-md-10">
					<table class="table table-hover">
						<thead>
							<tr>
								
								<th>Nome dos Andares Cadastrados</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							<?php while($rows_andar = mysqli_fetch_assoc($resultado_andar)){ ?>
								<tr>
								
									<td><?php echo $rows_andar['andar']; ?></td>
									<td>
					                	<a href="andar_apagar.php?id_andar=<?php echo $rows_andar['id_andar']; ?>" onclick="return confirm('Tem certeza que deseja deletar este ANDAR?')"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
									</td>
								</tr>
								<!-- Inicio Modal -->
								<div class="modal fade" id="myModal<?php echo $rows_andar['id_andar']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_andar['andar']; ?></h4>
											</div>
											<div class="modal-body">
												<p><?php echo $rows_andar['id_andar']; ?></p>
												<p><?php echo $rows_andar['andar']; ?></p>
												
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
