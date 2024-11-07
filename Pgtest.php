<?php
require_once ("Annonce.class.php");
require_once ("Utilisateur.class.php");
require_once ("admin.class.php");
require_once ("UtilisateurSimple.class.php");
require_once ("UtilisateurManager.php");
require_once ("annonceManager.php");
require_once ("AnnoncePrivee.class.php");
require_once ("AnnoncePublique.class.php");

$db = new PDO('mysql:host=localhost;dbname=forum;', 'root', '');

$utilisateurManager =new utilisateurManager($db);
$annonceManager=new annonceManager($db);


$admin=new Admin("2","lamar","kourouma","23","1234");
$utilisateurSimple=new UtilisateurSimple("4","abou","conte","36","98765");

$annonce = new Annonce("1","Ma premiere annonce","2024-09-10",$utilisateurSimple->getNom(),"publique");
$annoncePriv=new AnnoncePrivee("1","Mon annoce privee","2024-09-10",$admin->getNom(),"prive");
$utilisateurManager->ajouterUtilisateur($utilisateurSimple);

echo $admin->afficherUtilisateur();
echo "<br>";
echo $utilisateurSimple->afficherUtilisateur();

echo "<br>";
$annonce->afficherAnnonce();

//$annonceManager->ajouterAnnonce($annonce);

$annonceManager->ajouterAnnonce($annoncePriv);

?>