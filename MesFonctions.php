<?php   // Fichier: MesFonctions.php

// Page 20 : Choix d'un usager par son email -> id
function choix_usager(){
   global $db, $link;
   $sql = "SELECT * FROM Usagers";
   $table = send_sql($sql);      // Envoi la requête à cogito  
   $n = mysqli_num_rows($table);  // Récupère le nombre de lignes de la réponse
   echo '<br /><h1>ACTIVITÉS DÉCLARÉES</h1><br />
  <h3>Choisir un usager:</h3><br />
  <p><form action="index.php?" method="GET">
  <input type="hidden" name="pg" value="21"/>
  <select name="id" >';
   for($i=1;$i<=$n;$i++)
      {
	  $r = mysqli_fetch_object($table); // On récupère une ligne
	  $id=$r->id;                 // On récupère le id
      $em=$r->email;           // On récupère la description
	  echo "<option value=\"$id\"> $em</option><br />";
	  }
   echo '</select><br /><br />
  <input type="submit" value="Afficher la déclaration" />
  </form></p>';  
   return $n;
}

// Page 21 : Récupère et affiche le email de l'usager id
function affiche_choix(){
   global $db, $link, $id;
   
   $sql = "SELECT * FROM Usagers WHERE id=".$id;
   $table = send_sql($sql);      // Envoi la requête à cogito
   $n = mysqli_num_rows($table);  // Récupère le nombre de lignes de la réponse
   echo "<br /><h1>ACTIVITÉS DÉCLARÉES</h1><br />
  <h3>Choisir un usager:</h3><br />"; 
   if($n==1)
      {
	  $r = mysqli_fetch_object($table); // On récupère une ligne
      $em=$r->email;           // On récupère la description
	  echo "<p>Vous avez choisi l'usager $id dont email est $em.";
	  }
   else
	  echo "Aucun usager n'a été choisi/trouvé.";  
   return $n;
}

//Page 40 : Formulaire d'information d'un nouvel usager
function nouvel_usager($message){
   global $db, $link, $email, $mdp, $P, $M, $C, $D, $A;
   
   if($email==NULL) $email = "nouveau@polymtl.ca";   //Si vide alors propose nouveau@polymtl.ca
   if($mdp==NULL) $mdp = random_password(8);         //Si vide alors propose un mdp de 8 caractères
   echo "<br /><h1>S'ENREGISTRER</h1>";
   if($message!=NULL) echo '<br />
   <h3>'.$message.'</h3>';
   echo "<br />
    <h2>Créer un nouveau compte usager</h2>
    <p><form method=\"GET\" action=\"index.php\">
    <input type=\"hidden\" name=\"pg\" value=\"41\"/>
    <table>
    <tr><td>Email Poly:</td> <td><input type=\"email\" name=\"email\" value=\"$email\" /></td></tr>
    <tr><td>Mot de passe:</td> <td><input type=\"text\" name=\"mdp\" value=\"$mdp\" /></td></tr>
    </table><br />
    <h2>Poste à Polytechnique</h2><br />   
        <!-- Balise pour la saisie du type de finition -->
        <input type=\"radio\" name=\"statut\" value=\"P\" $P /> Professeur<br />
        <input type=\"radio\" name=\"statut\" value=\"M\" $M /> Maitre d'enseignement<br />
        <input type=\"radio\" name=\"statut\" value=\"C\" $C /> Chargé de cours<br />
        <input type=\"radio\" name=\"statut\" value=\"D\" $D /> Directeur<br /> 
        <input type=\"radio\" name=\"statut\" value=\"A\" $A /> Autre<br /><br /> 	  
    <input type=\"submit\" value=\"Soumettre votre inscription\" /> 
    </p>";  
   return $n;
}

