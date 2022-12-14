<?php
   require_once './vendor/autoload.php';
   
   
   use  ExemploPDOMySQL\MySQLConnection;
   
   $bd = new MySQLConnection();
   
   $genero = null;
   
   if($_SERVER['REQUEST_METHOD'] == 'GET') {
       $comando = $bd->prepare('SELECT * FROM generos WHERE id = :id');
       $comando->execute([':id' => $_GET['id']]);
   
       $genero = $comando->fetch(PDO::FETCH_ASSOC);
   
   } else {
       $comando = $bd->prepare('DELETE FROM generos WHERE id = :id');
       $comando->execute([':id' => $_GET['id']]);
   
   }
   
   ?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <title>Remover Genero</title>
   </head>
   <body>
      <main class="container">
         <h1>Remover Genero</h1>
         <p>Tem certeza que deseja remover esse genero
            <?=$genero['nome'] ?>
         </p>
         <form action="delete.php" method="post">
            <input type="hidden" name="id" value="<?=$genero['id'] ?>" />
            <a class="btn btn-outline-warning" href="index.php">Voltar</a>
            <button class="btn btn-outline-danger" type="submit">Excluir</button>
         </form>
      </main>
   </body>
</html>