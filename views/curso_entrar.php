
<div class="cursoinfo">

	<img src="<?php echo BASE;  ?>assets/images/cursos/<?php echo $curso->getImagem();  ?>" border="0" height="60">

	<h3> <?php echo $curso->getNome(); ?> </h3>
	<?php echo $curso->getDescricao(); ?>
	

</div>

<div class="curso_left">
	<?php foreach ($modulos as $modulo): ?>

		<div class="modulos">
			<p><?php echo utf8_encode($modulo['nome']); ?></p>
		</div>

		<?php foreach ($modulo['aulas'] as $aula): ?>
			<a href="<?php echo BASE; ?>cursos/aula/<?php echo $aula['id']; ?>">	
				<div class="aula">
					<p><?php echo utf8_encode($aula['nome']); ?></p>
				</div>
			</a>

		<?php endforeach ?>

	<?php endforeach ?>
</div>

<div class="curso_right">
	
</div>