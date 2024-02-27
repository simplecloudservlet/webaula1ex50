
<!-- TODO1: De acordo com o site https://getbootstrap.com, eh necessario inserir o cabecalho como segue no <head> -->
<!-- TODO2: Tambem eh necessario inserir o <script> no rodape da pagina-->

<!DOCTYPE html>
<html lang="bzs">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Projeto</title>

	<!-- TODO1 -->
	<!-- Folha de estilos do Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


	<link rel="shortcut icon" href="favicon/favicon.ico" /> <!-- favicon.ico-->
	<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	<!--<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css" />-->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" /> <!-- Tambem foi necessario copiar o conteudo da pasta 'fonts'-->

	<!-- A ordem aqui eh importante: primeiro deve vir o 'jquery.js', depois scripts.js, porque este último utiliza 'jquery.js'-->
	<script src="js/jquery-3.7.1.js"></script>
	<script src="js/decimal.js"></script>
	<script src="js/scripts.js"></script>
	
	

</head>

<body>

	
	<div class="container">
		<!-- Formulario -->
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<div class="navbar-header">
					<a class="navbar-brand">Cidades</a>
				</div>
				<ul class="nav navbar-form pull-right">
					<input id="cidade" type="text" placeholder="Pesquisar...">
					<button id="btn-submit" class="btn-default">
					<span class="fa fa-search"></span> 
					
					<button id="btn-ocultar" class="btn-default">
					<span class="fa fa-minus"></span>
					
					<button id="btn-limpar" class="btn-default">
					<span class="fa fa-trash"></span>

					<button id="btn-inserir" class="btn-default">
					<span class="fa fa-plus"></span>

				</ul>
			</div>
		</div>

		<!-- Secao que sera atualizada com a resposta do servidor -->
		<!-- com a lista de cidades pesquisadas -->
		<div id="resultado"></div>
	</div>

	<div>
		<?php
		require('db_mysql.php');
		?>
	</div>


	

	<!-- TODO2: Esse trecho deve aparecer antes do </body> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
		crossorigin="anonymous"></script>
</body>

</html>