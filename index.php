<?php
   require_once './vendor/autoload.php';
   
   use ExemploPDOMySQL\MySQLConnection; //PDO
   $bd = new MySQLConnection(); //PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');
   
   $bd = new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');
   
   $comando = $bd->prepare('SELECT * FROM generos');
   $comando->execute();
   $generos = $comando->fetchAll(PDO::FETCH_ASSOC);
   
   ?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <title>Biblioteca</title>
   </head>
   <body>
      <main class="container">
         <a class="btn btn-outline-warning" href="insert.php">Novo Genero</a>
         <table class="table">
            <tr>
               <th>id</th>
               <th>Nome</th>
               <th>&nbsp</th>
            </tr>
            <?php foreach ($generos as $g) : ?>
            <tr>
               <td>
                  <?= $g['id'] ?>
               </td>
               <td>
                  <?= $g['nome'] ?>
               </td>
               <td>
                  <a class="btn btn-outline-warning" href="update.php?id=<?= $g['id'] ?>">Editar</a>
                  <a class="btn btn-outline-danger" href="delete.php?id=<?= $g['id'] ?>">Excluir</a>
               </td>
            </tr>
            <?php endforeach ?>
         </table>
      </main>
   </body>
</html>