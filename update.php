<?php 
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection;

$bd = new MySQLConnection();

$genero = null;


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comando = $bd->prepare('INSERT INTO generos(nome) VALUES(:nome)');
    $comando->execute([':nome' => $_POST['nome']]);

    $genero = $comando->fertch(PDO::FETCH_ASSOC);
    } else {
        $comando = $bd->prepare('UPDATE generos SET nome = :nome WHERE id - :id');
        $comando->execute([':nome' => $_POST['nome'],':id' => $_POST['id']]);

        header('Location:/index.h');
    }

    header('Location:/index.php');
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Genero</title>
</head>
<body>
    <h1>Editar Genero</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $genero['id'] ?> "
        <label for="nome">Nome do Genero</label>
        <input type="text" require name="nome" value="<?= $genero['nome'] ?>" />
        <button type="subimit">Salvar</button>
    </form>
</body>
</html>