<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="visao/ranking.css" />
    <title>Ranking</title>
  </head>
  <body>
    <h1 class="rank">Ranking</h1>
    <div class="tabela"></div>

    <table class="data">
      <?php if (is_null($data) || count($data) === 0) { ?>
      <tr>
        <th>Posição0</th>
        <th>Nome</th>
        <th>Pontos</th>
      </tr>
      <?php } else { ?>
      
      <tr>
        <th>Posição1</th>
        <th>Nome</th>
        <th>Pontos</th>
      </tr>
      <?php 
	$i = 0;
      	foreach ($data as $user) { ?>
           <?php $i++ ?>
      	   <tr>
        	<td><?= $i ?></td>
        	<td><?= $user->nick ?></td>
        	<td><?= $user->pontos ?></td>
          </tr>
        <?php } ?>
     <?php } ?>
    </table>
  </body>
</html>
