<?php
   require_once './vendor/autoload.php';
   
   use  ExemploPDOMySQL\MySQLConnection;
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $bd = new MySQLConnection();
   
       $comando = $bd->prepare('INSERT INTO generos(nome) VALUES (:nome)');
       $comando->execute([':nome' => $_POST['nome']]);
   
       header('Location:/index.php');
   }
   
   ?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <title>Novo Genero</title>
   </head>
   <body>
      <main class="container">
         <h1>Novo Genero</h1>
         <form action="insert.php" method="post">
            <div class="form-group">
               <label for="nome">Nome do Genero</label>
               <input class="form-control" type="text" required name="nome" />
            </div>
            <br>
            <a class="btn btn-outline-danger">Voltar</a>
            <button class="btn btn-outline-warning" type="submit">Salvar</button>
         </form>
      </main>
   </body>
</html>