//Page 41 : Valider les champs et enregistrer l'usager
function valide_usager(){
   global $db, $link, $email, $mdp, $statut;
   
   if($email==NULL || $mdp==NULL || $statut==NULL)  //Un champs est encore NULL
	  nouvel_usager("ERREUR: Les 3 champs sont obligatoires.");     
   else
      {
	  if(!valide_email($email))   //Adresse non Poly
		 nouvel_usager("ERREUR: Adresse courriel imPoly!");
	  else
         {
		 if(exist_usager($email))   //Adresse déjà utilisée
			nouvel_usager("ERREUR: Cette adresse courriel existe déjà!");
         else
		    {
			$sql = 'INSERT INTO Usagers VALUES(NULL,"'.$email.'","'.$mdp.'","'.$statut.'")';
            $table = send_sql($sql);      // Envoi la requête à cogito
			echo "<br /><h1>S'ENREGISTRER</h1><br />
            <h3>Compte usager $email a été créé avec succès!!!</h3><br />";
			envoi_email($email,$mdp,$statut);  //Envoi un courriel de confirmation
            echo "<form method=\"GET\" action=\"index.php\">
            <input type=\"hidden\" name=\"pg\" value=\"10\"/>  
            <input type=\"submit\" value=\"  OK  \" /> 
            </p>";
	        }
	     }
      }
   return $n;
}

//Valide que l'usager n'existe pas dans la BD
function exist_usager($email){
   global $db, $link;
   
   $sql = 'SELECT * FROM Usagers WHERE email="'.$email.'"';
   $table = send_sql($sql);      // Envoi la requête à cogito
   $n = mysqli_num_rows($table);  // Récupère le nombre de lignes de la réponse

   return $n;
}

// Valide que $email est @polymtl.ca
function valide_email($email){ 
   $poly="@polymtl.ca"; // Chaine de référence
   $m=strlen($poly); // Nombre de catactères
   $email=strtolower($email); // Convertir $email en minuscule
   $n=strlen($email); // Nombre de caractères
   $valide=0; // Par défaut, c'est non valide!
   if($n>$m) // $email doit être plus long que $poly
      {
      $valide=1; // Possiblement valide
      while($valide && $m>=0) // Tant que valide et qu'il reste des caractères
         if($poly[$m--]!=$email[$n--]) $valide=0; // Si pas égale alors non valide
      }
 return $valide;
 }

// Envoi un courriel de confirmation au nouvel usager
// Retourne : TRUE (réussi) ou FALSE (pas de courriel)
function envoi_email($email,$mdp,$statut) {
   global $db, $link;
   
   $header1 = 'From: "PROF sur cogito "<PROF.cogito@polymtl.ca>'."\n"; 
   $header2 = 'Content-Type: text/html; charset="utf-8"'."\n"; 
   $header3 = 'Content-Transfer-Encoding: 8bit'; 
   $headers = $header1.$header2.$header3;
   $sujet   = '[MEC1315]: Confirmation d\'un nouveau compte usager';
   
   $message = "Votre nouveau compte usager ".$email." a été créé avec succès sur le site web
   http://cogito.meca.polymtl.ca/~ts215 avec le mot de passe ".$mdp." et le statut ".$statut.".<br />
   <br />
   L'équipe TI du site web PROF.";
   
   if($e=mail($email,$sujet,$message,$headers))     
      echo "<p>Un courriel de confirmation a été envoyé à cette adresse.<br /><br />";

   return $e;
}
 
// Retourne un mot de passe aléatoire de $length caractères
function random_password($length) {
   $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
   $password = substr(str_shuffle($chars),0,$length );

   return $password;
}
function connexion_usagers($message) {
	global $email, $mdp;
	
	echo "<br /><h1>Veuillez vous connecter</h1>";
   if($message!=NULL) echo '<br />
   <h3>'.$message.'</h3>';

	echo "<p><form action=\"index.php?\" method=\"GET\">
  <input type=\"hidden\" name=\"pg\" value=\"31\"/>
   <table>
 <tr><td>Adresse courriel:</td> <td><input type=\"email\" name=\"email\" value=\"$email\" /></td></tr>
 <tr><td>Mot de passe:</td> <td><input type=\"text\" name=\"mdp\" value=\"$mdp\" /></td></tr>
    </table><br />
<input type=\"submit\" value=\"Se connecter\" />
</p>";
}
function choix_volet() {
	global $db, $link, $EC, $EL, $R, $S1, $S2, $S3;
	echo "<br /><h1>Veuillez choisir le volet</h1>
	<p><form action=\"index.php?\" method=\"GET\">
  <input type=\"hidden\" name=\"pg\" value=\"32\"/>
   <table>
 <tr><td>Enseignement Cours</td> <td><input type=\"radio\" name=\"volet\" value=\"EC\"$EC/></td></tr>
 <tr><td>Enseignement Laboratoire</td> <td><input type=\"radio\" name=\"volet\" value=\"EL\"$EL/></td></tr>
 <tr><td>Recherche</td> <td><input type=\"radio\" name=\"volet\" value=\"R\"$R /></td></tr>
 <tr><td>Sercvice groupe 1</td> <td><input type=\"radio\" name=\"volet\" value=\"S1\"$S1 /></td></tr>
 <tr><td>Sercvice groupe 2</td> <td><input type=\"radio\" name=\"volet\" value=\"S2\"$S2 /></td></tr>
 <tr><td>Sercvice groupe 3</td> <td><input type=\"radio\" name=\"volet\" value=\"S3\"$S3 /></td></tr>
    </table><br />
<input type=\"submit\" value=\"Ajouter l activite\" />
</form>
</p>";	
}

