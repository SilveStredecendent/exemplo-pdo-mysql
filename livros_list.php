<?php
   require_once './vendor/autoload.php';
   
   use ExemploPDOMySQL\MySQLConnection;
   
   $bd = new MySQLConnection(); //PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');
   
   $comando = $bd->prepare('SELECT * FROM generos');
   $comando->execute();
   
   $livros = $comando->fetchAll(PDO:FETCH_ASSOC);
   
   $_title = 'Livros';
   
   ?>
   
<table class="table">
<tr>
   <th>id</th>
   <th>Título</th>
   <th>&nbsp;</th>
</tr>
<?php foreach($livros as $l): ?>
<?php include('./include/header.php') ?>
<a class="btn btn-primary" href='livros_insert.php>' >Novo Livro </a>
<table class="table">
   <tr>
      <td><?= $l['id'] ?></dt>
      <td><?= $l['Título'] ?></dt>
      <td>
      </td>
   </tr>
</table>

<?php include('./include/footer.php') ?>