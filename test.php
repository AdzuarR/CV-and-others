<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8"/>
    <title></title>
  </head>
  <body>
    <h1>plop</h1>
    <?php
      require("connect.php");

      $dsn="mysql:dbname=".BASE.";host=".SERVER;

      try{
      $connexion=new PDO($dsn,USER,PASSWD);
    }
    catch(PDOException $e){
      printf("Échec de la connexion : %s\n", $e->getMessage());
      exit();
    }
$sql="SELECT * from espece natural join famille";
if(!$connexion->query($sql)) echo "Pb d'accès au CARNET";
else{

    echo "<table><tr><th>Genre</th><th>Espèce</th><th>Famille</th><th>Illustration</th></tr>";
     foreach ($connexion->query($sql) as $row)
     {
       echo "<tr><td>".$row['genre']."</td><td>".$row['espece']."</td><td>".$row['famille']."</td><td><img height = 150px src='".$row['lien_photo']."'/></td><tr>";
     }
     echo "</table>";
     echo $sql;
}

    ?>
    <?php
    echo "<h1>Liste déroulante des tables de la base de donnée</h1>";
    $sql="Show tables";
    if (!$connexion->query($sql)) echo "Pb requete show tables";
    else {
      echo '<select name = "plop">';
      foreach ($connexion-> query($sql) as $line){
        $nom = $line['Tables_in_bddgeneric1'];
        echo "<option value = ".$nom.">".$nom."</option>";
      }
      echo "</select>";
    }

    ?>

  </body>
</html>
