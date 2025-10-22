<?php
include('Voiture.php');

$voiture1 = new Voiture();
$voiture1->setMarque("Toyota");
$voiture1-> setModele("Yaris") ;
$voiture1->setVitesse(2);

$voiture1 ->avancer();

$voiture2 = new Voiture();
$voiture2->setMarque("Lexus");
$voiture2->setModele("NX300h");
$voiture2->setVitesse(6);

$voiture2 ->avancer();
