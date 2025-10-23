<?php
require_once 'Client.php';
$user="root";
$password="";
$dbname="expernetcda9";
$host="localhost";

$db=new PDO("mysql:host=$host;dbname=$dbname",$user,$password);

$requete="";

//requete préparé pour la sécurité
if(isset($_GET['search'])){
    $requete=$db->prepare("select * from client 
         where nom like ? or 
         prenom like ? ");
    $valeur = "%".$_GET['search']."%";
    $requete->bindParam(1,$valeur);
    $requete->bindParam(2,$valeur);
    $requete->execute();
}
else $requete=$db->query("select * from client");

$requete->setFetchMode(PDO::FETCH_CLASS, "Client");
$clients=$requete->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de voiture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form action="bdd.php" method="get" class="mb-5">
        <div class="mb-3">
            <label for="search">Rechercher</label>
            <input type="text" name="search" class="form-control" id="search">
        </div>
        <input type="submit" value="Search" class="btn btn-primary">
    </form>

    <Table id="myTable" class="table table-striped table-bordered">
        <thead>
        <th>ID</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Titre</th>
        <th>Ville</th>
        </thead>
        <tbody>

        <?php
        foreach ($clients as $client) {
            echo "<tr>
        <td>".$client->getId()."</td>
        <td>".$client->getNom()."</td>
        <td>".$client->getPrenom()."</td>
        <td>".$client->getTitre()."</td>
        <td>".$client->getVille()."</td>
        </tr>";

        }
        ?>

        </tbody>
    </Table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
