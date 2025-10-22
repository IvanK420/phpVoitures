<?php
include('Voiture.php');

$voiture1 = new Voiture();
$voiture1->setMarque("Toyota");
$voiture1-> setModele("Yaris") ;
$voiture1->setVitesse(2);


$voiture2 = new Voiture();
$voiture2->setMarque("Lexus");
$voiture2->setModele("NX300h");
$voiture2->setVitesse(6);


$voitures=array($voiture1,
    $voiture2,
    new Voiture("BMW","Riche",1200)
);
for ($i=0;$i<3;$i++){
    $voitureCourante = $voitures[$i];
    $voitureCourante->avancer();
}
foreach ($voitures as $voiture){
    $voiture->setVitesse($voiture->getVitesse()+1);
    $voiture->avancer();
}