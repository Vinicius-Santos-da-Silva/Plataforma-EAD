<h1>Seus Cursos</h1>
<?php   foreach($cursos as $curso): ?>
	<a href="<?php  echo BASE; ?>cursos/entrar/<?php echo $curso['cd_curso']; ?> ">

		<div class="cursoitem">
			<img src="<?php echo BASE_STATIC;?>assets/images/cursos/<?php echo $curso['imagem'] ?>" width="298" height="290"></br></br>

			<strong><?php echo $curso['nome'];  ?></strong></br></br>

			<?php echo $curso['descricao'];  ?>		
		</div>
	</a>

<?php endforeach;  ?>
