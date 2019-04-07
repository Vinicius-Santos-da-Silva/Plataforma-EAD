<html>
<head>
	<title>Meu site</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>assets/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>assets/css/template.css" />
	 <!-- Compiled and minified CSS 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    Compiled and minified JavaScript 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    -->
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="<?php echo BASE; ?>" class="navbar-brand">EAD - Student</a>
				
			</div>
			<ul class="nav navbar-nav navbar-right">
				<?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>
				<li><a href="<?php echo BASE; ?>anuncios">Meus Anúncios</a></li>
				<li><a href="<?php echo BASE; ?>login/sair">Sair</a></li>
				<?php else: ?>
					<li><a href="<?php echo BASE; ?>cadastrar">Cadastre-se</a></li>
					<li><a href="<?php echo BASE; ?>login">Login</a></li>
					<li><a href="<?php echo BASE; ?>login/logout">Sair</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>

	<?php $this->loadViewInTemplate($viewName, $viewData); ?>

	<script type="text/javascript" src="<?php echo BASE; ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE; ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE; ?>assets/js/script.js"></script>
</body>
</html>