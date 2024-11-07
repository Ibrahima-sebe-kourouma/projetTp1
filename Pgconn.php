<?php
session_start();
require_once('utilisateurManager.php');
require_once('Utilisateur.class.php');
require_once('utilisateurSimple.class.php');
require_once('admin.class.php');

$db = new PDO('mysql:host=localhost;dbname=forum;', 'root', '');

$utilisateurManager = new utilisateurManager($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $mdp = $_POST['mdp'];

    $utilisateur = $utilisateurManager->validerUtilisateur($id, $mdp);

    if ($utilisateur) {
        $_SESSION['utilisateur'] = serialize($utilisateur);
        

        if ($utilisateur instanceof Admin) {
            header('Location: Pgadmin.php');
        } else {
            header('Location: PgAcceuilPrive.php');
        }
        exit;
    } else {
        $error_message = "Identifiant ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Connexion</h2>
        <?php if (isset($error_message)) : ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="id">Identifiant</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="mdp">Mot de Passe</label>
                <input type="password" class="form-control" id="mdp" name="mdp" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</body>
</html>
