<?php #print_r($viewData['aula']);PHP_EOL; ?>

<div class="cursoinfo">

	<img src="<?php echo $curso->getImagem();  ?>" border="0" height="60">

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

<div class="curso_right container">
	<h3> Video - <?php echo $viewData['aula']['nome']; ?></h3>
	
	<iframe width="100%" height="80%px" src="<?php echo $viewData['aula']['url'] ?>" frameborder="0" allowfullscreen></iframe>
	<?php if($viewData['aula']['assistido']): ?>
		Esta aula já foi assitida
	<?php else: ?>
		<button type='button' onclick="marcarAssistido(this)" data-id="<?php echo $viewData['aula']['id'] ?>">Marca como Assistido</button>
	<?php endif; ?>
	<p><?php echo $viewData['aula']['descricao']; ?></p>
	<h5>Duvidas? Envia sua pergunta!</h5>
	<form method="POST" class="form-duvida">
		<textarea name="duvida"></textarea><br/><br/>

		<input type="submit" class="enviar_duvida" value="Enviar">
	</form>

	<div class="duvidas">
		<?php foreach ($viewData['aula']['duvidas'] as $duvida): ?>
			<h3><?php echo $viewData['info']['nome']; ?></h3>
			<h5>Duvida:</h5>
			<p><?php echo $duvida['duvida'];  ?></p>
		<?php endforeach ?>

	</div>

	
</div>



