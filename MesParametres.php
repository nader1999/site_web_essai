<?php   // Fichier: MesParameters.php
// Valeurs par défaut des variables d'entrées
$pg=10; $id=NULL; $email=NULL; $mdp=NULL; $statut=NULL; $volet=NULL;

//Récupère les données par la méthode GET
if(isset($_GET['pg']))     $pg    =$_GET['pg'];
if(isset($_GET['id']))     $id    =$_GET['id'];
if(isset($_GET['email']))  $email =$_GET['email'];    
if(isset($_GET['mdp']))    $mdp   =$_GET['mdp'];    
if(isset($_GET['statut'])) $statut=$_GET['statut'];
if(isset($_GET['volet'])) $volet=$_GET['volet'];

    

// Ajuste l'affichage du bouton radio
$P=NULL; $M=NULL; $C=NULL; $D=NULL; $A=NULL;
if($statut=="P") $P="checked";
if($statut=="M") $M="checked";
if($statut=="C") $C="checked";
if($statut=="D") $D="checked";
if($statut=="A") $A="checked";

// Ajuste l'affichage du bouton radio
$EC=NULL; $EL=NULL; $R=NULL; $S1=NULL; $S2=NULL; $S3=NULL;
if($volet=="EC") $EC="checked";
if($volet=="EL") $EL="checked";
if($volet=="R") $R="checked";
if($volet=="S1") $S1="checked";
if($volet=="S2") $S2="checked";
if($volet=="S3") $S3="checked";
?>
