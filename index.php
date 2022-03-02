<?PHP                            // Fichier: index.php
include("MaBD.php");             // Accès à la BD PROF
include("MesParametres.php");    // Paramètres
include("MesDeclarations.php");  // Déclarations
include("MesFonctions.php");  	 // Fonctions

$linkid = connect();             // Établir la connexion (USE PROF;)
echo $ouverture;                 // Début du XHTML
if    ($pg==10) echo $accueil;   // Accueil
elseif($pg==20) choix_usager();  // Sélection de l'usager
elseif($pg==21) affiche_choix(); // Affiche la sélection $id
elseif($pg==30) connexion_usagers(null);
elseif($pg==31) valide_connexion();
elseif($pg==32) affiche_activites(NULL);
elseif($pg==33) enregistrement_activites();
elseif($pg==40) nouvel_usager(NULL); // Formulaire du nouvel usager
elseif($pg==41) valide_usager(); // Validation du nouvel usager
elseif($pg==50) echo $regle123;  // Règles de fonctionnement
echo $fermeture;                 // Fin du XHTML
?>
