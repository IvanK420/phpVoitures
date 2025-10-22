<?php
include('Voiture.php');
session_start();
//$voiture=array();
if(isset($_GET['marque'])){
    $marque =  $_GET['marque'];
    $modele = $_GET['modele'];
    $vitesse = $_GET['vitesse'];
    $voiture1 = new Voiture($marque,$modele,$vitesse);

    $_SESSION['voiture'] [] = $voiture1 ;
}
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
<form method="get" action="formulaire.php" class="p-5">
    <div class="mb-3">
        <label for="marque" class="form-label">Marque</label>
        <input type="text" class="form-control" id="marque" name="marque">
    </div>
    <div class="mb-3">
        <label for="modele" class="form-label" >Modèle</label>
        <input type="text" class="form-control" name="modele" id="modele">
    </div>
    <div class="mb-3">
        <label for="vitesse" class="form-label">Vitesse</label>
        <input type="number" class="form-control" name="vitesse" id="vitesse">
    </div>
    <button type="submit" class="btn btn-primary">Créer ma voiture</button>
    <div class="alert alert-warning mt-4" role="alert">
        <?php echo isset($voiture1) ? $voiture1->afficher() :null ;?>
    </div>
    <div>
        <select class="form-select" aria-label="Default select example">
            <option selected>La liste des voitures</option>
            <?php foreach($_SESSION['voiture'] as $voiture){?>
                <option value="<?php echo $voiture->afficher(); ?>"><?php echo $voiture->afficher(); ?></option>
            <?php }?>
        </select>
    </div>
</form>

</body>
</html>