function affiche_activites($message) {
	global $db, $link, $volet;
	$quantite=null;
	$periode=20171;
	if($message!=NULL) echo '<br />
   <h3>'.$message.'</h3>';
   
	$sql = 'SELECT * FROM Activites WHERE volet="'.$volet.'"';
    $table = send_sql($sql);      // Envoi la requête à cogito
    $n = mysqli_num_rows($table);  // Récupère le nombre de lignes de la réponse
	echo '<br /><h1>ACTIVITÉS DÉCLARÉES</h1><br />
    <h3>Choisir une activites:</h3><br />
	
	<p><form action="index.php?" method="GET">
	<input type="hidden" name="pg" value="33"/>
	<select multiple="multiple" size="5" name="options">';
	for($i=1;$i<=$n;$i++){
			  $r=mysqli_fetch_object($table); // On récupère une ligne
			  $desc=$r->description;                 // On récupère le id
			  $ida=$r->id;
			  echo "<br /><option value=\"$ida\">$desc</option><br />";
		  }
		  echo "</select><br />";
	echo "<table>
    <br /><h3>Choisir une activites:</h3>
    <tr><td>Periode:</td> <td><input type=\"text\" name=\"periode\" value=\"$periode\" /></td></tr><br />
	<br /><tr><td>Quantite:</td> <td><input type=\"text\" name=\"quantite\" value=\"$quantite\" /></td></tr><br />
    </table>";
	echo '</select><br /><br />
    <input type="submit" value="enregistrer" />
    </form></p>';	
}


function valide_connexion(){
   global $email, $mdp, $link, $db;
   
   if($email==NULL || $mdp==NULL)  //Un champs est encore NULL
	  connexion_usagers("ERREUR: Les 2 champs sont obligatoires.");
   else {
	   if (exist_usager($email)){
		   $sql1 = 'SELECT * FROM Usagers WHERE email="'.$email.'"';
		   $c_m = send_sql($sql1);
		   $r = mysqli_fetch_object($c_m);
		   $courriel=$r->email;
		   $mot_de_passe=$r->mdp;
		   $id_usager=$r->id;
		   
		   if ($mdp==$mot_de_passe)
			   choix_volet();
		   else
			   connexion_usagers("mot de passe invalide");
	   }
	   else
		   connexion_usagers("email invalide");
	   
		   
   }
  
	
}
 function enregistrement_activites() {
	 global $db, $link, $id_usager, $ida, $quantite, $periode;
	 if ($ida == NULL || $quantite == NULL || $periode ==NULL)
		 affiche_activites("Veuiller faire une selection");
	 else{
		 if (is_integer($periode) || is_numeric($quantite)){
			 $sql = 'INSERT INTO Charges VALUES(NULL,"'.$id_usager.'", "'.$ida.'", "'.$quantite.'", "'.$periode.'")';
			 $chrg = send_sql($sql);
			 echo "	
			 <p><form action=\"index.php?\" method=\"GET\">
			 <input type=\"hidden\" name=\"pg\" value=\"32\"/>
			 <h1>Merci<h1>";
			 
		 }
		 else 
			 affiche_activites("Erreur");
		 
		 }
	 
	
 }
	
?>
