<?php   // Fichier: MesDeclarations.php
$ouverture='<?xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
  <title>PROF</title>
  <link href="mon_style_E1.css" rel="stylesheet" type="text/css" /> 
</head>
<body>
  <div class="entete">
    <p id="logo"><img src="logoBanner.png" alt="Logo de Polytechnique" /></p>
    <h1>Déclaration Volontaire des Activités Professorales (PROF)</h1>
    <h2>Travail synthèse du MEC1315 Ti en ingénierie</h2>
    <div id="menu-top">
      <a href="index.php?pg=10" title="Accueil du site">Accueil</a>
      <a href="index.php?pg=20" title="Afficher les activités disponibilités">Activités</a>
      <a href="index.php?pg=30" title="Effectuer une déclaration">Déclaration</a>
      <a href="index.php?pg=40" title="Créer un compte usager">S\'enregister</a>
      <a href="index.php?pg=50" title="R&egrave;gles de déclaration">Règlements</a>	  
    </div>
  <br />
  </div>
  ';

$accueil='<br /><h1>ACCUEIL</h1><br />
  <h2>Bienvenue sur le site Web PROF</h2>
  <p>Ce site Web permet aux professeurs du département de génie mécanique de déclarer volontairement leurs activités professorales : enseignement, recherche et service à la collectivité (PROF).</p><br />
  <h2>Identification requise</h2>
  <p>Toutes les personnes (professeur, maitre d\'enseignement, chargé de cours ou adjointe) doivent s\'identifier avec leur courriel Polytechnique, ainsi que leur mot de passe, afin de déclarer ou modifier une déclaration.</p>';
 

$fermeture=' </body>
</html>';

$regle123='<br /><h1>RÈGLEMENTS</h1><br />
  <p>Cette section présente les règlements de fonctionnement du site de déclaration volontaire des activités professorales.</p><br />
  <h2>Règle 1</h2>
  <p>Seule les usagers inscrits sur le site WEB avec une adresse @polymtl.ca peuvent effectuer des transactions.</p>
  <p>Si vous ne detenez pas d-adresse @polymtl.ca, <a href="https://www.polymtl.ca/si/assistance-et-informations"
  title="lien vers le site de polytechnique"><em>cliquez ici</em></a>
  pour plus d-informations.</p><br />
  <h2>Règle 2</h2>
  <br> </br> 
  <div style = "background-color:gray;">
  <h2>Réglement du plan de cours :</h2>
  <div style = "position:relative; left:40px; top:0px;">
  <br> </br> 
<ol>
	<h3><li> Enseignants/ Assistants,</h3>
		<ul>
			<li>Nom,</li>
			<li>Email,</li>
			<li>Bureau</li>
			<li>Groupe enseigné </li>
		</ul>
	</li>
	<br> </br> 
<h3><li> Plages horaires</h3>
	<ul>
		<li>Groupe,
			<ol>
				<h5><li>heures/jour</li></h5>
				<h5><li>lieu </li></h5>
			</ol>
		</li>
	</ul> 
</li>
<br> </br> 
	<h3><li>Description du cours,</li></h3>
	<br> </br> 
	<h3><li>Critère BCAPG pour chaque cours,</li></h3>
<br> </br> 

<table>
	<caption><h2> Tableau 1 - Critère BCAPG pour chaque cours </h2></caption>
	<tr> <!-- ligne 1 -->
		<th> Connaissances </th> <!-- Cellule-titre - colonne 1-->
		<th> Analyse </th> <!-- Cellule-titre - colonne 2-->
		<th> Investigation </th> <!-- Cellule-titre - colonne 3-->
		<th> Conception </th> <!-- Cellule-titre - colonne 4-->
		<th> Outils </th> <!-- Cellule-titre - colonne 5-->
		<th> Travail en équipe </th> <!-- Cellule-titre - colonne 5-->
	</tr>
	<tr> <!-- ligne 2 -->
		<td> </td> <!-- Cellule de données - colonne 1-->
		<td> </td> <!-- Cellule de données - colonne 2-->
		<td> </td> <!-- Cellule de données - colonne 3-->
		<td> </td> <!-- Cellule de données - colonne 4-->
		<td> </td> <!-- Cellule de données - colonne 5-->
		<td> </td> <!-- Cellule de données - colonne 6-->
	</tr>
	<tr> <!-- ligne 3 -->
		<th> Communication </th>
		<th> Professionnalisme </th>
		<th> Imapact</th>
		<th> Déantologie</th>
		<th> Gestion</th>
		<th> Apprentissage continu</th>
	</tr>
	<tr> <!-- ligne 4 -->
		<td> </td>
		<td> </td>
		<td> </td>
		<td> </td>
		<td> </td>
		<td> </td>
	</tr>
</table>

<style type="text/css">   
<!--  Mon code CSS  -->  
table
{
    border-collapse: collapse;
}
td, th 
{
    border: 1px solid black;
	Vertical-align: center;
	text-align: center;
	height: 30px ;
	padding: 10px;
	empty-cells: show;
}
</style>  
<br> </br> 
<p> <h2> Légende </p> </h2> 



<p> <h4> * IN: introduction ; CA: contrôle des acquis ; AP: Appliqué </h4> </p>
<br></br>
<caption><h2> Figure 1 - Niveau atteint pour chaque critère </h2></caption>
<img src="Niveau-BCAPG.png">

<p> <h4> ** Les codes de couleur seront attribués une fois le cours finalisé sur polyfolio
 <br> </br> 
 <h3><li>Informations pertinantes du cours,</li></h3>
	<ul>
		<li>Objectif du cours,</li>
		<li>Méthode d &#039 évaluation,</li>
		<li>Demande de révision d &#039 évaluation</li>
		<li>Règles de fonctionnement du cours</li>
		<li>Conditions de réussite du cours</li>
	</ul>
</ol>
<br> </br> 
<br> </br> 
  <h2>Règle 3</h2>
  <p>Assurez-vous d-avoir contacter au prealable votre directeur de departement.</p>
  <p>Veuillez selectionner votre programme</p>
  <select size="1" name="Programmes">
  <option value="1">genie aerospacial</option>
  <option value="2">genie biomedicalelogiciel et informatique</option>
  <option value="3">genie chimique</option>
  <option value="4">genie civil geologique et des mines</option>
  <option value="5">genie electrique</option>
  <option value="6">genie logiciel et informatique</option>
  <option value="7">genie mathenatique et industriel</option>
  <option value="8">genie mecanique</option>
  <option value="9">genie physique</option>
  </select> ';

?>

  