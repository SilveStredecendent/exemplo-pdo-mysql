<?php
require_once './vendor/autoload.php';

use  ExemploPDOMySQL\MySQLConnection;

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
    <title>Remover Genero</title>
</head>
<body>
    <h1>Remover Genero</h1>
    <p>Tem certeza que deseja remover o genero "<?=$genero['nome'] ?>"</p>
    <form action="delete.php" method="post">
        <input type="hidden" name="id" value="<?=$genero['id'] ?>" />
        <button type="submit">Excluir</button>
    </form>
</body>
</html>
