<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gestion des </title>
    <link rel="stylesheet" href="admin.css" media="screen" title="no title">

  </head>
  <body>
    <?php include 'headeradmin.php'; ?>
    <div class="articleChange">
    <?php
    try {
      include('../connectsql/pdoconnect.php');
      if(isset($_SESSION['status']))  {
        if($_SESSION['status']  == 'Administrateur'){
      $reponse = $pdo->query('SELECT id, title, DATE_FORMAT(timedate, \'%d/%m/%Y  %H:%i\') AS timedate, SUBSTRING(content,1,200) AS content, SUBSTRING(title,1,50) AS title FROM posts ORDER BY timedate DESC');
      echo "<table><tr><td>Titre</td><td>Aperçu du contenu</td><td>Date</td><td></td>";
      while($donnees = $reponse->fetch())
        {
          echo "<tr><td>".$donnees['title']."</br></td>";
          echo "<td>".$donnees['content']."</td>";
          echo "<td>".$donnees['timedate']."</td>";
            echo "<td><a href='article.edit.php?id=".$donnees['id']."'>Editer</a></td>";
            echo "<td><a href='article.delete.php?id=".$donnees['id']."'>x</a></td><tr>";
?>
<?php
}
}
}
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>
</div>
  </body>
</html>
