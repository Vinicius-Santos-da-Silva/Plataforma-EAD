<?php 
//print_r(json_encode($cursos));PHP_EOL;

//$cursos = json_encode($cursos);



?>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Imagem</th>
      <th scope="col">Nome</th>
      <th scope="col">Qt. Alunos</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php foreach ($cursos as $curso) : ?>

            <tr>
                <td><img src="<?php  echo $curso['imagem']?>"  width="90" height="90"/></td>
                <td><?php  echo $curso['nome']?></td>
                <td><?php  echo $curso['qtalunos'] ?></td>
                <td>?</td>
            </tr>
        <?php endforeach;?>
    </tr>
    
  </tbody>
</table>