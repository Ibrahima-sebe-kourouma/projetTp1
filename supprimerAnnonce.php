<?php
session_start();
require_once('annonceManager.php');
require_once('Annonce.class.php');
$db = new PDO('mysql:host=localhost;dbname=forum;', 'root', '');

if (!isset($_SESSION['utilisateur'])) {
    header('Location: Pgconn.php');
    exit();
}

$annonceManager = new annonceManager($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['annonce_id'])) {
    $annonce_id = $_POST['annonce_id'];
    $annonceManager->supprimerAnnonce($annonce_id);
    header('Location: Pgadmin.php'); 
    exit();
} else {
    echo "Erreur : ID d'annonce non fourni.";
}
?>
